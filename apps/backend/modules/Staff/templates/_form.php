<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('@Rank_create?user=' . $account->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<input type="hidden" name="user" value="<?php echo $account->getId() ?>" />
	<table>
		<tfoot>
			<tr>
				<td colspan="2">
					&nbsp;<a href="<?php echo url_for('@Rank') ?>"><?php echo __('Back to list') ?></a>
					<?php if (!$form->getObject()->isNew()): ?>
						&nbsp;<?php echo button_to(__('Delete'), '@Rank_delete?id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => __('Are you sure?'), 'absolute' => true, 'method' => 'DELETE')) ?>
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
