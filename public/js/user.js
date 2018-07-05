 $(document).ready(function(){
  $("#usuario").change(function(event){
  $.get("User/"+event.target.value+"",function(response ,state){
    console.log(response);
  });
});
});