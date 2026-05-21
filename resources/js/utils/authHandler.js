import { showToast } from './toast.js';

export async function handleAuthForm({
    formId,
    url,
    buttonText,
    loadingText
}) {
    const form = document.getElementById(formId);


    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                showToast(data.message, 'success');
                window.location.href = data.redirect;
            }

            else {
                if (data.errors) {
                    Object.values(data.errors).forEach(messages => {
                        messages.forEach(message => {
                            showToast(message, 'error');
                        });
                    });
                } else {
                    showToast(data.message, 'error');
                }
            }

        } catch (error) {
            showToast('Something went wrong', 'error');
        }

    });
}