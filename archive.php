<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class('index-box') ?> id="post-<?php the_ID(); ?>">

			<div class="author-pic">
				<?php /* <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>"><?php echo get_avatar(get_the_author_meta('ID'),80) ?></a> */ ?>
			</div>

			<div class="post-title-list">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</div>

			<div class="post-content-list">
				<?php the_excerpt(); ?>
			</div>

			<br clear="all">
			<?php /* include (TEMPLATEPATH . '/inc/meta.php' ); */ ?>

		</div>

<?php endwhile; ?>

	<div class="post-navigation">
		<ul>
			<li><?php next_posts_link('&laquo; Previous page') ?></li>
			<li><?php previous_posts_link('Next page &raquo;') ?></li>
		</ul>
	</div>

<div>

<?php else : ?>

	<div class="row" style="margin:1px 0 20px 0; padding: 40px 40px; background-color:#f9f9f9; border-bottom:3px #ddd solid; text-align:center;">
	<?php
		echo "<strong>Nothing Here To Read. Why Not Create Something!</strong><br><br>";

		if ( is_user_logged_in() ) {
			echo '<p><a class="btn btn-large btn-success" href="/wp-admin/post-new.php" style="color:#fff;"><i class="icon-pencil"></i> Post An Article</a></p>';
		} else {
			echo '<a class="btn btn-large btn-default" href="/wp-login.php?action=register" style="color:#333;">Register</a> &nbsp; <a class="btn btn-large btn-success" href="/wp-login.php" style="color:#fff;">Log In</a>';
		}
	?>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
