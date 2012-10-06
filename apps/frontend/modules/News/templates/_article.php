<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
			<?php
			echo link_to_unless($sf_request->getParameter('action') == 'show', $article->getTitle(), '@News_show?id=' . $article->getId());
			if ($sf_user->hasCredential('article.manage')):
				echo link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/edit.png', array('alt_title' => __('Edit'))), '@News_edit?id=' . $article->getId());
				if ($article->getDeletedAt()):
					echo link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/tick.png', array('alt_title' => __('Restore'))), '@News_restore?id=' . $article->getId());
				else:
					echo button_to(__('Delete'), '@News_delete?id=' . $article->getId(), array('method' => 'delete', 'confirm' => __('Are you sure?'), 'absolute' => true, 'method' => 'DELETE', 'type' => 'image', 'src' => sfConfig::get('sf_admin_module_web_dir') . '/images/delete.png'));
				endif;
			endif;
			?>
		</h2>
			<div class="newscontent">
				<?php if (file_exists(realpath('.') . $avatar = image_path('avatar/' . $article->getAuthor()->getId()))): ?>
				<div class="bg_aut">
					<img src="<?php echo $avatar ?>" style="width: 115px; height: 114px;" />
				</div>
				<?php endif ?>
				<div class="newstxt">
					<div align="right">
						<i>
							<?php echo formate_author_and_date($article) ?><br />
							<?php echo format_number_choice('[0] No comment|[1] <b>One</b> comment|(1,Inf] <b>%1%</b> comments', array('%1%' => $article->getCommentsCount()), $article->getCommentsCount()) ?>
						</i><br />
					</div>
					<?php echo nl2br($article->getRawValue()->getContent()) ?>
				</div>
			</div>
		</div>
	</div>
</div>