<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('@Poll_'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif ?>
	<table>
		<tfoot>
			<tr>
				<td colspan="2">
					&nbsp;<a href="<?php echo url_for('@Poll') ?>"><?php echo __('Back to list') ?></a>
					<?php if (!$form->getObject()->isNew()): ?>
						&nbsp;<?php echo button_to(__('Delete'), '@Poll_delete?id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => __('Are you sure?'), 'absolute' => true, 'method' => 'DELETE')) ?>
					<?php endif ?>
					<input type="submit" value="<?php echo __('Save') ?>" />
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php echo $form ?>
		</tbody>
	</table>
</form>

