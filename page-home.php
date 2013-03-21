<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

			<div id="content" class="list-it">
				
				<div class="slideNav">
						<button class="left" onclick='mySwipe.prev()'>prev</button> 
				  <button class="right" onclick='mySwipe.next()'>next</button>
				</div>
				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="twelvecol first clearfix" role="main">
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<h1 class="hm_wi"><?php the_content(); ?></h1>
							<?// Begin Slider ?>
							
							<div id="slider" class="swipe">
								<div class='swipe-wrap'>
								<?php
									global $post;
									$args = array( 'numberposts' => 4, 'offset'=> 0, 'category'=> 5);
									$myposts = get_posts( $args );
									$i = 0;
		
									foreach( $myposts as $post ) :	setup_postdata($post); ?>
									<?$i++?>
										<div class="slides">
											<div class="sLeft fivecol first">
												<h2><?php the_title(); ?></h2>
												<p><?php the_excerpt(); ?></p>
											</div>
											<div class="sRight sevencol">
												<a href="<? the_permalink(); ?>"><?php the_post_thumbnail( 'bones-thumb-dnw' ); ?></a>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
							<?// End Slider ?>
							
									<?if($i<1):?>
										<script>
											function hideIt(){
												$('.slideNav').addClass("hidden");
												//alert('weird');
												}
										</script>
									<?endif;?>
									
							<?php endwhile; ?>
							<?php endif; ?>

						</div> <!-- end #main -->
						<div class="divider twelvecol first clearfix"></div>
						<div class="secondary twelvecol first clearfix">
							<div class="signUp eightcol first">
								<? $options = get_option( 'dnw_theme_options' ); ?>
								<h3><?echo $options['dnw_dates'];?> <span class="lite"><?echo $options['dnw_weeks'];?></span></h3>
								<div class="newsletter">
									<form id="signUpForm" action="<?echo $options['dnw_url'];?>" method="post" target="_blank">
										<div class="input-floats clearfix">
											<input class="dnw_dates_input" type="text" name="EMAIL" placeholder="E-MAIL ADDRESS" />
											<button class="dnw_dates_btn" type="submit"/>SIGN <span class="lit">ME UP</span></button>
										</div>
										<div class="confirm">
											<label for="iCommit">By checking this box I am committing to take the Date Night Challenge</label>
											<input type="checkbox" name="agree" id="iCommit" value="Yes" />
										</div>
									</form>
								</div>		
							</div>
							<div class="fourcol">
							</div>
						</div> <!-- end secondary -->
						<div class="divider twelvecol first clearfix"></div>
						<div class="tertiary twelvecol first clearfix">
							<div class="fb first sixcol">
								<a href="#"><span class="lit">LIKE US ON</span> FACEBOOK</a>
							</div>
							<div class="tw sixcol">
								<a href="#"><span class="lit">FOLLOW US ON</span> TWITTER</a>
							</div>
						</div>
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<?php get_footer(); ?>

