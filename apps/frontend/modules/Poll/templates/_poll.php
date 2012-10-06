<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			 <?php echo link_to_unless($sf_request->getParameter('action') == 'show', __($poll->getName()), '@Poll_show?poll=' . $poll->getId()) ?>
		</div>
		<span>
			<?php printf(__('End date: %s'), format_date($poll->getDateEnd())) ?>
			<?php if (time() > strtotime($poll->getDateEnd())): /* assume it's an admin */ ?>(<i><?php echo __('ended poll') ?></i>)<?php endif ?>.
			<ul>
				<?php foreach ($poll->Options as $option): /*% = 100(number / total)*/ ?>
				<li>
					<?php echo __($option->getName()) ?>: <?php echo $option->getPercent() ?>% (<?php echo $option->Polleds->count() ?>)
					<?php if ($sf_user->getAccount()->canVote($poll->getRawValue())): ?>
					&nbsp;&bull;&nbsp;<?php echo link_to(__('Vote'), '@Poll_vote?poll=' . $poll->getId() . '&option=' . $option->getId()) ?>
					<?php endif ?>
				</li>
				<?php endforeach ?>
			</ul>
		</span>
	</div>
</div>
<div class="endnews" />	
