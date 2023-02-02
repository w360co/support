import React, {FC, Suspense} from 'react';
import {BrowserRouter} from "react-router-dom";
import Route from "@/web/routes";
import Loading from "@/web/routes/components/loading";
import '@/support/config/time-ago';
import i18n from '@/support/config/i18next';
import {I18nextProvider} from "react-i18next";


const App: FC = () => {

    const spin = (<Loading />)
    return (
        <Suspense fallback={spin}>
            <I18nextProvider i18n={i18n}>
                    <BrowserRouter>
                        <Route/>
                    </BrowserRouter>
            </I18nextProvider>
        </Suspense>
    )
}
export default App;
