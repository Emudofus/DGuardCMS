<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('Contact/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<input type="hidden" name="sf_method" value="<?php echo $form->getObject()->isNew() ? 'post' : 'put' ?>" />
	<table>
		<tfoot>
			<tr>
				<td colspan="2">
					<input type="submit" value="<?php echo __('Send') ?>" />
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php echo $form ?>
		</tbody>
	</table>
</form>
