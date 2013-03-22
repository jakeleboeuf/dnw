<?php
/*
Template Name: Iframe Page
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
							
						</div> <!-- end #main -->
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<?php get_footer(); ?>

