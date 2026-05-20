import { showToast } from './toast.js';

export async function handleAuthForm({
    formId,
    url,
    buttonText,
    loadingText
}) {
    const form = document.getElementById(formId);

    if (!form) return;

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const button = form.querySelector('button');

        // UI loading state
        button.disabled = true;
        button.innerText = loadingText;

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

            // SUCCESS
            if (response.ok) {
                showToast(data.message, 'success');

                setTimeout(() => {
                    window.location.href = data.redirect;
                }, 1000);
            }
            // ERROR
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

        // Reset button
        button.disabled = false;
        button.innerText = buttonText;
    });
}