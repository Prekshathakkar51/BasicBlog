const loginForm = document.getElementById('loginForm');


// Check if form exists
if (loginForm) {

    loginForm.addEventListener('submit', async function (e) {

        e.preventDefault();

        const formData = new FormData(loginForm);

        const button = loginForm.querySelector('button');

        // Disable button
        button.disabled = true;
        button.innerText = 'Signing In...';

        try {

            const response = await fetch('/login', {

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

            // VALIDATION / LOGIN ERROR
            else {

                // Validation errors
                if (data.errors) {

                    Object.values(data.errors).forEach(messages => {

                        messages.forEach(message => {

                            showToast(message, 'error');

                        });

                    });

                }

                // Other error
                else {

                    showToast(data.message, 'error');

                }
            }

        } catch (error) {

            showToast('Something went wrong', 'error');

        }

        // Enable button again
        button.disabled = false;
        button.innerText = 'Sign In';
    });
}



// Toast Function
function showToast(message, type = 'success') {

    const toastContainer = document.getElementById('toast-container');

    const toast = document.createElement('div');

    toast.className = `alert alert-${type} mb-2`;

    toast.innerHTML = `
        <span>${message}</span>
    `;

    toastContainer.appendChild(toast);

    // Remove after 3 seconds
    setTimeout(() => {

        toast.remove();

    }, 3000);
}