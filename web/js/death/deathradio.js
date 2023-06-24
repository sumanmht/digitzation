// //grandfather-checkbox gets values from those id and places in informants id
$(document).ready(function(){
    $('#d-grandfather-checkbox').click(function(){
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

    $('#d-father-checkbox').click(function(){
        var father_fname = $('#father_fname').val();
        var father_mname = $('#father_mname').val();
        var father_lname = $('#father_lname').val();
        var father_fname_eng = $('#father_fname_eng').val();
        var father_mname_eng = $('#father_mname_eng').val();
        var father_lname_eng = $('#father_lname_eng').val();
        
        

        $('#inf_fname').val(father_fname);
        $('#inf_mname').val(father_mname);
        $('#inf_lname').val(father_lname);
        $('#inf_fname_eng').val(father_fname_eng);
        $('#inf_mname_eng').val(father_mname_eng);
        $('#inf_lname_eng').val(father_lname_eng);
       
        $('#relation').val('बाबु');

    });
    
    $('#d-spouse-checkbox').click(function(){
        var spouse_fname = $('#spouse_fname').val();
        var spouse_mname = $('#spouse_mname').val();
        var spouse_lname = $('#spouse_lname').val();
        var spouse_fname_eng = $('#spouse_fname_eng').val();
        var spouse_mname_eng = $('#spouse_mname_eng').val();
        var spouse_lname_eng = $('#spouse_lname_eng').val();
        
        $('#inf_fname').val(spouse_fname);
        $('#inf_mname').val(spouse_mname);
        $('#inf_lname').val(spouse_lname);
        $('#inf_fname_eng').val(spouse_fname_eng);
        $('#inf_mname_eng').val(spouse_mname_eng);
        $('#inf_lname_eng').val(spouse_lname_eng);
        
        $('#relation').val('पति/पत्नी');
    });
    
});

