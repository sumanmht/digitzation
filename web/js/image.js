$('.full-screen-image').click(function() {
    var imageUrl = $(this).attr('src');
    var modalContent = '<img src=\"' + imageUrl + '\" class=\"full-screen-modal-image\">';
    $('body').append('<div id=\"full-screen-modal\">' + modalContent + '</div>');
    $('#full-screen-modal').click(function() {
        $(this).remove();
    });
});

// $(document).ready(function() {
//     $('form').on('submit', function() {
//         var emptyFields = $(this).find(':input').filter(function() {
//             return $(this).val().trim() === '';
//         });
//         emptyFields.addClass('highlight-empty');
//     });
// });


    // $(document).ready(function() {
    //     $('#birth-form').on('beforeSubmit', function() {
    //         var form = $(this);
    //         var emptyRequiredFields = form.find(':input[required]').filter(function() {
    //             return $(this).val().trim() === '';
    //         });
    //         emptyRequiredFields.addClass('highlight-empty');
            
    //         if (emptyRequiredFields.length > 0) {
    //             emptyRequiredFields.first().focus();
    //             return false; // Prevent form submission if required fields are empty
    //         }
    //     });
    // });
  
      



      $(document).ready(function() {
        $('#rows-per-page').change(function() {
            var selectedValue = $(this).val();
            $.pjax.reload({container:'#pjax-gridview', timeout:false});
        });
    });