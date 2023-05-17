
$(document).ready(function(){
  $("#goingbtn").click(function(){
    $("#goingrow").removeClass('hidden');
    $("#comingrow").addClass('hidden');

  });
  $("#comingbtn").click(function(){
    $("#comingrow").removeClass('hidden');
    $("#goingrow").addClass('hidden');
  });
});