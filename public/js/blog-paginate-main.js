window.currentPageUrl = window.location.href;

$(document).on('click', 'a[href*="page="]', function (e) {

    e.preventDefault();
    let url = $(this).attr('href');

    window.currentPageUrl = url;

    $.ajax({

        url: url,
        type: "GET",

        success: function (response) {

            let newHtml = $(response).find('#blogWrapper').html();

            if (newHtml) {
                $("#blogWrapper").html(newHtml);
            } else {
                $("#blogWrapper").html(response);
            }

        }

    });

});