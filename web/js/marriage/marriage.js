
$(document).ready(function() {
 
    //Start Validation for registration dates
    document.getElementById('m_reg_year').addEventListener('input', function(e){
      var rmaxCharacters = 4;
      var inputValue = this.value;
      if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
        e.preventDefault();        
        alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
        this.value = '';        
      }
    });
   
    var rmonthRegex = /^(0[1-9]|1[1-2]|[1-9]|10)$/;
    document.getElementById('m_reg_month').addEventListener('input', function(e) {
      var rmonthVal = this.value;
  
      if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('महिना 01 देखि 12 हुनुपर्छ');
      }
    });
  
  
    var rdayRegex = /^(0[1-9]|3[21]|2[1-9]|1[1-9]|[1-9]|10|20|30)$/;  //this dayRegex values only to insert these values (३[२१])=> ३२,३१, (२[१-९])=>२१-२९, (१[१-९])=>११-१९, ([१-९])=>१-९, १०,२०,३०
    document.getElementById('m_reg_day').addEventListener('input', function(e) {
      var rdayVal = this.value;
  
      if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
    //End validation for registration date

    //Start Validation for marriage dates
    document.getElementById('m_marriage_year').addEventListener('input', function(e){
      var rmaxCharacters = 4;
      var inputValue = this.value;
      if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
        e.preventDefault();
        alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
        this.value = '';
      }
    });
   
    var rmonthRegex = /^(0[1-9]|1[1-2]|[1-9]|10)$/;
    document.getElementById('m_marriage_month').addEventListener('input', function(e) {
      var rmonthVal = this.value;
  
      if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('महिना 01 देखि 12 हुनुपर्छ');
      }
    });
  
  
    var rdayRegex = /^(0[1-9]|3[21]|2[1-9]|1[1-9]|[1-9]|10|20|30)$/;  //this dayRegex values only to insert these values (३[२१])=> ३२,३१, (२[१-९])=>२१-२९, (१[१-९])=>११-१९, ([१-९])=>१-९, १०,२०,३०
    document.getElementById('m_marriage_day').addEventListener('input', function(e) {
      var rdayVal = this.value;
  
      if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
    //End validation for marriage date
  
  
    //Start validation for groom birth date
    document.getElementById('m_g_birth_year').addEventListener('input', function(e){
      var rmaxCharacters = 4;
      var inputValue = this.value;
      if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
        e.preventDefault();
        alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
        this.value = '';
      }
    });  
    document.getElementById('m_g_birth_month').addEventListener('input', function(e) {
      var rmonthVal = this.value;
  
      if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('महिना 01 देखि 12 हुनुपर्छ');
      }
    });  
    document.getElementById('m_g_birth_day').addEventListener('input', function(e) {
      var rdayVal = this.value;
  
      if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
    // End validate for groom birth date

    //Start validation for bride birth date
    document.getElementById('m_b_birth_year').addEventListener('input', function(e){
      var rmaxCharacters = 4;
      var inputValue = this.value;
      if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
        e.preventDefault();
        alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
        this.value = '';
      }
    });  
    document.getElementById('m_b_birth_month').addEventListener('input', function(e) {
      var rmonthVal = this.value;
  
      if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('महिना 01 देखि 12 हुनुपर्छ');
      }
    });  
    document.getElementById('m_b_birth_day').addEventListener('input', function(e) {
      var rdayVal = this.value;
  
      if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
    // End validate for bride birth date
  
  
    //Start validation for groom citizenship details
    $('.gCtz').on('keydown', function(e) {
        var fmaxCharacters = 14;
        if ($(this).val().length >= fmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
          e.preventDefault();
        }
      });
    document.getElementById('m_g_ctz_year').addEventListener('input', function(e){
      var rmaxCharacters = 4;
      var inputValue = this.value;
      if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
        e.preventDefault();
        alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
        this.value = '';
      }
    });
    
    document.getElementById('m_g_ctz_month').addEventListener('input', function(e) {
      var rmonthVal = this.value;
  
      if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('महिना 01 देखि 12 हुनुपर्छ');
      }
    });  
    document.getElementById('m_g_ctz_day').addEventListener('input', function(e) {
      var rdayVal = this.value;
  
      if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        this.value = '';
        alert('गते १ देखि ३२ हुनुपर्छ');
      }
    });
    //End validation for groom citizenship details

    //Start validation for bride citizenship details
    $('.bCtz').on('keydown', function(e) {
      var fmaxCharacters = 14;
      if ($(this).val().length >= fmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
        e.preventDefault();
      }
    });
  document.getElementById('m_b_ctz_year').addEventListener('input', function(e){
    var rmaxCharacters = 4;
    var inputValue = this.value;
    if (inputValue.length >= rmaxCharacters && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46 && parseInt(inputValue) < 1900) {
      e.preventDefault();
      alert('वर्ष १९०० भन्दा माथि हुनुपर्छ ।');
      this.value = '';
    }
  });
  
  document.getElementById('m_b_ctz_month').addEventListener('input', function(e) {
    var rmonthVal = this.value;

    if (rmonthVal.length === 2 && !rmonthVal.match(rmonthRegex) && rmonthVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      this.value = '';
      alert('महिना 01 देखि 12 हुनुपर्छ');
    }
  });  
  document.getElementById('m_b_ctz_day').addEventListener('input', function(e) {
    var rdayVal = this.value;

    if (rdayVal.length === 2 && !rdayVal.match(rdayRegex) && rdayVal !== '0' && e.keyCode !== 8 && e.keyCode !== 9 && e.keyCode !== 46) {
      this.value = '';
      alert('गते १ देखि ३२ हुनुपर्छ');
    }
  });
  //End validation for bride citizenship details
  
  
  
  });
  