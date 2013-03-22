<?  //This is the slider 
		// Begin Slider ?>
								<div id="slider" class="swipe">
								<div class="swipe-wrap">
								<?php
									global $post;
									$args = array( "numberposts" => 4, "offset"=> 0, "category"=> 5);
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