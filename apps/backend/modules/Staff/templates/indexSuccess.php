<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php echo __('Staff') ?>
		</div>
		<table>
			<?php
			foreach ($staff as $member):
				/* @var $member Account */
			?>
			<tr>
				<td>
					<b><?php echo link_to_if(count($member['Ranks']), $member['username'], '@Rank_show?user=' . $member['id']) ?></b>
				</td>
				<td>
					<?php include_partial('display', array('member' => $member)) ?>
				</td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
<div class="endnews"></div>