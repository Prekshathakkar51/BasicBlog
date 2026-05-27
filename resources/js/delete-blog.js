import $ from 'jquery';

let pendingDelete = null;

$(document).on('submit', '.delete-blog-form', function (e) {

    e.preventDefault();

    // store form temporarily
    pendingDelete = $(this);

    // open modal
    document.getElementById('delete_modal').showModal();

});


// confirm delete button clicked
$('#confirm-delete-btn').on('click', function () {

    if (!pendingDelete) return;

    let form = pendingDelete;

    let blogId = form.data('id');

    $.ajax({

        url: '/blogs/' + blogId,

        type: 'DELETE',

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {

            // close modal
            document.getElementById('delete_modal').close();

            // if user is on single blog page
            if (window.location.pathname === '/blogs/' + blogId) {

                window.location.href = '/';

            } else {

                $.ajax({

    url: window.currentPageUrl,
    type: 'GET',

    success: function (html) {

        let newHtml = $(html).find('#blogWrapper').html();

        if(newHtml){

            $('#blogWrapper').html(newHtml);

        } else {

            $('#blogWrapper').html(html);

        }

        showToast(response.message);

    }

});

                
            }
        },

        error: function () {

            document.getElementById('delete_modal').close();

            showToast('Delete failed');
        }

    });

});

