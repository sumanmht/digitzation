// //grandfather-checkbox gets values from those id and places in informants id
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
        $('#b_inf_ctz_no').val('');
        $('#b_inf_ctz_year').val('');
        $('#b_inf_ctz_month').val('');
        $('#b_inf_ctz_day').val('');
        $('#ad_inf_ctz_year').val('');
        $('#ad_inf_ctz_month').val('');
        $('#ad_inf_ctz_day').val('')
        $('#inf_ctz_district ').val('');
    });

    $('#father-checkbox').click(function(){
        var father_fname = $('#father_fname').val();
        var father_mname = $('#father_mname').val();
        var father_lname = $('#father_lname').val();
        var father_fname_eng = $('#father_fname_eng').val();
        var father_mname_eng = $('#father_mname_eng').val();
        var father_lname_eng = $('#father_lname_eng').val();
        var father_ctz_no = $('#b_father_ctz_no').val();
        var father_ctz_year = $('#b_father_ctz_year').val();
        var father_ctz_month = $('#b_father_ctz_month').val();
        var father_ctz_day = $('#b_father_ctz_day').val();
        var ad_father_ctz_year = $('#ad_father_ctz_year').val();
        var ad_father_ctz_month = $('#ad_father_ctz_month').val();
        var ad_father_ctz_day = $('#ad_father_ctz_day').val();
        var father_ctz_district= $('#father_ctz_district').val();
        

        $('#inf_fname').val(father_fname);
        $('#inf_mname').val(father_mname);
        $('#inf_lname').val(father_lname);
        $('#inf_fname_eng').val(father_fname_eng);
        $('#inf_mname_eng').val(father_mname_eng);
        $('#inf_lname_eng').val(father_lname_eng);
        $('#b_inf_ctz_no').val(father_ctz_no);
        $('#b_inf_ctz_year').val(father_ctz_year);
        $('#b_inf_ctz_month').val(father_ctz_month);
        $('#b_inf_ctz_day').val(father_ctz_day);
        $('#ad_inf_ctz_year').val(ad_father_ctz_year);
        $('#ad_inf_ctz_month').val(ad_father_ctz_month);
        $('#ad_inf_ctz_day').val(ad_father_ctz_day)
        $('#inf_ctz_district ').val(father_ctz_district);
        $('#relation').val('बाबु');

    });
    
    $('#mother-checkbox').click(function(){
        var mother_fname = $('#mother_fname').val();
        var mother_mname = $('#mother_mname').val();
        var mother_lname = $('#mother_lname').val();
        var mother_fname_eng = $('#mother_fname_eng').val();
        var mother_mname_eng = $('#mother_mname_eng').val();
        var mother_lname_eng = $('#mother_lname_eng').val();
        var mother_ctz_no = $('#b_mother_ctz_no').val();
        var mother_ctz_year = $('#b_mother_ctz_year').val();
        var mother_ctz_month = $('#b_mother_ctz_month').val();
        var mother_ctz_day = $('#b_mother_ctz_day').val();
        var ad_mother_ctz_year = $('#ad_mother_ctz_year').val();
        var ad_mother_ctz_month = $('#ad_mother_ctz_month').val();
        var ad_mother_ctz_day = $('#ad_mother_ctz_day').val();
        var mother_ctz_district = $('#mother_ctz_district').val();

        $('#inf_fname').val(mother_fname);
        $('#inf_mname').val(mother_mname);
        $('#inf_lname').val(mother_lname);
        $('#inf_fname_eng').val(mother_fname_eng);
        $('#inf_mname_eng').val(mother_mname_eng);
        $('#inf_lname_eng').val(mother_lname_eng);
        $('#b_inf_ctz_no').val(mother_ctz_no);
        $('#b_inf_ctz_year').val(mother_ctz_year);
        $('#b_inf_ctz_month').val(mother_ctz_month);
        $('#b_inf_ctz_day').val(mother_ctz_day);
        $('#ad_inf_ctz_year').val(ad_mother_ctz_year);
        $('#ad_inf_ctz_month').val(ad_mother_ctz_month);
        $('#ad_inf_ctz_day').val(ad_mother_ctz_day);
        $('#inf_ctz_district').val(mother_ctz_district);
        $('#relation').val('आमा');
    });
    
});

