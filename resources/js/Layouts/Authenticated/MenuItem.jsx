import { Link } from "@inertiajs/react"
export default function MenuItem({menuLink,icon,text,method = 'get'}){
    const isActive = false;
    return (
        <Link 
            href={menuLink ? route(menuLink): null}
            className={`side-link ${isActive && "active"}`}
            method={method}
            as='button'
        >
            {icon}
            {text}
        </Link>
        )
    }