$(function() {
  $('#code').hide();

  $('.code-button button').click(function() {
    $('.code-button').after('<button class="copy-code" data-clipboard-target="#code">Copy Code</button>');
    new ClipboardJS('.copy-code');
    $('#code').text($('li.row').parent().html());
    $('#code').show();
    copyReady();
  });

  function copyReady() {
    $('button.copy-code').click(function() {
      alert('Copied!');
    });
  }
});
