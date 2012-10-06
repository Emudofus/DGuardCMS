<div class="news opened left">
	<h2><?php echo __('Comment!') ?></h2>
	<div class="newscontent">
		<div class="newstxt">
			<form action="<?php echo url_for('@comment?article=' . $article->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
				<table>
					<tfoot>
						<tr>
						<td colspan="2">
							<input type="submit" value="<?php echo __('Save') ?>" />
						</td>
						</tr>
					</tfoot>
					<tbody>
						<?php echo $form ?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>