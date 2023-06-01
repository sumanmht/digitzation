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
        var grandfather_mname = $('#grandfather_mname').val();
        var grandfather_lname = $('#grandfather_lname').val();
        var grandfather_fname_eng = $('#grandfather_fname_eng').val();
        var grandfather_mname_eng = $('#grandfather_mname_eng').val();
        var grandfather_lname_eng = $('#grandfather_lname_eng').val();

        $('#inf_fname').val(grandfather_fname);        
        $('#inf_mname').val(grandfather_mname);        
        $('#inf_lname').val(grandfather_lname);
        $('#inf_fname_eng').val(grandfather_fname_eng);        
        $('#inf_mname_eng').val(grandfather_mname_eng);        
        $('#inf_lname_eng').val(grandfather_lname_eng);               
        $('#relation').val('बाजे');
    });
});

$(document).ready(function(){
    $('#father-checkbox').click(function(){
        var father_fname = $('#father_fname').val();
        var father_mname = $('#father_mname').val();
        var father_lname = $('#father_lname').val();
        var father_fname_eng = $('#father_fname_eng').val();
        var father_mname_eng = $('#father_mname_eng').val();
        var father_lname_eng = $('#father_lname_eng').val();
        var father_ctz_no = $('#father_ctz_no').val();
        var father_ctz_year = $('#father_ctz_year').val();
        var father_ctz_month = $('#father_ctz_month').val();
        var father_ctz_day = $('#father_ctz_day').val();
        var father_ctz_district= $('#father_ctz_district').val();
        

        $('#inf_fname').val(father_fname);
        $('#inf_mname').val(father_mname);
        $('#inf_lname').val(father_lname);
        $('#inf_fname_eng').val(father_fname_eng);
        $('#inf_mname_eng').val(father_mname_eng);
        $('#inf_lname_eng').val(father_lname_eng);
        $('#inf_ctz_no').val(father_ctz_no);
        $('#inf_ctz_year').val(father_ctz_year);
        $('#inf_ctz_month').val(father_ctz_month);
        $('#inf_ctz_day').val(father_ctz_day);
        $('#inf_ctz_district ').val(father_ctz_district);
        $('#relation').val('बाबु');
    });
});

$(document).ready(function(){
    $('#mother-checkbox').click(function(){
        var mother_fname = $('#mother_fname').val();
        var mother_mname = $('#mother_mname').val();
        var mother_lname = $('#mother_lname').val();
        var mother_fname_eng = $('#mother_fname_eng').val();
        var mother_mname_eng = $('#mother_mname_eng').val();
        var mother_lname_eng = $('#mother_lname_eng').val();
        var mother_ctz_no = $('#mother_ctz_no').val();
        var mother_ctz_year = $('#mother_ctz_year').val();
        var mother_ctz_month = $('#mother_ctz_month').val();
        var mother_ctz_day = $('#mother_ctz_day').val();
        var mother_ctz_district = $('#mother_ctz_district').val();

        $('#inf_fname').val(mother_fname);
        $('#inf_mname').val(mother_mname);
        $('#inf_lname').val(mother_lname);
        $('#inf_fname_eng').val(mother_fname_eng);
        $('#inf_mname_eng').val(mother_mname_eng);
        $('#inf_lname_eng').val(mother_lname_eng);
        $('#inf_ctz_no').val(mother_ctz_no);
        $('#inf_ctz_year').val(mother_ctz_year);
        $('#inf_ctz_month').val(mother_ctz_month);
        $('#inf_ctz_day').val(mother_ctz_day);
        $('#inf_ctz_district').val(mother_ctz_district);
        $('#relation').val('आमा');

        
    });
});



