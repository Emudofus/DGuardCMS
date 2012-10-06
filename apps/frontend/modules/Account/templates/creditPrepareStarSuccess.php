<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<?php echo __('Credit account'); ?>
			</h2>
			<div class="newscontent">
				<div class="newstxt">
					<i>(<?php echo sfDbConfigHandler::get('pass_value') ?> <?php echo sfDbConfigHandler::get('shop_name') ?>)</i>
					<div id="starpass_<?php echo $idd ?>"></div>
					<script type="text/javascript" src="http://script.starpass.fr/script.php?idd=<?php echo $idd ?>&amp;verif_en_php=1&amp;theme=default_blue_small"></script>
				</div>
			</div>
		</div>
	</div>
</div>