<?php if ($pager->count()): ?>
	<?php foreach ($pager->getResults() as $contact): ?>
	<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<i>(<?php echo $contact->getAuthor()->getMail() ?>)</i> <?php echo formate_author_and_date($contact, false, false), link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/delete.png', array('alt_title' => __('Delete'))), 'Contact/delete?id=' . $contact->getId()) ?>
			</h2>
			<div class="newscontent">
				<div class="newstxt">
					<?php echo $contact->getContent() ?>
					<br /><br />
					<br /><br />
					<br /><br />
				</div>
			</div>
		</div>
	</div>
</div>
	<?php endforeach ?>
<?php else: ?>
<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<?php echo __('Contact messages') ?>
			</h2>
			<div class="newscontent">
				<div class="newstxt">
				<?php echo __('No contact.') ?>
					<br /><br />
					<br /><br />
					<br /><br />
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif ?>
