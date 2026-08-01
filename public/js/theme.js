(function() {
    const root = document.documentElement;
    const toggleBtn = document.getElementById('themeToggle');
    const STORAGE_KEY = 'rudy-portfolio-theme';

    function applyTheme(theme) {
        root.setAttribute('data-theme', theme);
        toggleBtn.setAttribute('aria-pressed', theme === 'dark');
    }
    // Priyoridad: naka-save na preference > system preference > light (default)
    let savedTheme = null;
    try {
        savedTheme = localStorage.getItem(STORAGE_KEY);
    } catch (e) {
        // localStorage unavailable (e.g. private mode) — okay lang, fallback lang
    }
    if (savedTheme === 'light' || savedTheme === 'dark') {
        applyTheme(savedTheme);
    } else {
        applyTheme('light');
    }
    toggleBtn.addEventListener('click', function() {
        const current = root.getAttribute('data-theme');
        const next = current === 'dark' ? 'light' : 'dark';
        applyTheme(next);
        try {
            localStorage.setItem(STORAGE_KEY, next);
        } catch (e) {}
    });
})();