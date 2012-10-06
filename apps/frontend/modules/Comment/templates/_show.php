		<div class="infos <?php $comment->getAuthor()->getGmlevel() > myUser::LEVEL_LOGGED && print ' important' ?>" align="center">
			<i>
				<?php echo formate_author_and_date($comment) ?>
			</i>
			<?php
			if ($sf_user->hasCredential('comment.manage')):
				$c_mode = $comment->getDeletedAt() ? 'restore' : 'delete';
				echo link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/'.($c_mode == 'restore' ? 'tick' : 'delete').'.png', array('alt_title' => __(ucfirst($c_mode)))), '@comment_'.$c_mode.'?article=' . $article_id . '&comment=' . $comment->getId());
			endif;
			?>
		</div>
		<span>
			<?php
			if ($comment->getAuthor()->getGmlevel() >= myUser::LEVEL_ADM):
				$comment = $comment->getRawValue();
			endif;
			echo $comment->getContent();
			?>
		</span>
	</div>