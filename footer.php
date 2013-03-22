			<footer class="footer" role="contentinfo">
				
				<div id="inner-footer" class="wrap clearfix">

						<div class="divider1 twelvecol first clearfix"></div>
					<nav role="navigation">
							<?php bones_footer_links(); ?>
					</nav>


				</div> <!-- end #inner-footer -->

			</footer> <!-- end footer -->

		</div> <!-- end #container -->

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>
		

							
										<script>
											function hideIt(){
												var count = $(".slides").children().length;
												if(count<1){
													$(".slideNav").addClass("hidden");
													//alert("weird");
													}
												};
											// Hide the navigation is there is only 1 post
											hideIt();
										</script>
	</body>
</html> <!-- end page. what a ride! -->
