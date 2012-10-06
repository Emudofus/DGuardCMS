<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php echo __('Polls') ?>
		</div>
		<span>
			<i>(<?php echo __('Titles may look have no translation') ?>)</i>

			<?php foreach ($pager->getResults() as $poll): ?>
			<div class="poll">
				<h3 style="display: inline; padding: 20px;"><?php echo link_to(__($poll->getName()), '@Poll_show?id=' . $poll->getId()) ?></h3><br />
				<?php echo __('Start Date') ?>: <?php echo format_date($poll->getDateStart()) ?><br />
				<?php echo __('End Date') ?>: <?php echo format_date($poll->getDateEnd()) ?>
			</div>
			<?php endforeach ?>
		</span><br /><br />

		<a href="<?php echo url_for('@Poll_new') ?>"><?php echo __('New Poll') ?></a><!-- @todo move this to __('Polls') with image_tag('add') ? -->
	</div>
</div>
<div class="endnews" />
