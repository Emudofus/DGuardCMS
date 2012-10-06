<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php printf(__('Edit item "<i>%s</i>" for the shop'), $form->getObject()->getItem()->getName()) ?>
		</div>
		<span>
			<?php include_partial('form', array('form' => $form)) ?>
		</span>
	</div>
</div>
<div class="endnews"></div>
