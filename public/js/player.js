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

  // if ($('.player-card').css('max-width') == '50%') {
  //   $(this).find('.player-stats').css('display', 'flex');
  // }
});
