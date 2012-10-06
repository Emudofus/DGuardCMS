<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php echo __($poll->getName()), link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/edit.png', array('alt_title' => __('Edit'))), '@Poll_edit?id=' . $poll->getId()), button_to(__('Delete'), '@Poll_delete?id=' . $poll->getId(), array('method' => 'delete', 'confirm' => __('Are you sure?'), 'absolute' => true, 'method' => 'DELETE', 'type' => 'image', 'src' => sfConfig::get('sf_admin_module_web_dir') . '/images/delete.png')) ?>
		</div>
		<span>
			<i style="margin-left: 25px;">(<?php echo __('Title/Options may look have no translation') ?>)</i><br /><br />

			<?php echo __('Start Date') ?>: <?php echo format_date($poll->getDateStart()) ?><br />
			<?php echo __('End Date') ?>: <?php echo format_date($poll->getDateEnd()) ?><br /><br />

			<h3 style="display: inline;"><?php echo format_number_choice('[0,1] Option|(1,Inf] Options', array(), $poll->Options->count()) ?></h3>&nbsp;<?php echo link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/new.png', array('alt_title' => __('Add'))), '@PollOption_new?poll=' . $poll->getId()) ?><br />
			<?php if ($poll->Options->count()): ?>
			<ul>
				<?php foreach ($poll->Options as $option): /*name edit delete || delete edit name*/ ?>
				<li>
					<?php echo link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/delete.png', array('alt_title' => __('Delete'))), '@PollOption_delete?poll=' . $poll->getId() . '&option=' . $option->getId()) ?>
					<?php echo link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/edit.png', array('alt_title' => __('Edit'))), '@PollOption_edit?poll=' . $poll->getId() . '&option=' . $option->getId()) ?>
					<?php echo __($option->getName()) ?>
				</li>
				<?php endforeach ?>
			</ul>
		<?php endif ?>
		</span>
	</div>
</div>
<div class="endnews"></div>
