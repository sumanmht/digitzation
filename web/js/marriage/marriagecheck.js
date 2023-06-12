$(document).ready(function(){
    $('#groom-checkbox').click(function(){
        var gFname = $('#gFname').val();
        var gMname = $('#gMname').val();
        var gLname = $('#gLname').val();
        var gFnameEng = $('#gFnameEng').val();
        var gMnameEng = $('#gMnameEng').val();
        var gLnameEng = $('#gLnameEng').val();
        
        var gCtz = $('#gCtz').val();
        var gCtzYear = $('#m_g_ctz_year').val();
        var gCtzMonth = $('#m_g_ctz_month').val();
        var gCtzDay = $('#m_g_ctz_day').val();
        var AdgCtzYear = $('#ad_m_g_ctz_year').val();
        var AdgCtzMonth = $('#ad_m_g_ctz_month').val();
        var AdgCtzDay = $('#ad_m_g_ctz_day').val();
        var gCtzD = $('#groom_ctz_district').val();
        
        $('#inf1Fname').val(gFname);
        $('#inf1Mname').val(gMname);
        $('#inf1Lname').val(gLname);
        $('#inf1FnameEng').val(gFnameEng);
        $('#inf1MnameEng').val(gMnameEng);
        $('#inf1LnameEng').val(gLnameEng);
        $('#inf1_ctz_no').val(gCtz);
        $('#inf1_ctz_year').val(gCtzYear);
        $('#inf1_ctz_month').val(gCtzMonth);
        $('#inf1_ctz_day').val(gCtzDay);
        $('#ad_inf1_ctz_year').val(AdgCtzYear);
        $('#ad_inf1_ctz_month').val(AdgCtzMonth);
        $('#ad_inf1_ctz_day').val(AdgCtzDay);
        $('#inf1_ctz_district').val(gCtzD);
        
        $("#inf1").toggleClass('hidden');

    });
    $('#bride-checkbox').click(function(){
        var bFname = $('#bFname').val();
        var bMname = $('#bMname').val();
        var bLname = $('#bLname').val();
        var bFnameEng = $('#bFnameEng').val();
        var bMnameEng = $('#bMnameEng').val();
        var bLnameEng = $('#bLnameEng').val();
        
        var bCtz = $('#bCtz').val();
        var bCtzYear = $('#m_b_ctz_year').val();
        var bCtzMonth = $('#m_b_ctz_month').val();
        var bCtzDay = $('#m_b_ctz_day').val();
        var AdbCtzYear = $('#ad_m_b_ctz_year').val();
        var AdbCtzMonth = $('#ad_m_b_ctz_month').val();
        var AdbCtzDay = $('#ad_m_b_ctz_day').val();
        var bCtzD = $('#bCtzD').val();
        
        $('#inf2Fname').val(bFname);
        $('#inf2Mname').val(bMname);
        $('#inf2Lname').val(bLname);
        $('#inf2FnameEng').val(bFnameEng);
        $('#inf2MnameEng').val(bMnameEng);
        $('#inf2LnameEng').val(bLnameEng);
        $('#inf2_ctz_no').val(bCtz);
        $('#inf2_ctz_year').val(bCtzYear);
        $('#inf2_ctz_month').val(bCtzMonth);
        $('#inf2_ctz_day').val(bCtzDay);
        $('#ad_inf2_ctz_year').val(AdbCtzYear);
        $('#ad_inf2_ctz_month').val(AdbCtzMonth);
        $('#ad_inf2_ctz_day').val(AdbCtzDay);
        $('#inf2_ctz_district').val(bCtzD);        
        
        $("#inf2").toggleClass('hidden');

    });
    $("#inf1").addClass('hidden');
    $("#inf2").addClass('hidden');
});