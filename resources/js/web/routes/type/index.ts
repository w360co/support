
export interface RouteItem {
    path?: string
    index?: boolean
    element?: any
    meta?: RouteMeta
    children?: RouteItem[]
}

export interface RouteMeta {
    name: string
    authority?: string | string[]
}
