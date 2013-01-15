		<footer id="footer" class="row">
			<div class="twelve columns">
				<ul style="list-style: none;" class="row">
					<li class="four columns">
						<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
						<script>
							new TWTR.Widget({
							version: 2,
							type: 'profile',
							rpp: 4,
							interval: 30000,
							width: 303,
							height: 455,
							theme: {
								shell: {
									background: '#f2f2f2',
									color: '#222222'
								},
								tweets: {
									background: '#ffffff',
									color: '#222222',
									links: '#2ba6cb'
								}
							},
							features: {
								scrollbar: true,
								loop: false,
								live: false,
								behavior: 'all'
							}
							}).render().setUser('avgjomag').start();
							
							$('.twtr-widget').addClass('shadow');
						</script>
					</li>
					<li class="four columns">
						<div class="fb-like-box" data-href="https://www.facebook.com/AvgJoMag" data-width="308" data-show-faces="true" data-stream="true" data-header="true"></div>
					</li>
					<li class="four columns">
						<?php 
							echo do_shortcode("[prw username='avgjomag' boardname='diy' maxfeeds='8' divname='myList' printtext='1' target='newwindow' useenclosures='yes' thumbwidth='100' thumbheight='100' showfollow='medium']
			");
						?>
						<script type="text/javascript">
							$('.pins-feed-list').addClass('panel shadow').css({'padding-left': '35px'});
						</script>
					</li>
				</ul>
				<div class="row">
					<span class="six columns endfooter" >&copy;<?php echo date("Y"); echo "  "; bloginfo('name'); ?></span>
					<span class="six columns endfooter"><?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds.</span>
				</div>
			</div>
		</footer>
	</div>
	<script type="text/javascript">
		$container = $('#all-posts');
		$container.imagesLoaded(function(){
			$container.masonry({
				// options
				itemSelector : '.post'
			});
		});
		
		$('#hero-stories').orbit();
	</script>
	<?php include (TEMPLATEPATH . '/inc/analytics.php' ); ?>
	<?php wp_footer(); ?>
</body>
</html>