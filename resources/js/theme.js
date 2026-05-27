$('#theme-toggle').on('click', function () {
    const html = document.documentElement;

    const currentTheme = html.getAttribute('data-theme');

    const newTheme = currentTheme === 'dark' ? 'lofi' : 'dark';

    html.setAttribute('data-theme', newTheme);

    localStorage.setItem('theme', newTheme);
});