<?php
echo link_to(image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/delete.png', array('alt_title' => __('Delete'))), '@Rank_delete?user=' . $member['id'] . '&id=' . $rank['id']),
 __($rank['name']);