<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="featured-image" id="bg">
		<?php
		if ( has_post_thumbnail() ) {
			//the_post_thumbnail('full', array( 'class' => "featured-img"));
			$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false, '');

			echo '<script>
			$(function() {
				$("#bg").backstretch("'.$src[0].'");
			});
			</script>';
		} else { ?>
			<script>
			$(function() {
				$("#bg").backstretch("<?php bloginfo('template_url'); ?>/images/featured.png");
			});
			</script>
		<?php
		}
		?>
	</div>

	<div class="group-and-comment">
	<div class="page-wrap">
		<div class="group-interior">
			<div class="bio-and-post-group">
				<div <?php post_class('index-box') ?> id="post-<?php the_ID(); ?>">

					<?php
					 //include (TEMPLATEPATH . '/inc/meta.php' );
					 get_template_part('/inc/meta.php')
					?>

					<div id="post-readability">
					<div class="post-title"><?php the_title(); ?></div>
					<div class="post-date-subtitle"><?php echo (get_the_modified_time() !== get_the_time())?"Updated ".get_the_modified_time('F j, Y'):"Posted ".get_the_time('F j, Y') ?></div>

					<div class="post-content">
						<?php the_content(); ?>
					</div>
					<div class="post-meta-data">
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
					</div>

					<p>&nbsp;</p>

					<div class="row" style="margin:0 0 20px 0;">
					 <div class="col-md-6 col-sm-6 col-xs-6 previous-page">
					 	<?php previous_post_link(); ?>
					 </div>
					 <div class="col-md-6 col-sm-6 col-xs-6 next-page">
					 	<?php next_post_link(); ?>
					 </div>
					</div>
					</div>

				</div>

				<div class="bio">
					<div class="author-picture"><?php echo get_avatar( get_the_author_meta( 'ID' ),73 ); ?></div>
					<div class="author-name"><?php the_author_posts_link(); ?></div>
					<div class="author-bio"><?php the_author_meta('description') ?></div>
					<div class="post-date hide"><?php echo (get_the_modified_time() !== get_the_time())?"Updated ".get_the_modified_time('F j, Y'):"Posted ".get_the_time('F j, Y') ?></div>
				</div>

		<?php endwhile; endif; ?>

		<?php get_footer(); ?>
