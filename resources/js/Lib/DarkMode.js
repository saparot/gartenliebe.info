const MODE_DARK = 'dark';
const MODE_LIGHT = 'light';
const MODE_SYSTEM = 'system';

export const darkMode = () => {

    const darkModeEnable = () => document.documentElement.classList.add('dark');

    const darkModeDisable = () => document.documentElement.classList.remove('dark');

    const darkModeAuto = () => {
        localStorage.removeItem('theme');
        init();
    };

    const toggle = () => {
        const modeNew = getColorSchemeCurrent() === MODE_DARK ? MODE_LIGHT : MODE_DARK;
        if (modeNew === MODE_LIGHT) darkModeDisable();
        if (modeNew === MODE_DARK) darkModeEnable();
        localStorage.theme = modeNew;
    };

    const getColorSchemeMode = () => {
        switch (localStorage.theme) {
            case MODE_DARK:
            case MODE_LIGHT:
                return localStorage.theme;
            default:
                return MODE_SYSTEM;
        }
    };

    const getColorSchemeCurrent = () => {
        const mode = getColorSchemeMode();
        if (mode === MODE_SYSTEM) {
            return window.matchMedia('(prefers-color-scheme: dark)').matches === true ? MODE_DARK : MODE_LIGHT;

        }
        return mode;
    };

    const init = () => {
        if (getColorSchemeCurrent() === MODE_DARK) {
            darkModeEnable();
            return;
        }
        darkModeDisable();
    };

    return {init, darkModeEnable, darkModeDisable, darkModeAuto, toggle, getColorSchemeCurrent};
};
