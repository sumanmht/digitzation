$(document).on('submit', '.birth-search form', function (event) {
    event.preventDefault(); // Prevent the default form submission
    var form = $(this);
    var url = form.attr('action');
    var data = form.serialize();

    $.ajax({
        type: 'GET', // Use the appropriate HTTP method for your form
        url: url,
        data: data,
        success: function (response) {
            $('.nepalify').each(function () {
                $(this).removeClass('nepalify'); // Remove the class temporarily
                $(this).addClass('nepalify'); // Add the class back
            });

            // Handle the response data, e.g., update the search results
            // Assuming you have a container for the search results with ID "search-results"
            $('#search-results').html(response);
        },
        error: function (xhr, status, error) {
            // Handle the error response
            console.log(error);
        }
    });
});
