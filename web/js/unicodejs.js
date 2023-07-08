$(document).ready(function() {
    $('body').children().each(function() {
      if (containsUnicodeCharacters($(this).text())) {
        $(this).addClass('kalimati-font');
      }
    });
  
    function containsUnicodeCharacters(text) {
      for (var i = 0; i < text.length; i++) {
        if (text.charCodeAt(i) > 127) {
          return true;
        }
      }
      return false;
    }
  });
  