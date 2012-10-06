
<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<?php echo link_to_unless(sfConfig::get('app_shop_expanded'), __($gift->getItem()->getName()), 'Shop/show?id='.$gift->getId()) /*@todo translation*/ ?><br />
			</h2>
			<div class="newscontent">
				<div class="bg_aut">
					<img src="<?php echo $gift->img_url ?>" />
				</div>
				<div class="newstxt">
					<i style="margin-left: 20px;"><?php echo __('Cost') ?>: <?php echo format_number_choice('[0] 0 points|[1] <b>One</b> point|(1,Inf] <b>%cost%</b> points', array('%cost%' => $gift->getPrice()), $gift->getPrice()) ?></i><br />
					<?php if ($sf_user->isAuthenticated() && $sf_user->getAccount()->getPoints() >= $gift->getPrice()): ?>
					<i style="margin-left: 20px;"><?php echo link_to(__('Purchase'), 'Shop/buy?id=' . $gift->getId()) ?></b></i><br />
					<?php endif ?>
					<i style="margin-left: 20px;"><?php echo __('Level') ?>: <?php echo $gift->getItem()->getLevel() ?></i><br /><br />

					<?php if (trim($gift->getDescription())): ?>
					<p><b><?php echo __('Description') ?> : <?php echo $gift->getDescription() ?></p>
					<?php endif ?>
					<div style="margin-left: 40px;">
					<?php if ('show' == $sf_context->getActionName() || (sfConfig::get('app_shop_expanded') && $gift->getItem()->hasStats())): ?>
						<?php echo $gift->getRawValue()->getItem()->parseStats($gift->isMax()) ?>
					<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>