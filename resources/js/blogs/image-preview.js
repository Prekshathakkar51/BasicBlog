const imageInput = document.getElementById('imageInput');

const imagePreview = document.getElementById('imagePreview');


// Check if elements exist
if (imageInput && imagePreview) {

    imageInput.addEventListener('change', function (event) {

        const file = event.target.files[0];

        // If file selected
        if (file) {

            // Create temporary preview URL
            const imageUrl = URL.createObjectURL(file);

            // Replace preview image
            imagePreview.src = imageUrl;
        }
    });
}