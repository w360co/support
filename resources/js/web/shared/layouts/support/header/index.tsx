import React, {FC} from "react";
import NavBar from "@/web/shared/layouts/support/navbar";
import logoW from '@/web/shared/assets/images/logoW360.svg';


/**
 * @constructor
 */
const Header: FC = () => {

    return (
        <header className={"container py-3"}>
            <div className=" flex-nowrap justify-content-between align-items-center">
                <div className="col text-center">
                    <img src={logoW} alt={"Logo"} />
                </div>
            </div>
            <NavBar />
        </header>
    )
}

export default Header
