<?php
/*
Template Name: Partner Invite Page
*/
?>

<?php get_header(); ?>

			<div id="content" class="list-it">
				<div id="inner-content" class="wrap clearfix">

						<header class="article-header">
							<h1 class="page-title pgHeader"><?php the_title(); ?></h1>
						</header> <!-- end article header -->
						
						<div id="main" class="twelvecol fittext first clearfix" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						  <?php the_content(); ?>
							<?php endwhile; ?>
							<?php endif; ?>
							<h3 class="h2 page-title pgHeader">Request an invite</h3>
							<form action="<?php echo get_bloginfo('template_directory') ?>/library/partnerInvite.php" method="post">
								<input type="hidden" name="directorEmail" value="<?php echo get_bloginfo('admin_email'); ?>" />
								<input class="email" name="partnerEmail" type="text" placeholder="you@email.com" />
								<button class="submit" type="submit">Request Invite</button>
							</form>
							
						</div> <!-- end #main -->
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<?php get_footer(); ?>

