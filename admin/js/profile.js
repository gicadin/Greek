$(document).ready(function(){

  $('#content').on("click", "#admin_profileEditFormButton", function(e){

    var data = $('#admin_profileForm').serializeArray();
    data.push({'name' : "class", 'value' : 'Profile' });
    data.push({'name' : "action", 'value' : 'edit'});

    $.ajax({
      type:"POST",
      url:"index.php",
      data: data,
      success: function(response){
        console.log("Add Item button pressed");
        $("#content").html(response);
      },
      error: function(xhr, status, error) {
        alert("Add Item button error " );
      }
    });

    e.preventDefault();

  });

});