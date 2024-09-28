import React, {useEffect, useRef} from "react";
import PropTypes from  'prop-types';


Input.prototype = {
    type: PropTypes.oneOf(['text','email','password','number','file']),
    name: PropTypes.string,
    value: PropTypes.oneOf([PropTypes.string,PropTypes.number]),
    defaultValue : PropTypes.oneOf([PropTypes.string,PropTypes.number]),
    className : PropTypes.string,
    variant: PropTypes.oneOf(['primary','error','primary-outline']),
    autoComplete : PropTypes.string,
    reqired: PropTypes.bool,
    isFocused: PropTypes.bool,
    handleChange: PropTypes.func,
    placeholder: PropTypes.string,
    isError: PropTypes.bool
}
export default function Input({
    type = 'text',
    name,
    value,
    defaultValue,
    className,
    variant = "primary",
    autoComplete,
    reqired,
    isFocused,
    handleChange,
    placeholder,
    isError,
}){
    const input = useRef();

    useEffect(() =>{
        if(isFocused){
            input.current.focus()
        }
    }, [])

    return(
        <div className="flex flex-col items-start">
            <input 
            type={type}
            name={name}
            value={value}
            defaultValue={defaultValue}
            className={
                `rounded-2xl bg-form-bg py-[13px] px-7 w-full ${isError && "input-error"} input-${variant} input-${className}`
            }
            ref={input}
            autoComplete={autoComplete}
            reqired={reqired}
            onChange={(e) => handleChange(e)}
            placeholder={placeholder}
            />
        </div>
    )
}