import i18n from "i18next";
import Backend from "i18next-http-backend";
import { initReactI18next } from "react-i18next";


export const supportedLanguages = ['es-ES', 'en-US'];

i18n.use(Backend).use(initReactI18next).init({
    fallbackLng: "es-ES",
    supportedLngs: supportedLanguages
});

export default i18n;
