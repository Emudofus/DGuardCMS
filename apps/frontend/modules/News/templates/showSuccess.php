<?php include_partial('article', array('article' => $article)) ?>

<br /><div id="newsBlock">
	<div id="newsContainer">
		<?php
		if ($sf_user->canComment($article->getRawValue())):
			include_partial('Comment/form', array('form' => new CommentForm(), 'article' => $article));
		endif;
		?>
	</div>
</div>

<?php if ($article->Comments->count()): ?>
<div id="newsBlock">
	<div id="newsContainer">
		<div class="news opened left">
			<?php if ($article->getCommentsCount()): ?>
			<h2>
				<?php echo format_number_choice('[1]  ' . __('Comment') . ' |(1,Inf] ' . __('Comments'), array(), $article->getCommentsCount()) ?> 
			</h2>
			<?php endif ?>
			<div class="newscontent">
				<div class="newstxt">
					<?php
					foreach ($comments->getResults() as $comment):
						include_partial('Comment/show', array('comment' => $comment, 'article_id' => $article->getId()));
					endforeach;
					echo paginate($comments, '@News_show?id='.$article->getId())
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif ?>

<br /><a href="<?php echo url_for('@News') ?>"><?php echo __('Back to list') ?></a>
