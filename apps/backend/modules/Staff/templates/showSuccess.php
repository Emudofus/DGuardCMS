<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php echo $member['username'] ?>
		</div>

		<?php include_partial('display', array('member' => $member)) ?>
	</div>
</div>
<div class="endnews"></div>
<?php echo link_to(__('Back to list'), '@Rank') ?>