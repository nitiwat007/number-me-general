$(function(){
  //$("#btnprint").prop("disabled",true);
  $("#btnprint").click(function(){
    $("#form").hide();
    window.print();
    $("#form").show(); 
  });
});
