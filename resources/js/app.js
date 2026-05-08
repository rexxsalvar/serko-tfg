document.addEventListener('DOMContentLoaded', () => {
    const mobileToggle = document.querySelector('[data-mobile-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    mobileToggle?.addEventListener('click', () => {
        mobileMenu?.classList.toggle('hidden');
    });

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal-element').forEach((element) => revealObserver.observe(element));

    const toastMessage = document.querySelector('[data-toast-message]')?.dataset.toastMessage;

    if (toastMessage) {
        const toast = document.createElement('div');
        toast.className = 'serko-toast';
        toast.textContent = toastMessage;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(24px)';
            setTimeout(() => toast.remove(), 300);
        }, 3200);
    }

    if (window.Dropzone) {
        window.Dropzone.autoDiscover = false;

        document.querySelectorAll('[data-dropzone]').forEach((element) => {
            if (element.dataset.ready === 'true') {
                return;
            }

            element.dataset.ready = 'true';

            const targetInput = document.querySelector(element.dataset.target);
            const endpoint = element.dataset.endpoint;

            new window.Dropzone(element, {
                url: endpoint,
                paramName: 'file',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
                },
                acceptedFiles: 'image/*',
                maxFiles: 1,
                success(file, response) {
                    if (targetInput) {
                        targetInput.value = response.path;
                    }
                },
            });
        });
    }

    if (window.Quill) {
        document.querySelectorAll('[data-wysiwyg]').forEach((wrapper) => {
            if (wrapper.dataset.ready === 'true') {
                return;
            }

            wrapper.dataset.ready = 'true';

            const targetInput = document.querySelector(wrapper.dataset.target);
            const quill = new window.Quill(wrapper, {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        [{ header: [2, 3, false] }],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        ['link', 'blockquote'],
                    ],
                },
            });

            if (targetInput?.value) {
                quill.root.innerHTML = targetInput.value;
            }

            quill.on('text-change', () => {
                if (targetInput) {
                    targetInput.value = quill.root.innerHTML;
                }
            });
        });
    }
});
