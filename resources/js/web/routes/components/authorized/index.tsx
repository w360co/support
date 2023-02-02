import React, {FC} from "react";
import {hasPermission} from "@/web/routes/services/has-permission";

interface IProps {
    authority?: any
    noMatch: any
    children?: any
}

/**
 * 权限
 */
const Authorized: FC<IProps> = (props: IProps) => {
    const {authority, noMatch, children} = props
    const renderChildren = typeof children === "undefined" ? null : children

    if (authority === undefined || authority === null) {
        return renderChildren;
    }else if (typeof authority === "string") {
         if( hasPermission(authority)){
             return renderChildren
         }
    }else if(Array.isArray(authority)){
        for (let item of authority) {
            if ( hasPermission(item)) {
                return renderChildren
            }
        }
    }
    return noMatch
}

export default Authorized
