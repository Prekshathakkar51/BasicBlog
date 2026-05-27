const previewBtn = document.getElementById('preview-btn');

const previewContainer = document.getElementById('preview-container');

previewBtn.addEventListener('click', async function () {


    const title = document.querySelector('input[name="title"]').value;

    if (!window.editor) {

        showToast('Editor is still loading', 'error');

        return;
    }

    const content = window.editor.getData();

    const plainContent = content.replace(/<[^>]*>/g, '').trim();

    if (!title.trim() && !plainContent) {

        previewContainer.innerHTML = '';

        showToast('Please add title or content before previewing', 'error');

        return;
    }


    try {

        // title and content preview using axios

        const response = await axios.post('/blogs/preview', {
            title: title,
            content: content
        });

        previewContainer.innerHTML = response.data;

        // Image preview by plain js
        const imageInput = document.getElementById('image-input');

        const previewImage = document.getElementById('preview-image');

        const file = imageInput.files[0];

        if (file) {

            previewImage.src = URL.createObjectURL(file);

            previewImage.classList.remove('hidden');
        }

    } catch (error) {

        showToast('Failed to load preview.', 'error');
        console.error(error);
    }

});
