
$(document).ready(function() {
 
    //Start Validation for registration dates
    document.getElementById('b_reg_year').addEventListener('input', function(e){
      var rmaxCharacters = 4;
      var inputValue = $(this).val();
      if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
        e.preventDefault();
        alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
      }
    });
   
    var rmonthRegex = /^(0[1-9]|1[1-2]|[1-9]|10)$/;
    document.getElementById('b_reg_month').addEventListener('input', function(e) {
      var rmonthVal = this.value;
  
      if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('महिना 01 देखि 12 हुनुपर्छ');
      }
    });
  
  
    var rdayRegex = /^(0[1-9]|3[21]|2[1-9]|1[1-9]|[1-9]|10|20|30)$/;  //this dayRegex values only to insert these values (३[२१])=> ३२,३१, (२[१-९])=>२१-२९, (१[१-९])=>११-१९, ([१-९])=>१-९, १०,२०,३०
    document.getElementById('b_reg_day').addEventListener('input', function(e) {
      var rdayVal = this.value;
  
      if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
    //End validation for registration date
  
  
    //Start validation for birth date
    document.getElementById('b_birth_year').addEventListener('input', function(e){
      var rmaxCharacters = 4;
      var inputValue = $(this).val();
      if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
        e.preventDefault();
        alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
      }
    });  
    document.getElementById('b_birth_month').addEventListener('input', function(e) {
      var rmonthVal = this.value;
  
      if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('महिना 01 देखि 12 हुनुपर्छ');
      }
    });  
    document.getElementById('b_birth_day').addEventListener('input', function(e) {
      var rdayVal = this.value;
  
      if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
    // End validate for birth date
  
  
    //Start validation for father citizenship details
    $('.b_father_ctz_no input').on('keydown', function(e) {
        var fmaxCharacters = 14;
        if ($(this).val().length >= fmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
          e.preventDefault();
        }
      });
      document.getElementById('b_father_ctz_year').addEventListener('input', function(e){
        var rmaxCharacters = 4;
        var inputValue = $(this).val();
        if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
          e.preventDefault();
          alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
        }
      });
    
    ddocument.getElementById('b_father_ctz_month').addEventListener('input', function(e) {
      var rmonthVal = this.value;
  
      if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('महिना 01 देखि 12 हुनुपर्छ');
      }
    });  
    document.getElementById('b_father_ctz_day').addEventListener('input', function(e) {
      var rdayVal = this.value;
  
      if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
    //End validation for father citizenship details
  
  
    //Start validation for mother citizenship details
    $('.b_mother_ctz_no input').on('keydown', function(e) {
      var mmaxCharacters = 14;
      if ($(this).val().length >= mmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        e.preventDefault();
      }
    });
    document.getElementById('b_mother_ctz_year').addEventListener('input', function(e){
      var rmaxCharacters = 4;
      var inputValue = $(this).val();
      if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
        e.preventDefault();
        alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
      }
    });
    document.getElementById('b_mother_ctz_month').addEventListener('input', function(e) {
      var rmonthVal = this.value;
  
      if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('महिना 01 देखि 12 हुनुपर्छ');
      }
    });  
    document.getElementById('b_mother_ctz_day').addEventListener('input', function(e) {
      var rdayVal = this.value;
  
      if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });;
   //End validation for mother citizenship details
  
  
    //Start validation for informant citizenship details
    $('.b_inf_ctz_no input').on('keydown', function(e) {
      var maxCharacters = 14;//limits the maximum number of chacracters to 14
      if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        e.preventDefault();
      }
    });
    document.getElementById('b_inf_ctz_year').addEventListener('input', function(e){
      var rmaxCharacters = 4;
      var inputValue = $(this).val();
      if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
        e.preventDefault();
        alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
      }
    });;
    document.getElementById('b_inf_ctz_month').addEventListener('input', function(e) {
      var rmonthVal = this.value;
  
      if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('महिना 01 देखि 12 हुनुपर्छ');
      }
    });  
    document.getElementById('b_inf_ctz_day').addEventListener('input', function(e) {
      var rdayVal = this.value;
  
      if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
    //End validation for informant citizenship details
  
    //Start validation for married year
      $('.b_married_year input').on('keydown', function(e) {
      var maxCharacters = 4; //limits the maximum number of chacracters to 4
      if ($(this).val().length >= maxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        e.preventDefault();
      }
    });
    //End validation for married year
  });
  