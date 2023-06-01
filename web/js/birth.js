//Start Validation for registration dates
$(document).ready(function() {
  $('.b_reg_year input').on('keydown', function(e) {
    var maxCharacters = 4;
    if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      e.preventDefault();
    }
  });
});

$(document).ready(function(){
  var monthRegex = /^(१[२१]|[१-९]|१०)$/;  //this monthyRegex values only to insert these values (१[२१])=> १२,११, ([१-९])=>१-९, १०
  document.getElementById('b_reg_month').addEventListener('keypress', function() {
    var monthVal = this.value;

    if (!monthRegex.test(monthVal)) {
      this.value = '';
      alert('महिना १ देखि १२ हुनुपर्छ');
    }
  });
})

$(document).ready(function(){
    var dayRegex = /^(३[२१]|२[१-९]|१[१-९]|[१-९]|१०|२०|३०)$/;  //this dayRegex values only to insert these values (३[२१])=> ३२,३१, (२[१-९])=>२१-२९, (१[१-९])=>११-१९, ([१-९])=>१-९, १०,२०,३०
    document.getElementById('b_reg_day').addEventListener('keypress', function() {
      var dayVal = this.value;

      if (!dayRegex.test(dayVal)) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
})
//End validation for registration date


//Start validation for birth date
$(document).ready(function() {
  $('.b_birth_year input').on('keydown', function(e) {
    var maxCharacters = 4;
    if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      e.preventDefault();
    }
  });
});

$(document).ready(function(){
  var monthRegex = /^(१[२१]|[१-९]|१०)$/;  //this monthyRegex values only to insert these values (१[२१])=> १२,११, ([१-९])=>१-९, १०
  document.getElementById('b_birth_month').addEventListener('keypress', function() {
    var monthVal = this.value;

    if (!monthRegex.test(monthVal)) {
      this.value = '';
      alert('महिना १ देखि १२ हुनुपर्छ');
    }
  });
})

$(document).ready(function(){
    var dayRegex = /^(३[२१]|२[१-९]|१[१-९]|[१-९]|१०|२०|३०)$/;  //this dayRegex values only to insert these values (३[२१])=> ३२,३१, (२[१-९])=>२१-२९, (१[१-९])=>११-१९, ([१-९])=>१-९, १०,२०,३०
    document.getElementById('b_birth_day').addEventListener('keypress', function() {
      var dayVal = this.value;

      if (!dayRegex.test(dayVal)) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
})
// End validate for birth date

//Start validation for father citizenship details
$(document).ready(function() {
  $('.b_father_ctz_no input').on('keydown', function(e) {
    var maxCharacters = 14;
    if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      e.preventDefault();
    }
  });
});

$(document).ready(function() {
  $('.b_father_ctz_year input').on('keydown', function(e) {
    var maxCharacters = 4;
    if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      e.preventDefault();
    }
  });
});
$(document).ready(function(){
  var monthRegex = /^(१[२१]|[१-९]|१०)$/;  //this monthyRegex values only to insert these values (१[२१])=> १२,११, ([१-९])=>१-९, १०
  document.getElementById('b_father_ctz_month').addEventListener('keypress', function() {
    var monthVal = this.value;

    if (!monthRegex.test(monthVal)) {
      this.value = '';
      alert('महिना १ देखि १२ हुनुपर्छ');
    }
  });
})

$(document).ready(function(){
    var dayRegex = /^(३[२१]|२[१-९]|१[१-९]|[१-९]|१०|२०|३०)$/;  //this dayRegex values only to insert these values (३[२१])=> ३२,३१, (२[१-९])=>२१-२९, (१[१-९])=>११-१९, ([१-९])=>१-९, १०,२०,३०
    document.getElementById('b_father_ctz_day').addEventListener('keypress', function() {
      var dayVal = this.value;

      if (!dayRegex.test(dayVal)) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
})
//End validation for father citizenship details

//Start validation for mother citizenship details
$(document).ready(function() {
  $('.b_mother_ctz_no input').on('keydown', function(e) {
    var maxCharacters = 14;
    if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      e.preventDefault();
    }
  });
});
$(document).ready(function() {
  $('.b_mother_ctz_year input').on('keydown', function(e) {
    var maxCharacters = 4;
    if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      e.preventDefault();
    }
  });
});

$(document).ready(function(){
  var monthRegex = /^(१[२१]|[१-९]|१०)$/;  //this monthyRegex values only to insert these values (१[२१])=> १२,११, ([१-९])=>१-९, १०
  document.getElementById('b_mother_ctz_month').addEventListener('keypress', function() {
    var monthVal = this.value;

    if (!monthRegex.test(monthVal)) {
      this.value = '';
      alert('महिना १ देखि १२ हुनुपर्छ');
    }
  });
})


$(document).ready(function(){
    var dayRegex = /^(३[२१]|२[१-९]|१[१-९]|[१-९]|१०|२०|३०)$/;  //this dayRegex values only to insert these values (३[२१])=> ३२,३१, (२[१-९])=>२१-२९, (१[१-९])=>११-१९, ([१-९])=>१-९, १०,२०,३०
    document.getElementById('b_mother_ctz_day').addEventListener('keypress', function() {
      var dayVal = this.value;

      if (!dayRegex.test(dayVal)) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
})
//End validation for mother citizenship details

//Start validation for informant citizenship details
$(document).ready(function() {
  $('.b_inf_ctz_no input').on('keydown', function(e) {
    var maxCharacters = 14;//limits the maximum number of chacracters to 14
    if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      e.preventDefault();
    }
  });
});
$(document).ready(function() {
  $('.b_inf_ctz_year input').on('keydown', function(e) {
    var maxCharacters = 4; //limits the maximum number of chacracters to 4
    if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      e.preventDefault();
    }
  });
});
$(document).ready(function(){
  var monthRegex = /^(१[२१]|[१-९]|१०)$/;  //this monthyRegex values only to insert these values (१[२१])=> १२,११, ([१-९])=>१-९, १०
  document.getElementById('b_inf_ctz_month').addEventListener('keypress', function() {
    var monthVal = this.value;

    if (!monthRegex.test(monthVal)) {
      this.value = '';
      alert('महिना १ देखि १२ हुनुपर्छ');
    }
  });
})

$(document).ready(function(){
    var dayRegex = /^(३[२१]|२[१-९]|१[१-९]|[१-९]|१०|२०|३०)$/;  //this dayRegex values only to insert these values (३[२१])=> ३२,३१, (२[१-९])=>२१-२९, (१[१-९])=>११-१९, ([१-९])=>१-९, १०,२०,३०
    document.getElementById('b_inf_ctz_day').addEventListener('keypress', function() {
      var dayVal = this.value;

      if (!dayRegex.test(dayVal)) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
})
//End validation for informant citizenship details

//Start validation for married year
$(document).ready(function() {
  $('.b_married_year input').on('keydown', function(e) {
    var maxCharacters = 4; //limits the maximum number of chacracters to 4
    if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      e.preventDefault();
    }
  });
});
//End validation for married year