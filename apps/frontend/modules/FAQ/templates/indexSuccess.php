<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<?php echo __('Frequently Asked Questions') ?>
			</h2>
			<div class="newscontent">
				<div class="newstxt">
					<?php if ($FAQ->count()): ?>
					<ul>
					<?php foreach ($FAQ as $AQ): /*foreach Frequently Asked Questions as Asked Question*/ ?>
						<dt><?php echo $AQ->getQuestion() ?> ?</dt>
						<tt><?php echo $AQ->getAnswer() ?></tt>
					<?php endforeach ?>
					</ul>
					<?php else: ?>
					<b><?php echo __('The FAQ is empty.') ?></b>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>