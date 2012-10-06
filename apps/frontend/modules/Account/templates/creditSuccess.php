<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<?php echo __('Credit account') ?>
			</h2>
			<div class="newscontent">
				<div class="newstxt">
					<?php if ($code_valid): ?>
					<span style="color: green;">
					<?php printf(__('Your code is <b>valid</b>, you earned <b>%d</b> %s'), $pointsToEarn, __(sfDbConfigHandler::get('app_shop_name'))) ?>.
					
					<?php else: ?>
					<span style="color: red;">
					<?php echo __('Your code is <b>invalid</b>') ?>.
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>