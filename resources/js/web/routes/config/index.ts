import React from "react";
import {RouteItem} from "@/web/routes/type";


/**
 *
 */
const routes: RouteItem[] = [
    {
        path: "/",
        element: React.lazy(() => import("@/web/shared/layouts/support")),
        meta: {name: "Incio"},
        children: [
            {
                index: true,
                element: React.lazy(() => import("@/web/home")),
                meta: {name: "Home"},
            }
        ]
    }
]

export default routes
