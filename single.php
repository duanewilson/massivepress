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
					 <div class="post-date-subtitle"><?php echo (get_the_modified_time() !== get_the_time())?"Updated ".get_the_modified_time('F j, Y'):"Posted ".get_the_time('F j, Y');  ?><?php echo ' in '; the_category(', '); ?></div>

					 <div class="post-content">
						<?php the_content(); ?>
					 </div>
					 <div class="post-meta-data">
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
					 </div>


					<div class="row" style="margin:90px 0 0 0; padding: 10px 10px;">
						<?php previous_post_link('%link','<strong><i class="icon-chevron-left"></i> %title</strong><br>', TRUE); ?>
					</div>
					<div class="row" style="margin:1px 0 20px 0; padding: 40px 40px; background-color:#f9f9f9; border-bottom:3px #ddd solid; text-align:center;">
					<?php
					$nextPost = get_next_post(true); if($nextPost) {
						echo '<h4>';
						next_post_link('%link','%title', TRUE);
						echo '</h4>';

						$nextexcerpt = $nextPost->post_excerpt ? $nextPost->post_excerpt:apply_filters('get_the_excerpt', substr($nextPost->post_content,0,120).'...');
						echo '<p>';
						echo $nextexcerpt;
						echo '&nbsp;&nbsp;'. floor(wcount() / 200) + 1 . ' min read by '; the_author_posts_link();
						echo '</p>';
					}
					else {
						$category_id = get_cat_ID( 'Articles' ); $category_link = get_category_link( $category_id );
						echo "<strong>Nothing More To Read. Why Not Create Something!</strong><br><br>";

						if ( is_user_logged_in() ) {
							echo '<p><a class="btn btn-large btn-success" href="/wp-admin/post-new.php" style="color:#fff;"><i class="icon-pencil"></i> Post An Article</a></p>';
						} else {
							echo '<a class="btn btn-large btn-default" href="/wp-login.php?action=register" style="color:#333;">Register</a> &nbsp; <a class="btn btn-large btn-success" href="/wp-login.php" style="color:#fff;">Log In</a>';
						}

					}
					?>
					</div>

					</div> <!-- /post-readability -->

				</div>

				<div class="bio">
					<div class="author-picture"><?php echo get_avatar( get_the_author_meta( 'ID' ),73 ); ?></div>
					<div class="author-name"><?php the_author_posts_link(); ?></div>
					<div class="author-bio"><?php the_author_meta('description') ?></div>
					<div class="post-date">
					<p style="margin-top:12px;">
					<?php
						if ( is_user_logged_in() ) { ?>
						<a class="btn btn-link" href="<?php bloginfo('siteurl'); ?>/wp-admin/post-new.php" style="color:#000;"><i class="icon-pencil"></i> Post An Article</a>
						<?php } else { ?>
						<a class="btn btn-large btn-default" href="<?php bloginfo('siteurl'); ?>/wp-login.php?action=register" style="color:#333;">Register</a> &nbsp; <a class="btn btn-large btn-success" href="<?php bloginfo('siteurl'); ?>/wp-login.php" style="color:#fff;">Log In</a>
						<?php }
					?>
					</p>
					</div>

				</div>

			<?php endwhile; endif; ?>

			<?php get_footer(); ?>
