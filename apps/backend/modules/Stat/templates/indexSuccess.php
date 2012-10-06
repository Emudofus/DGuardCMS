<div class="content_header"></div>
<div class="content_news">
	<div class="news">
		<div class="title">
			<?php echo __('Stats') ?>
		</div>

		<?php echo format_number_choice('[0] No article|[1] <b>One</b> article|(1,Inf] <b>%1%</b> articles', array('%1%' => $Articles), $Articles) ?>.<br />
		<?php echo format_number_choice('[0] No comment|[1] <b>One</b> comment|(1,Inf] <b>%1%</b> comments', array('%1%' => $Comments), $Comments) ?>.<br />
		<?php echo format_number_choice('[1] You have the only one account|(1,Inf] <b>%1%</b> accounts', array('%1%' => $Accounts), $Accounts) ?>.<br />
		<?php echo format_number_choice('[1] You are the only one in the staff|(1,Inf] <b>%1%</b> people in the staff', array('%1%' => $Staff), $Staff) ?>.<br />
		<?php echo format_number_choice('[0] No rank|[1] <b>One</b> rank|(1,Inf] <b>%1%</b> ranks', array('%1%' => $Ranks), $Ranks) ?>.<br />
		<?php echo format_number_choice('[0] No poll|[1] <b>One</b> poll|(1,Inf] <b>%1%</b> polls', array('%1%' => $Polls), $Polls) ?>.<br />
		<?php echo format_number_choice('[0] No poll option|[1] <b>One</b> poll option|(1,Inf] <b>%1%</b> poll options', array('%1%' => $PollOptions), $PollOptions) ?>.<br />
		<?php echo format_number_choice('[0] No rule|[1] <b>One</b> rule|(1,Inf] <b>%1%</b> rules', array('%1%' => $Rules), $Rules) ?>.<br />
		<?php echo format_number_choice('[0] No FAQ|[1] <b>One</b> FAQ|(1,Inf] <b>%1%</b> FAQ', array('%1%' => $FAQs), $FAQs) ?>.<br />
		<hr style="width: 50%;" />
		<?php echo format_number_choice('[0] Any game server|[1] <b>One</b> game server|(1,Inf] <b>%1%</b> game servers', array('%1%' => $Servers), $Servers) ?>.<br />
		<?php echo format_number_choice('[0] No zaap|[1] <b>One</b> zaap|(1,Inf] <b>%1%</b> zaaps', array('%1%' => $Zaaps), $Zaaps) ?>.<br />
		<?php echo format_number_choice('[0] No zaapi|[1] <b>One</b> zaapi|(1,Inf] <b>%1%</b> zaapis', array('%1%' => $Zaapis), $Zaapis) ?>.<br />
		<?php echo format_number_choice('[0] No exp level|[1] <b>One</b> exp level|(1,Inf] <b>%1%</b> exp levels', array('%1%' => $Exps), $Exps) ?>.<br />
		<?php echo format_number_choice('[0] Any item in the shop|[1] <b>One</b> item in the shop|(1,Inf] <b>%1%</b> items in the shop', array('%1%' => $ShopItems), $ShopItems) ?>.
	</div>
</div>
<div class="endnews"></div>