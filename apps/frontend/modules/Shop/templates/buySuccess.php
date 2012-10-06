<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<?php echo __('Purchase a gift') ?> 
			</h2>
			<div class="newscontent">
				<div class="newstxt">
					<img src="<?php echo $gift->img_url ?>" />
					<?php echo __('You successfully bought %%gift.name%% for %%gift.price%% %%app.shop.name%%.', array('%%gift.name%%' => $gift->getName(), '%%gift.price%%' => $gift->getPrice(), '%%app.shop.name%%' => sfDbConfigHandler::get('shop_name'))) ?>
				</div>
			</div>
		</div>
	</div>
</div>