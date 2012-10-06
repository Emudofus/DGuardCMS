<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php echo __('Shop') ?>
		</div>
		<div id="items">
			<?php foreach ($GiftTemplates as $GiftTemplate): ?>
			<div class="item">
				<?php echo button_to(__('Delete'), 'Shop/delete?id='.$GiftTemplate->getId(), array('method' => 'delete', 'confirm' => __('Are you sure?'), 'absolute' => true, 'method' => 'DELETE', 'type' => 'image', 'src' => sfConfig::get('sf_admin_module_web_dir') . '/images/delete.png')), link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/edit.png', array('alt_title' => __('Edit'))), 'Shop/edit?id='.$GiftTemplate->getId()) ?><h4 style="display: inline;"><?php echo $GiftTemplate->getItem()->getName() ?></h4> <i>(<?php echo $GiftTemplate->getItem()->getId() ?>)</i>&nbsp;&bull;&nbsp;
				<?php
				echo '<b>', __('Jet'), '</b>: ';
				if ($GiftTemplate->isMax()):
					echo __('maximum');
				else:
					echo __('minimum');
				endif;
				?>
			</div>
			<?php endforeach ?>
			</div>
			<?php echo link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/new.png', array('alt_title' => __('Add'))), 'Shop/new') ?>
		</div>
	</div>
</div>
<div class="endnews"></div>
