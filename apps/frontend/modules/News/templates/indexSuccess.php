<?php
foreach ($pager->getResults() as $article)
	include_partial('article', array('article' => $article));
?>

<?php echo paginate($pager, 'News/index') ?>
<?php if ($sf_user->hasCredential('article.manage')): ?>
<br /><br /><a href="<?php echo url_for('@News_new') ?>"><?php echo __('New Article') ?></a>
<?php endif /*article.manage?*/ ?>