var theme = 'light';
var other = 'dark';

function flipTheme(t) {
    $('link[rel="stylesheet"]').each(function() {
        if (this.href.indexOf(theme)>=0) {
            this.href = this.href.replace(theme, t);
            other = theme;
            theme = t;

        }
    });
}