<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($post)) {
  redirect_to(url_for('/staff/posts/index.php'));
}
?>

<dl>
  <dt>Title</dt>
  <dd><input type="text" name="post[title]" value="<?php echo h($post->title); ?>" /></dd>
</dl>

<dl>
  <dt>Link</dt>
  <dd><input type="text" name="post[link]" value="<?php echo h($post->link); ?>" /></dd>
</dl>

<dl>
  <dt>Publish Date</dt>
  <dd><input type="date" name="post[pubDate]" value="<?php echo h($post->pubDate); ?>" /></dd>
</dl>

<dl>
  <dt>Image Link</dt>
  <dd><input type="text" name="post[imageLink]" value="<?php echo h($post->imageLink); ?>" /></dd>
</dl>

<dl>
  <dt>Team</dt>
  <dd><select name="post[team]">
    <option value=""></option>
  <?php foreach(Feed::TEAMS as $team_id => $team_name) { ?>
    <option value="<?php echo $team_id; ?>" <?php if($post->team == $team_id) { echo 'selected'; } ?>><?php echo $team_name; ?></option>
  <?php } ?>
  </select></dd>
</dl>
