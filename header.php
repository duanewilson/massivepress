<!DOCTYPE html>
<html>
  <head>
  	<meta charset="<?php bloginfo('charset'); ?>">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow"><?php } ?>

	<title><?php if (function_exists('is_tag') && is_tag()) { single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' '; } elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; } elseif (is_404()) { echo 'Not Found - '; } if (is_home()) { bloginfo('name'); echo ' - '; bloginfo('description'); } else { bloginfo('name'); } if ($paged>1) { echo ' - page '. $paged; } ?></title>

	<meta name="description" content="<?php echo !empty($meta_description)?$meta_description:"" ?>">
	<meta name="keywords" content="<?php echo !empty($meta_keywords)?$meta_keywords:"" ?>">
	<link rel="shortcut icon" href="<?php echo !empty($favicon)?$favicon:bloginfo('stylesheet_directory')."/images/favicon.ico" ?>" type="image/x-icon">

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/icomoon/style.css">

	<style type="text/css">
	.author-pic .avatar-50 {
		float: right;
		border-radius: 50%;
		margin:0 16px 0 16px;
	}
	@media screen and (max-width: 960px) {
		.index-box {
			width: 100%;
			float: left;
		}
	}
	@media screen and (min-width: 961px) {
		<?php if(is_home() || is_archive() || is_search()): ?>
		.page-wrap {
			float: right;
		}
		<?php endif; ?>
		<?php if(is_single() || is_page()): ?>
		.page-wrap {
			width: 100%;
		}
		.post-content {
			margin-top: 0;
			margin-bottom: 30px;
		}
		.index-box {
			width: 75%;
			float: right;
		}
		<?php endif; ?>
	}
	</style>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/backstretch.js"></script>
	<!--[if lte IE 7]><script src="<?php bloginfo('template_url'); ?>/icomoon/lte-ie7.js"></script><![endif]-->

<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-XXXX-Y', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
</head>

<body <?php body_class(); ?>>
	<nav id="nav">
		<ul class="nav-list">
			<li><span class="icon-search search-icon"></span></li>
			<li id="nav-list-search"><form action="<?php bloginfo('siteurl'); ?>" class="searchform" method="get"><input type="text" id="s" name="s" value="" placeholder="Site Search"></form></li>
			<li><a href="<?php echo home_url() ?>"><i class="icon-home"></i> &nbsp;Home</a></li>

			<?php
			$defaults = array(
				'theme_location'  => 'sidebar-menu',
				'container'       => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'menu_class'	  => 'nav-list-item-btn',
				'link_before'     => '<i class="icon-file"></i> &nbsp;',
				'depth'           => 0,
				'walker'          => '',
				'items_wrap'	  => '%3$s');
			wp_nav_menu($defaults);
			?>

			<?php if ( is_user_logged_in() ) { ?>
			<li><a href="<?php bloginfo('siteurl'); ?>/wp-admin/profile.php"><i class="icon-user"></i> &nbsp;My Profile</a></li>
			<li><a href="<?php bloginfo('siteurl'); ?>/wp-admin/post-new.php"><i class="icon-pencil"></i> &nbsp;Post An Article</a></li>
			<li><a href="<?php echo wp_logout_url(); ?>"><i class="icon-cog"></i> &nbsp;Log Out</a></li>
			<?php } else { ?>
			<li><a href="<?php bloginfo('siteurl'); ?>/wp-login.php?loginFacebook=1"><i class="icon-facebook"></i> &nbsp;Connect</a></li>
			<?php } ?>

		</ul>

	<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
		<ul id="sidebar">
			<?php dynamic_sidebar( 'left-sidebar' ); ?>
		</ul>
	<?php endif; ?>
	</nav>

	<div class="wrapper">
		<a href="#nav" id="nav-toggle" class="do-not-print"><img src="<?php echo !empty($navicon)?$navicon:bloginfo('stylesheet_directory')."/images/navicon.png" ?>" style="width:30px;height:30px;"></a>
		<?php if(is_home() || is_archive() || is_search()): ?>
		<aside id="cover">
			<script>
			$(function() {
				$(".cover-body").backstretch("<?php bloginfo('template_url')?>/images/cover.jpg");
			});
			</script>

			<div class="cover-body">
			<?php /* <div class="cover-body" style="background-image:url('<?php bloginfo('template_url')?>/images/cover.jpg');"> */ ?>
				<div class="cover-body-inner">
					<h1 class="cover-title"><?php bloginfo('name') ?></h1>
					<p class="cover-description"><?php bloginfo('description') ?></p>
					<div class="cover-bottom" style="border-top:0;">

						<?php
							if ( is_user_logged_in() ) { ?>
								<a class="btn btn-large btn-default" href="<?php bloginfo('siteurl'); ?>/wp-admin/" style="color:#000;">Admin</a>
								<a class="btn btn-large btn-link" href="<?php bloginfo('siteurl'); ?>/wp-admin/post-new.php" style="color:#fff;"><i class="icon-pencil"></i> Post An Article</a>
						<?php } else { ?>
								<a class="btn btn-large btn-default" href="<?php bloginfo('siteurl'); ?>/wp-login.php?action=register" style="color:#333;">Register</a> &nbsp; <a class="btn btn-large btn-success" href="<?php bloginfo('siteurl'); ?>/wp-login.php" style="color:#fff;">Log In</a>
						<?php } ?>

						<?php if(is_home() || is_tag() || is_category() || is_search()): ?>
							<?php /* <a class="btn btn-default" href="<?php bloginfo('rss2_url') ?>"><i class="icon-feed"></i> Subscribe via RSS</a> */ ?>
						<?php endif; ?>

						<?php if(is_year()): ?>
							<?php $year = get_the_time('Y'); ?>
							<span class="archive-name"><a style="background:transparent;float:left;" href="<?php echo get_year_link($year-1) ?>"><i class="icon-chevron-left"></i></a><?php echo $year ?><a style="background:transparent;float:right;" href="<?php echo get_year_link($year+1) ?>"><i class="icon-chevron-right"></i></a></span>
						<?php endif; ?>

						<?php if(is_month() || is_day()): ?>
							<?php $month = get_the_time('m'); $back_month = $month-1; $next_month = $month+1; ?>
							<span class="archive-name"><a style="background:transparent;float:left;" href="<?php echo ($back_month == 00)?get_month_link($year-1,'12'):get_month_link($year,$back_month) ?>"><i class="icon-chevron-left"></i></a><?php echo $month ?><a style="background:transparent;float:right;" href="<?php echo ($next_month == 13)?get_month_link($year+1,'12'):get_month_link($year,$next_month) ?>"><i class="icon-chevron-right"></i></a></span>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</aside>
	<?php endif; ?>
	<?php if (!is_single() && !is_page()) {
		echo '<div class="page-wrap">';
		echo '	<div class="group-list">';
	} ?>
