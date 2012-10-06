<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<?php echo __('Staff') ?>
			</h2>
			<div class="newscontent">
				<div class="newstxt">
					<table>
						<?php
						$showedAny = true;
						foreach ($staff as $member):
							/* @var $member Account */
							if (!$member->Ranks->count()):
								continue;
							endif;
							$showedAny = false;
						?>
						<tr>
							<td>
								<b><?php echo $member->getPseudo() ?></b>
							</td>
							<td>
								<ul>
									<?php foreach ($member->Ranks as $rank): ?>
										<li><?php echo $rank->getName(); ?></li>
									<?php endforeach ?>
								</ul>
							</td>
						</tr>
						<?php endforeach ?>
					</table>
					<?php $showedAny && print __('There is nobody in the team.') ?>
				</div>
			</div>
		</div>
	</div>
</div>