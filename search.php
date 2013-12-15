<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; ?>

	<?php while (have_posts()) : the_post(); ?>

	<div <?php post_class('index-box') ?>>

		<?php /* include (TEMPLATEPATH . '/inc/meta.php' ); */ ?>

		<div id="post-<?php the_ID(); ?>" class="post-title">
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		</div>

		<div class="post-content">
			<?php the_excerpt(); ?>
		</div>
		<div class="post-meta-data">
			<?php the_tags('Tags: ', ', ', '<br />'); ?>
		</div>
	</div>

<?php endwhile; ?>
<div>

<?php else : ?>


	<div class="row" style="margin:1px 0 20px 0; padding: 40px 40px; background-color:#f9f9f9; border-bottom:3px #ddd solid; text-align:center;">
	<?php
		echo "<strong>Not Found. Why Not Create Something!</strong><br><br>";

		if ( is_user_logged_in() ) {
			echo '<p><a class="btn btn-large btn-success" href="/wp-admin/post-new.php" style="color:#fff;"><i class="icon-pencil"></i> Post An Article</a></p>';
		} else {
			echo '<a class="btn btn-large btn-default" href="/wp-login.php?action=register" style="color:#333;">Register</a> &nbsp; <a class="btn btn-large btn-success" href="/wp-login.php" style="color:#fff;">Log In</a>';
		}
	?>
	</div>


<?php endif; ?>

<?php get_footer(); ?>
