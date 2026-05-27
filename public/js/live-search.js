$(document).ready(function () {

    let timeout = null;

    let currentRequest = null;

    $("#searchInput").on("keyup", function () {

        clearTimeout(timeout);

        let query = $(this).val();

        timeout = setTimeout(function () {

            if (currentRequest) {
                currentRequest.abort();
            }

            currentRequest = $.ajax({

                url: "/search-blogs",

                method: "GET",

                data: {
                    query: query
                },

                beforeSend: function () {
                    $("#loader").removeClass("hidden");
                },
                success: function (response) {

                    $("#blogWrapper").html(response);

                },

                error: function (xhr, status) {
                    if(status !== "abort") {
                        $("#blogWrapper").html("<p class='text-red-500'> Something went wrong.</p>");
                    }
                },

                complete: function () {
                    $("#loader").addClass("hidden");
                }

            });

        }, 300);

    });

});




