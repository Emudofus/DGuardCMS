			<ul>
				<?php foreach ($member['Ranks'] as $rank): ?>
					<li><?php include_partial('show', array('rank' => $rank, 'member' => $member)) ?></li>
				<?php endforeach ?>
			</ul><br />
			<?php echo link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/new.png', array('alt_title' => __('Add'))), '@Rank_new?user=' . $member['id']) ?>