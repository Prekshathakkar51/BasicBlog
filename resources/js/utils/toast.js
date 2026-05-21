// export function showToast(message, type = 'success') {

//     let container = document.getElementById('toast-container');

//     if (!container) {
//         container = document.createElement('div');
//         container.id = 'toast-container';
//         document.body.appendChild(container);
//     }

//     const toast = document.createElement('div');

//     toast.className = `alert alert-${type} mb-2`;

//     toast.innerHTML = `<span>${message}</span>`;

//     container.appendChild(toast);

//     setTimeout(() => {
//         toast.remove();
//     }, 3000);
// }

// working
// export function showToast(message, type = 'success') {
//     const toastContainer = document.getElementById('toast-container');

//     const toast = document.createElement('div');

//     toast.className = `alert alert-${type} mb-2`;

//     toast.innerHTML = `
//         <span>${message}</span>`;

//     toastContainer.appendChild(toast);
  
//     setTimeout(() => {

//         toast.remove();

//     }, 3000);
// }


export function showToast(message, type = 'success') {

    let container = document.getElementById('toast-container');

    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-container';
        container.className = 'toast toast-top toast-center z-50';
        document.body.appendChild(container);
    }

    const alert = document.createElement('div');

    // Use DaisyUI styling (important for consistency)
    const typeClass = {
        success: 'alert-success',
        error: 'alert-error',
        warning: 'alert-warning',
        info: 'alert-info',
    };

    alert.className = `alert ${typeClass[type] || 'alert-success'} shadow-lg mb-2`;

    alert.innerHTML = `<span>${message}</span>`;

    container.appendChild(alert);

    setTimeout(() => {
        alert.remove();
    }, 2000);
}

