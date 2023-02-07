import React, {FC} from "react";
import {usePageTitle} from "@/support/hooks/page-title";


/**
 * Home
 */
const Home: FC = () => {

    usePageTitle("Site")

    return (
        <div className={"text-center"}>
            <h1 className="mt-5">HOME</h1>
            <p className="lead">This is a boiler template using react and bootstrap for w360 projects.</p>
            <p>This template has been installed using the <a target={"_blank"} href={"https://github.com/w360co/support"}>W360/support</a> module package</p>
        </div>
    )

}

export default Home
