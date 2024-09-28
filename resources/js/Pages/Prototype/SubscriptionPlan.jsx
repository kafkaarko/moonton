import Authenticated from "@/Layouts/Authenticated/index";
import SubscriptionCard from "@/Components/SubscriptionCard";
export default function SubscriptionPlan(){
    return <Authenticated>
       <div className="py-20 flex flex-col items-center">
                <div className="text-black font-semibold text-[26px] mb-3">
                    Pricing for Everyone
                </div>
                <p className="text-base text-gray-1 leading-7 max-w-[302px] text-center">
                    Invest your little money to get a whole new experiences from movies.
                </p>


                <div className="flex justify-center gap-10 mt-[70px]">
                    {/* basic */}
                    <SubscriptionCard
                    name="Basic"
                    price={290000}
                    durationInMonth={3}
                    features={["Featarue 1","Feature 2","Feature 3"] }
                    />
                    {/* premium */}
                    <SubscriptionCard
                    isPremium
                    name="Premium"
                    price={899000}
                    durationInMonth={6}
                    features={["Featarue 1","Feature 2","Feature 3"] }
                    
                    />
                </div>
            </div>
    </Authenticated>
}