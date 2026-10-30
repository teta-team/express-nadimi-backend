(function () {
        const toast = document.getElementById('rdToast');
        let toastTimer;

        const showToast = () => {
            if (!toast) return;
            toast.classList.add('is-visible');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => toast.classList.remove('is-visible'), 1600);
        };

        const fallbackCopy = (value) => {
            const area = document.createElement('textarea');
            area.value = value;
            area.setAttribute('readonly', '');
            area.style.position = 'fixed';
            area.style.opacity = '0';
            document.body.appendChild(area);
            area.select();

            try {
                document.execCommand('copy');
            } catch (error) {
                // Ignore unsupported browsers.
            }

            document.body.removeChild(area);
        };

        document.querySelectorAll('[data-copy]').forEach((button) => {
            button.addEventListener('click', async () => {
                const value = button.getAttribute('data-copy') || '';

                try {
                    if (navigator.clipboard && window.isSecureContext) {
                        await navigator.clipboard.writeText(value);
                    } else {
                        fallbackCopy(value);
                    }
                } catch (error) {
                    fallbackCopy(value);
                }

                button.classList.add('is-done');
                setTimeout(() => button.classList.remove('is-done'), 1400);
                showToast();
            });
        });
    })();
