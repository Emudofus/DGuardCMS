<?php
if ($polls->count()):
	foreach ($polls as $poll):
		/* @var $poll Poll */
		if (!$poll->Options->count()):
			continue;
		endif;
		include_partial('poll', array('poll' => $poll));
	endforeach;
	if ($sf_user->hasLevel(myUser::LEVEL_ADM)):
		echo paginate($pager);
	endif;
else:
?><div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php echo __('Poll') ?>
		</div>
		<span>
			<?php echo __('There is no poll') ?>.
		</span>
	</div>
</div>
<div class="endnews" />
<?php endif ?>
