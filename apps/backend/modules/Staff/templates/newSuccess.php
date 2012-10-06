<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php printf(__('New rank for <i>%s</i>'), $account->getPseudo()) ?>
		</div>

<?php include_partial('form', array('form' => $form, 'account' => $account)) ?>
	</div>
</div>
<div class="endnews"></div>