import React, {FC} from "react";

import logoW from '@/web/assets/images/logoW360.svg';

/**
 *
 * @constructor
 */
const Footer: FC = () => {
    return (
        <footer className="footer mt-auto py-3 bg-info">
            <div className="container">
                <div className="row">
                    <span className="col text-center">
                        Copyright @2023 | Designed With by <img style={{width: '70px'}} src={logoW} alt={"W360 S.A.S"}/>
                    </span>
                </div>
            </div>
        </footer>
    )
}

export default Footer
