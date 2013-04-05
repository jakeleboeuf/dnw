<?php get_header(); ?>

			<div id="content" class="list-it">
				
				<div class="slideNav">
						<button class="left" onclick='mySwipe.prev()'>prev</button> 
				  <button class="right" onclick='mySwipe.next()'>next</button>
				</div>
				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="twelvecol fittext first clearfix" role="main">
								<h1 class="hm_wi">WHAT IS<strong> <?php echo $blog_title = get_bloginfo('name'); ?>?</strong></h1>
								<div id="slider" class="swipe">
								<div class="swipe-wrap">
								<?php
									global $post;
									
									$slide_ID = get_category_id('Feature Slider');
									$args = array( "numberposts" => 10, "offset"=> 0, "category"=> $slide_ID);
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
												<a href="<? the_permalink(); ?>"><?php the_post_thumbnail( "bones-thumb-dnw" ); ?></a>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
							<?// End Slider ?>

						<div class="divider twelvecol first clearfix"></div>
						</div> <!-- end #main -->
						<div class="secondary twelvecol first clearfix">
							<div class="signUp eightcol first">
								<? $options = get_option( 'dnw_theme_options' ); ?>
								<h3><?echo $options['dnw_dates'];?> <span class="lite"><?echo $options['dnw_weeks'];?></span></h3>
								<div class="newsletter">
									<form id="signUpForm" action="<?echo $options['dnw_mc'];?>" method="post" target="_blank">
										<input type="hidden" name="u" value="<?echo $options['dnw_url'];?>" />
										<input type="hidden" name="id" value="<?echo $options['dnw_id'];?>" />
										<div class="input-floats clearfix">
											<input class="dnw_dates_input" type="text" name="EMAIL" placeholder="E-MAIL ADDRESS" />
											<button class="dnw_dates_btn" type="submit"/>SIGN <span class="lit">ME UP</span></button>
										</div>
										<div class="confirm">
											<label for="iCommit">By checking this box I am committing to take the Date Night Challenge</label>
											<input class="checkbox" type="checkbox" name="agree" id="iCommit" />
										</div>
									</form>
								</div>		
							</div>
							<div class="fourcol">
								<a href="<?echo $options['dnw_app'];?>"><img src="<? echo get_template_directory_uri(); ?>/library/img/327x160.png" alt="Get it now!" /></a>
							</div>
						</div> <!-- end secondary -->
						<div class="divider twelvecol first clearfix"></div>
						<div class="tertiary twelvecol first clearfix">
							<div class="fb first sixcol">
								<a href="http://facebook.com/<?echo $options['dnw_fb'];?>" target="_blank"><span class="lit">LIKE US ON</span> FACEBOOK</a>
							</div>
							<div class="tw sixcol">
								<a href="http://twitter.com/<?echo $options['dnw_tw'];?>" target="_blank"><span class="lit">FOLLOW US ON</span> TWITTER</a>
							</div>
							<div class="divider twelvecol first clearfix"></div>
						</div>
						<div class="quart twelvecol first clearfix">
							<div class="fivecol first">&nbsp;</div>
							<div class="social threecol first">
								<div id="fb-root"></div>
								<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=416892218362436";
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>
								<div style="margin-right: 15px; display:block; margin-top:-1px;float:left;" class="fb-like" data-href="http://www.facebook.com/<?echo $options['dnw_fb'];?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true"></div>
							  <div style="display:block; margin-top:-1px;float:left;"><a href="https://twitter.com/<?echo $options['dnw_tw'];?>" class="twitter-follow-button" data-show-count="true" data-lang="en" data-show-screen-name="false">Follow @datenightpdx</a></div>
							  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
							</div>
							<div class="eightcol">&nbsp;</div>
						</div>
				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<?php get_footer(); ?>

