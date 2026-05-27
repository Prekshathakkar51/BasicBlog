// import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener('DOMContentLoaded', function () {

    const editorElement = document.querySelector('#content');

    const contentCount = document.getElementById('content-count');

    if (!editorElement || !contentCount) return;

    // initial count
    contentCount.textContent = editorElement.value.length;

    ClassicEditor
        .create(editorElement, {

            toolbar: [
                'bold',
                'italic',
            ]

        })

        .then(editor => {

            window.editor = editor;

            function updateCharacterCount() {

                const data = editor.getData();

                const parser = new DOMParser();

                const doc = parser.parseFromString(data, 'text/html');

                const plainText = doc.body.textContent || '';

                contentCount.textContent = plainText.length;

            }

            // SYNC AFTER CKEDITOR LOADS
            updateCharacterCount();

            // LIVE COUNT
            editor.model.document.on('change:data', () => {

                updateCharacterCount();

            });

        })

        .catch(error => {
            console.error(error);
        });

});