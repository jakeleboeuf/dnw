<?  //This is the slider 
		// Begin Slider ?>
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