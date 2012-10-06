<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php printf(__('Edit option <i>%s</i> for the poll <i>%s</i>'), __($poll_option->getName()), __($poll->getName())) ?>
		</div>
		<span>
			<?php include_partial('form', array('form' => $form, 'poll' => $poll)) ?>
		</span>
	</div>
</div>
<div class="endnews"></div>
