// console.log("REGISTER JS LOADED");
import $ from 'jquery';
// import { showToast } from '../utils/toast.js';
$(document).ready(function () {

    $("#registerForm").submit(function (e) {

        e.preventDefault();

        $.ajax({

            url: "/register",
            method: "POST",

            data: {
                name: $("#name").val(),
                email: $("#email").val(),
                password: $("#password").val(),
                password_confirmation: $("#password_confirmation").val(),

                _token: $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {

                showToast(response.message, "success");

                setTimeout(function () {

                    window.location.href = response.redirect;

                }, 1500);

            },

            error: function (xhr) {

                // console.log(xhr);

                let response = xhr.responseJSON;


                // validation errors
                if (response && response.errors) {

                    $.each(response.errors, function (key, value) {

                        showToast(value[0], "error");

                    });

                }

                else {

                    showToast("Something went wrong", "error");

                }


            }

        });
    });

});

// function showToast(message, type = "success") {

//     let bgColor = "bg-green-500";

//     if (type == "error") {
//         bgColor = "bg-red-500";
//     }

//     let toast = document.createElement("div");

//     toast.className =
//         `${bgColor} text-white px-4 py-2 rounded mb-2 shadow`;

//     toast.innerText = message;


//     document.getElementById("toast-container").appendChild(toast);

//     // remove after 2 sec
//     setTimeout(function () {

//         toast.remove();

//     }, 2000);
// }


// import { handleAuthForm } from '../utils/authHandler.js';

// handleAuthForm({
//     formId: 'registerForm',
//     url: '/register',
//     buttonText: 'Create Account',
//     loadingText: 'Creating Account...'
// });