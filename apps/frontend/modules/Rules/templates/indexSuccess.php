<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php echo __('Rules') ?>
		</div>
		<span>
			<?php if ($rules->count()): ?>
			<ul>
				<?php
				$i = 0;
				foreach ($rules as $rule):
				?>
				<li>
					<b><?php echo ++$i ?></b>: <?php echo __($rule->getContent()) ?>
				</li>
				<?php endforeach ?>
			</ul>
			<?php else: ?>
			<b><?php echo __('Any rules - but remember to respect everyone.') ?></b>
			<?php endif ?>
		</span>
	</div>
</div>
<div class="endnews" />
