import React, {FC} from "react";
import {useTranslation} from "react-i18next";
import NavBar from "@/web/shared/layouts/support/navbar";
import logoW from '@/web/assets/images/logoW360.svg';


/**
 * @constructor
 */
const Header: FC = () => {

    const {t} = useTranslation(['main-menu']);

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
