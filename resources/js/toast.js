document.addEventListener("DOMContentLoaded", () => {

    const success = document.getElementById("flash-success");

    if (success) {
        showToast(success.dataset.message);
    }

    const error = document.getElementById("flash-error");

    if (error) {
        showToast(error.dataset.message, "error");
    }

});





window.showToast = function(message, type = "success") {
    const container = document.getElementById("toast-container");

    if (!container) return;

    let bgColor = "bg-green-500";

    if (type === "error") {
        bgColor = "bg-red-500";
    }

    const toast = document.createElement("div");

    toast.className = `
        ${bgColor}
        text-white
        px-4
        py-2
        rounded
        mb-2
        shadow
        transition-all
        duration-300
    `;

    toast.innerText = message;

    container.appendChild(toast);

    setTimeout(() => {

        toast.classList.add("opacity-0");

        setTimeout(() => {
            toast.remove();
        }, 300);

    }, 2000);
}
