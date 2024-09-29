import React,{useEffect} from 'react';
import Input from '@/Components/Input';
import Label from '@/Components/InputLabel';
import Button from '@/Components/DangerButton';
import ValidationError from '@/Components/ValidationErrors';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Login(){

    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('login'), {
            onFinish: () => reset('password'),
        });
    }

    useEffect(() =>{
        reset("password");
    },[])

    const onHandleChange = (event) => {
        setData(
            event.target.name,
            event.target.value
        )
    }
    return(
        <>
        <Head title="Log In"/>
        <div className="mx-auto max-w-screen min-h-screen bg-black text-white md:px-10 px-3">
    <div className="fixed top-[-50px] hidden lg:block">
        <img src="/images/signup-image.png"
            className="hidden laptopLg:block laptopLg:max-w-[450px] laptopXl:max-w-[640px]" alt=""/>
    </div>
    <div className="py-24 flex laptopLg:ml-[680px] laptopXl:ml-[870px]">
        <div>
            <img src="/images/moonton-white.svg" alt=""/>
            <div className="my-[70px]">
                <div className="font-semibold text-[26px] mb-3">
                    Welcome Back
                </div>
                <p className="text-base text-[#767676] leading-7">
                    Explore our new movies and get <br/>
                    the better insight for your life
                </p>
                <ValidationError errors={errors} />
            </div>
            <form className="w-[370px]" onSubmit={submit}>
                <div className="flex flex-col gap-6">
                    <div>
                        <Label
                            forInput="email"
                            value="email address"
                        />
                            <Input
                            type="email" 
                            name="email"
                            placeholder="Email Address"
                            value={data.email}
                            isfocused={true}
                            handleChange={onHandleChange}
                            />

                    </div>
                    <div>
                    <Label
                            forInput="password"
                            value="password"
                        />
                        
                            <Input 
                                type="password" 
                                name="password"
                                placeholder="Password"
                                value={data.password}
                                handleChange={onHandleChange}
                            />
                    </div>
                </div>
                <div className="grid space-y-[14px] mt-[30px]">
                        <Button type="submit" variant="primary" processing={processing}>
                        <span className="text-base font-semibold">
                                Start Watching
                            </span>
                        </Button>
                    <Link href={route('register')}>
                        <Button type="submit" variant="light-outline">
                        <span className="text-base text-white">
                                Create New Account
                            </span>
                        </Button>
                    </Link>
                </div>
            </form>
        </div>
    </div>
</div>
        </>
    )
     
}