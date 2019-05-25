jQuery (function($) {
  console.log('Ready!');

  $('.show-more a').on('click', showMore);

  function showMore(e) {
    e.preventDefault();
    $(this).parent().parent().find('.player-stats').css('display', 'flex');
    $(this).text('Show Less');
    $(this).off('click').on('click', showLess)
  } //showMore

  function showLess(e) {
    e.preventDefault();
    $(this).parent().parent().find('.player-stats').hide();
    $(this).text('Show More');
    $(this).off('click').on('click', showMore)
  } //showLess

  $(window).resize(function() {
    $('.player-card').find('.player-stats').removeAttr('style');
    $('.show-more a').text('Show More');
    $('.show-more a').off('click').on('click', showMore);
  }); //reset on resize

  $('.competition a').click(function(e) {
    e.preventDefault();
    $(this).each(function() {
      var context = $(this).parent().parent().find('.player-stats');
      // var context = $(this).closest('.player-stats');
      var competition = $(this).attr('data-comp');
      var player = $(this).attr('data-player');
      $.post(
        'stats.php', {
          competition: competition,
          player_id: player }
        ).done(function(data) {
          $(context).html(data);
        }); // post ajax
    }); // each
  }); // click

  $('.edit select').on('change', stats);

  function stats(e) {
    e.preventDefault();
    console.log('Changed!');
    var context = $(this).parent().parent().parent().parent();
    var competition = $(this).val();
    var player = $(this).parent().find('input').val()
    $.post(
      'stats_edit.php', {
        competition: competition,
        player_id: player }
      ).done(function(data) {
        $(context).html(data);
        $('.edit select').on('change', stats);

      }); // post ajax
  }
  // }); // change


  // if ($('.player-card').css('max-width') == '50%') {
  //   $(this).find('.player-stats').css('display', 'flex');
  // }
});
