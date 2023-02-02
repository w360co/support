import React, {FC} from "react";
import {Outlet} from "react-router-dom";

/**
 * 布局
 */
const Content: FC = () => {
    return (
        <main className="flex-shrink-0">
            <div className="container">
                <Outlet />
            </div>
        </main>
    )
}

export default Content
