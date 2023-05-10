// function father(){
            
//             var father_ctz_district = document.getElementById("father_ctz_district").value;
//             document.getElementById("inf_ctz_district").value = father_ctz_district;
//         };
// function grandfather(){
//             var grandfather_fname = document.getElementById("grandfather_fname").value;
//             document.getElementById("informant_fname").value = grandfather_fname;
//             var grandfather_mname = document.getElementById("grandfather_mname").value;
//             document.getElementById("informant_mname").value = grandfather_mname;
//         };



$(document).ready(function(){
    $('#grandfather-checkbox').click(function(){
        var grandfather_fname = $('#grandfather_fname').val();
        $('#informant_fname').val(grandfather_fname);
        var grandfather_mname = $('#grandfather_mname').val();
        $('#informant_mname').val(grandfather_mname);
        var grandfather_lname = $('#grandfather_lname').val();
        $('#informant_lname').val(grandfather_lname);
    });
});

$(document).ready(function(){
    $('#father-checkbox').click(function(){
        var father_fname = $('#father_fname').val();
        var father_mname = $('#father_mname').val();
        var father_lname = $('#father_lname').val();
        var father_ctz_no = $('#father_ctz_no').val();
        var father_ctz_year = $('#father_ctz_year').val();
        var father_ctz_month = $('#father_ctz_month').val();
        var father_ctz_day = $('#father_ctz_day').val();
        var father_ctz_district= $('#father_ctz_district').val();
        

        $('#informant_fname').val(father_fname);
        $('#informant_mname').val(father_mname);
        $('#informant_lname').val(father_lname);
        $('#inf_ctz_no').val(father_ctz_no);
        $('#inf_ctz_year').val(father_ctz_year);
        $('#inf_ctz_month').val(father_ctz_month);
        $('#inf_ctz_day').val(father_ctz_day);
        $('#inf_ctz_district ').val(father_ctz_district);
    });
});

$(document).ready(function(){
    $('#mother-checkbox').click(function(){
        var mother_fname = $('#mother_fname').val();
        var mother_mname = $('#mother_mname').val();
        var mother_lname = $('#mother_lname').val();
        var mother_ctz_no = $('#mother_ctz_no').val();
        var mother_ctz_year = $('#mother_ctz_year').val();
        var mother_ctz_month = $('#mother_ctz_month').val();
        var mother_ctz_day = $('#mother_ctz_day').val();
        var mother_ctz_district = $('#mother_ctz_district').val();

        $('#informant_fname').val(mother_fname);
        $('#informant_mname').val(mother_mname);
        $('#informant_lname').val(mother_lname);
        $('#inf_ctz_no').val(mother_ctz_no);
        $('#inf_ctz_year').val(mother_ctz_year);
        $('#inf_ctz_month').val(mother_ctz_month);
        $('#inf_ctz_day').val(mother_ctz_day);
        $('#inf_ctz_district').val(mother_ctz_district);
    });
});


