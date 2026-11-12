// ===== Home page script: fade in menu cards and highlights as they scroll into view =====
document.addEventListener('DOMContentLoaded', function () {
    var items = document.querySelectorAll('.home-page .reveal');
    if (!('IntersectionObserver' in window)) return;

    document.documentElement.classList.add('js-ready');

    var observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15 },
    );

    items.forEach(function (item) {
        observer.observe(item);
    });
});
