$.ajax({
  method: 'get',
  url: 'display.php',
  dataType: 'html',
  success: function(response) {
    $('.table-responsive').html(response);
  }
}); // ajax get on page load

$(document).ready(function() {
  $('input[type=submit]').on('click', function(e) {
   e.preventDefault();

   var $form = $(this).parents('tr').find('form');
   $.ajax({
     method: 'post',
     url: $form.attr("action"),
     data: $form.serialize(),
     dataType: 'text',
     success: function(strMessage) {

        $('#message').text(strMessage);
        // $('form')[0].reset();
      }
    }); //ajax post

    $.ajax({
      method: 'get',
      url: 'display.php',
      dataType: 'html',
      success: function(response) {
        $('.table-responsive').html(response);
      }
    }); //ajax get
  }); //submit
}); //ready
