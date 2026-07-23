import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-home-tags]').forEach((tagList) => {
        tagList.addEventListener('keydown', (event) => {
            if (event.key !== 'ArrowRight' && event.key !== 'ArrowLeft') {
                return;
            }

            const links = Array.from(tagList.querySelectorAll('a'));
            const currentIndex = links.indexOf(document.activeElement);

            if (currentIndex === -1) {
                links[0]?.focus();
                return;
            }

            event.preventDefault();

            const nextIndex = event.key === 'ArrowRight'
                ? (currentIndex + 1) % links.length
                : (currentIndex - 1 + links.length) % links.length;

            links[nextIndex]?.focus();
        }, { passive: false });
    });
}, { once: true });
