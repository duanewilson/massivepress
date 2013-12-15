<?php
	if (is_home()){
		echo '&nbsp;&nbsp;'. floor(wcount() / 200) + 1 . ' min read by ';
		the_author_posts_link();
	}
	else {

	?>
<div class="meta">
	<?php if(!is_page()){
		//echo '<a href="./index.php"><i class="icon-home"></i></a> ';
	} ?>
	<?php /* <span class="meta-time"><i class="icon-bookmark hide"></i> <small style="color:#999;"><?php echo floor(wcount() / 200) + 1 . ' min read' ?></small></span> */ ?>
</div>

<?php } ?>

