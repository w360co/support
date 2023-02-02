import React, {FC} from "react";
import Content from "@/web/shared/layouts/support/content";
import Header from "@/web/shared/layouts/support/header";
import Footer from '@/web/shared/layouts/support/footer';



/**
 *
 * @constructor
 */
const SiteLayout: FC = () => {

    return (
        <div className={"d-flex flex-column vh-100"}>
            <Header />
            <Content />
            <Footer />
        </div>
    )
}

export default SiteLayout
