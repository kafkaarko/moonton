import React from "react";

export default function ValidationError({errors}){
    return (
        Object.keys(errors).length > 0 &&(
        <div className="my-4 px-4 py-2 border-red-600 border-2 rounded-md">
            <div className="font-medium text-red-600">sepertinya salah tuh</div>
            <ul className="mt-3 list-disc-list-inside text-sm text-red-600">
                {Object.values(errors).map((error, index) => (
                   <li key={index}>{error}</li>
                ))}
            </ul>
        </div>
        )
    )
}