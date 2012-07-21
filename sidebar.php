<aside id="footer-bar">
	<ul style="list-style: none;">
		<li class="four columns">
			<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
			<script>
				new TWTR.Widget({
				version: 2,
				type: 'profile',
				rpp: 4,
				interval: 30000,
				width: 308,
				height: 593,
				theme: {
					shell: {
						background: '#333333',
						color: '#ffffff'
					},
					tweets: {
						background: '#000000',
						color: '#ffffff',
						links: '#4aed05'
					}
				},
				features: {
					scrollbar: false,
					loop: false,
					live: false,
					behavior: 'all'
				}
				}).render().setUser('avgjomag').start();
			</script>
		</li>
		<li class="four columns">
			<div class="fb-like-box" data-href="https://www.facebook.com/AvgJoMag" data-width="308" data-show-faces="true" data-stream="true" data-header="true"></div>
		</li>
		<li class="four columns">
			<?php 
				echo do_shortcode("[prw username='avgjomag' boardname='diy' maxfeeds='10' divname='myList' printtext='0' target='newwindow' useenclosures='yes' thumbwidth='100' thumbheight='100' showfollow='medium']
");
			?>
		</li>
	</ul>
</aside>