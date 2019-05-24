<footer>
  &copy; <?php echo date('Y'); ?> Real Salt Lake
</footer>

</div><!--end container-->

<script src="<?php echo url_for('/js/popper.min.js'); ?>"></script>
<script src="<?php echo url_for('/js/bootstrap.min.js'); ?>"></script>

</body>
</html>

<?php
  db_disconnect($database);
?>
