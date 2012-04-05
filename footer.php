		<footer id="footer" class="row">
			&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>
		</footer>

	</div>

	<?php wp_footer(); ?>

	<script type="text/javascript">

	jQuery(document).ready(function($){

		$('.nav-bar li a').addClass('main');
		$('.nav-bar li').has('ul').addClass('has-flyout');
		$('.nav-bar li ul').addClass('flyout');

		$('#all-posts').masonry({
			// options
			itemSelector : '.post'
		});

		$('.block-grid.three-up>li').css({'margin-left':'1%'})
	});
	</script>

</body>

</html>