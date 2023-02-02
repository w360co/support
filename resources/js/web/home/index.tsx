import React, {FC} from "react";
import {usePageTitle} from "@/support/hooks/page-title";


/**
 * Home
 */
const Home: FC = () => {

    usePageTitle("Site")

    return (
        <div>
            <h1 className="mt-5">HOME</h1>
            <p className="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and
                CSS. A fixed navbar has been added with <code className="small">padding-top: 60px;</code> on the <code
                    className="small">main &gt; .container</code>.</p>
            <p>minus the navbar.</p>
        </div>
    )

}

export default Home
