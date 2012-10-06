<h1><?php echo __('Shop') ?></h1>

<div id="items">
<?php
foreach ($gifts as $gift):
	include_partial('display', array('gift' => $gift));
endforeach;
?>
</div>

<?php echo ca_link_to_only_if($sf_user->hasCredential('admin'), __('Manage'), 'backend.Shop') ?>
