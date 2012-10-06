<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php printf(__('New option for the poll <i>%s</i>'), __($poll->getName())) ?>
		</div>
		<span>
			<?php include_partial('form', array('form' => $form, 'poll' => $poll)) ?>
		</span>
	</div>
</div>
<div class="endnews"></div>
