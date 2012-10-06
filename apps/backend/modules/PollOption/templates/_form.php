<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('@PollOption_'.($form->getObject()->isNew() ? 'create' : 'update').'?poll=' . $poll->getId().(!$form->getObject()->isNew() ? '&option='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php if (!$form->getObject()->isNew()): ?>
	<input type="hidden" name="sf_method" value="put" />
	<?php endif ?>
	<table>
		<tfoot>
			<tr>
				<td colspan="2">
					<?php if (!$form->getObject()->isNew()): ?>
						&nbsp;<?php echo link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/delete.png', array('alt_title' => __('Delete'))), '@PollOption_delete?poll=' . $poll->getId() . '&option=' . $form->getObject()->getId()) ?>
					<?php endif; ?>
					<input type="submit" value="<?php echo __('Save') ?>" />
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php echo $form ?>
		</tbody>
	</table>
</form>
