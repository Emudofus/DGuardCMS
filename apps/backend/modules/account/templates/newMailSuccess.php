<h1 class="title"><?php echo __('Mass Mail') ?></h1>

<form action="<?php echo url_for('account/createMail') ?>" method="post" <?php $form->isMultipart() && print 'enctype="multipart/form-data" ' ?>>
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