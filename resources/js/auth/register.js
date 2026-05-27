import $ from 'jquery';

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



                let response = xhr.responseJSON;



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

