import $ from 'jquery';
// import { showToast } from '../utils/toast.js';
$(document).ready(function () {

    $("#loginForm").submit(function (e) {

        e.preventDefault();

        $.ajax({

            url: "/login",
            method: "POST",

            data: {
                email: $("#email").val(),
                password: $("#password").val(),

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









// import { handleAuthForm } from '../utils/authHandler.js';

// handleAuthForm({
//     formId: 'loginForm',
//     url: '/login',
//     buttonText: 'Sign In',
//     loadingText: 'Signing In...'
// });