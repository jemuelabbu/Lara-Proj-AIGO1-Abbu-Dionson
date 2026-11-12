// ===== About page script: Read More / Read Less toggle for the background story =====
document.addEventListener('DOMContentLoaded', function () {
    var button = document.getElementById('story-toggle');
    var content = document.getElementById('story-more');
    if (!button || !content) return;

    var label = button.querySelector('[data-toggle-label]');

    function setExpanded(expanded) {
        content.classList.toggle('is-collapsed', !expanded);
        // "inert" hides collapsed text from keyboard and screen readers
        content.inert = !expanded;
        button.setAttribute('aria-expanded', expanded ? 'true' : 'false');
        label.textContent = expanded ? 'Read Less' : 'Read More';
    }

    button.addEventListener('click', function () {
        setExpanded(button.getAttribute('aria-expanded') !== 'true');
    });

    setExpanded(false);
});
