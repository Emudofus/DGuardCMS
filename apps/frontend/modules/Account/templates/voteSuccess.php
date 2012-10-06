<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<?php echo __('Vote') ?>
			</h2>
			<div class="newscontent">
				<div class="newstxt">
			<?php
			if ($sf_user->isAuthenticated()):
				echo format_number_choice('[-1,0] You don\'t earn any points, you must wait two hours between each vote|(1,Inf] You earn %points% %name%', array('%points%' => $earnedPoints, '%name%' =>  __(sfConfig::get('app_shop_name'))), $earnedPoints);
			else:
				echo __('You must be logged in to earn %name%', array('%name%' => __(sfConfig::get('app_shop_name'))));
			endif; ?>.
					<br /><br />
					<br /><br />
					<br /><br /></p>
				</div>
			</div>
		</div>
	</div>
</div>