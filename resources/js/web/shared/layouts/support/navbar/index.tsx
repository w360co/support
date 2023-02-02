import React, {FC} from "react";
import {Link} from "react-router-dom";
import {useTranslation} from "react-i18next";


/**
 * 布局
 */
const NavBar: FC = () => {

    const {t} = useTranslation(['main-menu']);

    return (
            <nav className="navbar navbar-expand-md navbar-light bg-faded">
                <div className="container-fluid">
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"/>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarCollapse">
                        <ul className="navbar-nav mx-auto mb-2 mb-md-0 ">
                            <li className="nav-item">
                                <Link className="nav-link" aria-current="page" to={"/blank"}>{t('profile', 'Home')}</Link>
                            </li>
                            <li className="nav-item">
                                <Link className="nav-link" aria-current="page" to={"/test"}>{t('publications', 'Test')}</Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    )
}

export default NavBar
