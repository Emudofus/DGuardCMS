<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<?php echo __(isset($account) ? 'Log In' : 'Log Out') ?>
			</h2>
			<div class="newscontent">
				<div class="newstxt">
					<?php
					if (isset($account))
					{
						if ($sf_user->isAuthenticated())
							printf(__('Logged on as <b>%s</b>'), $sf_user->getAccount()->getPseudo());
						else
						{
							echo __('Invalid username/password.'), '<br />', __('You don\'t have account ?');
						}
					}
					else
					{
						echo __('Logged out successfully.');
					}
					?>
					<br /><br />
					<br /><br />
					<br /><br />
				</div>
			</div>
		</div>
	</div>
</div>
