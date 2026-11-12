const onReady = (callback) => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback, { once: true });
    } else {
        callback();
    }
};

const APPEARANCE_KEY = 'appearance';
const darkMedia = window.matchMedia('(prefers-color-scheme: dark)');

const getCookie = (name) => {
    const match = document.cookie.match(
        new RegExp(
            `(?:^|; )${name.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')}=([^;]*)`,
        ),
    );

    return match ? decodeURIComponent(match[1]) : null;
};

const setCookie = (name, value) => {
    const maxAge = 365 * 24 * 60 * 60;

    document.cookie = `${name}=${encodeURIComponent(value)};path=/;max-age=${maxAge};SameSite=Lax`;
};

const storedAppearance = () => {
    const stored =
        getCookie(APPEARANCE_KEY) ?? localStorage.getItem(APPEARANCE_KEY);

    return stored === 'dark' || stored === 'light' ? stored : null;
};

const currentAppearance = () =>
    storedAppearance() ?? (darkMedia.matches ? 'dark' : 'light');

const applyTheme = (appearance) => {
    const dark = appearance === 'dark';

    document.documentElement.classList.toggle('dark', dark);
    document.documentElement.style.colorScheme = dark ? 'dark' : 'light';

    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        button.setAttribute('aria-pressed', dark ? 'true' : 'false');
        button.setAttribute(
            'aria-label',
            dark ? 'Switch to light mode' : 'Switch to dark mode',
        );
        button.setAttribute(
            'title',
            dark ? 'Switch to light mode' : 'Switch to dark mode',
        );
    });
};

const updateAppearance = (appearance) => {
    localStorage.setItem(APPEARANCE_KEY, appearance);
    setCookie(APPEARANCE_KEY, appearance);

    applyTheme(appearance);
};

const initAppearance = () => {
    applyTheme(currentAppearance());

    darkMedia.addEventListener('change', () => {
        if (!storedAppearance()) {
            applyTheme(currentAppearance());
        }
    });

    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            updateAppearance(currentAppearance() === 'dark' ? 'light' : 'dark');
        });
    });
};

const initToasts = () => {
    document.querySelectorAll('[data-toast]').forEach((toast) => {
        let removed = false;

        const remove = () => {
            if (removed) {
                return;
            }

            removed = true;
            toast.remove();

            const region = document.querySelector('[data-toast-region]');

            if (region && !region.querySelector('[data-toast]')) {
                region.remove();
            }
        };

        toast
            .querySelector('[data-toast-close]')
            ?.addEventListener('click', remove);

        window.setTimeout(remove, 6000);
    });
};

onReady(() => {
    initAppearance();
    initToasts();
});
