
import Authenticated from "@/Layouts/Authenticated/Index";
import Flickity from "react-flickity-component";
import FeaturedMovie from "@/Components/FeaturedMovie";
import { Head } from "@inertiajs/react";
import MovieCard from "@/Components/MovieCard";

export default function Dashboard({auth,featuredMovie,movies}) {
    const flickittyOptions = {
        cellAlign: "left",
        contain: true,
        groupCells: 1,
        wrapAround: false,
        pageDots: false,
        prevNextButtons: false, 
        draggable: ">1"
    };

    return (
        <Authenticated auth={auth}>
            <div>
                <Head title="Dashboard">
                    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
                </Head>
                <div className="font-semibold text-[22px] text-black mb-4">Featured Movies</div>
                <Flickity className="gap-[30px]" options={flickittyOptions}>
                    {featuredMovie.map((featuredMovie) => (
                        <FeaturedMovie
                         key={featuredMovie.id}
                        slug={featuredMovie.slug}
                        name={featuredMovie.name}
                        category={featuredMovie.category}
                        thumbnail={featuredMovie.thumbnail}
                        rating={featuredMovie.rating}
                          
                          />
                        // <h1 key={i}>kafka ganteg</h1>
                    ))}
                </Flickity>
            </div>
            <div className="mt-[50px]">
                    <div className="font-semibold text-[22px] text-black mb-4">Browse</div>
                    <Flickity className="gap-[30px]" options={flickittyOptions}>
                       {movies.map((movies)=> (
                       <MovieCard key={movies.id}
                       slug={movies.slug}
                        name={movies.name}
                        category={movies.category}
                        thumbnail={movies.thumbnail}
                       />
                       ))} 
                        </Flickity>
                </div>
        </Authenticated>
    );
}