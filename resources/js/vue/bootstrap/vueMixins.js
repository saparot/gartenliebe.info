export const vueMixins = {
    i18n: function (key, replace = {}) {
        let translation = this.$page.props.languageSnippets[key] ? this.$page.props.languageSnippets[key] : key;
        if (Object.keys(replace).length === 0) {
            return translation;
        }

        Object.keys(replace).forEach(function (key) {
            translation = translation.replace(':' + key, replace[key]);
        });

        return translation;
    },
};
