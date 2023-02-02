import React, {FC} from "react";
import {Navigate, RouteObject, useRoutes} from "react-router-dom";
import routes from "@/web/routes/config";
import Authorized from "@/web/routes/components/authorized";
import {RouteItem} from "@/web/routes/type";


/**
 * Breadcrumb Map
 */
export const breadcrumbMap = new Map()

/**
 *
 * @param target
 * @param source
 * @param parentPath
 * @param parentName
 */
export function getRouteData(target: RouteObject[], source: RouteItem[], parentPath: string, parentName: string) {

    source.forEach((item: RouteItem) => {
        let fullPath = ""
        let fullName = ""

        if (item.path && item.meta?.name && !item.path.startsWith("/")) {
            fullPath = parentPath + "/" + item.path
            fullName = parentName + "/" + item.meta.name
            breadcrumbMap.set(fullPath, fullName)
        }

        let route: RouteObject = {
            path: item.path,
            index: item.index,
            element: <Authorized
                authority={ item.meta?.authority }
                noMatch={<Navigate replace to={"/"} />}
                children={<item.element/>}
            />
        }
        target.push(route)

        if (item.children) {
            route.children = []
            getRouteData(route.children, item.children, fullPath, fullName)
        }
    })
}

/**
 * Route
 * @constructor
 */
const Route: FC = () => {
    const routeList: RouteObject[] = []
    getRouteData(routeList, routes, "", "")
    return useRoutes(routeList)
}

export default Route
