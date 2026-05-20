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

                // homepage delete
                $('#blog-' + blogId).remove();

                showToast(response.message);
            }
        },

        error: function () {

            document.getElementById('delete_modal').close();

            showToast('Delete failed');
        }

    });

});

// import { showToast } from '../utils/toast.js';



function showToast(message) {

    let toast = `
    
    <div class="toast toast-top toast-center z-50">

        <div class="alert alert-success">

            <span>${message}</span>

        </div>

    </div>
    `;

    $('body').append(toast);

    setTimeout(function () {

        $('.toast').fadeOut(500, function () {
            $(this).remove();
        });

    }, 3000);
}




// import $ from 'jquery';

// // console.log('PAGE LOADED');

// $(document).on('submit', '.delete-blog-form', function (e) {

//     e.preventDefault();

//     // console.log('form submitted');

//     if (!confirm('Are you sure you want to delete this blog?')) {
//         return;
//     }

//     let form = $(this);

//     let blogId = form.data('id');

//     $.ajax({

//         url: '/blogs/' + blogId,

//         type: 'DELETE',

//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },

//         success: function (response) {

//             // if user is on single blog page
//             if (window.location.pathname === '/blogs/' + blogId) {

//                 window.location.href = '/';

//             } else {

//                 // homepage delete
//                 $('#blog-' + blogId).remove();

//                 showToast(response.message);
//             }
//         },

//         error: function () {

//             showToast('Delete failed');
//         }

//     });

// });

// function showToast(message) {
//     let toast = `
    
//     <div class="toast toast-top toast-center z-50">

//         <div class="alert alert-success">

//             <span>${message}</span>

//         </div>

//     </div>
//     `;

//     $('body').append(toast);

//     setTimeout(function () {

//         $('.toast').fadeOut(500, function () {
//             $(this).remove();
//         });

//     }, 3000);
// }