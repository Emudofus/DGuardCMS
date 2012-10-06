<div id="newsBlock">
	<div id="newsContainer">
		<div id="n1" class="news opened left">
			<h2>
				<?php echo __('Join us') ?>
			</h2>
			<div class="newscontent">
				<div class="newstxt">
					<?php null !== ( $launcher_url = sfConfig::get('app_download_launcher') ) && print __('You can download the laucher <a href="%link%">here</a>.', array('%link%' => str_replace('%host%', 'http://'.$sf_request->getHost(), $launcher_url))) ?><br />
					<?php null !== ( $config_url = sfConfig::get('app_download_config') ) && print __('You can download directly the config file <a href="%link%">here</a>.', array('%link%' => str_replace('%host%', 'http://'.$sf_request->getHost(), $config_url))) ?><br />
					<?php $sf_user->isAuthenticated() || print link_to(__('Register'), 'Account/new') ?><br />
					<?php null !== ( $ip = sfConfig::get('app_server_ip') ) && null !== ( $port = sfConfig::get('app_server_port') ) && print __('Or you can directly join the server on %ip%:%port%.', array('%ip%' => $ip, '%port%' => $port)) ?>
					<br /><br />
					<br /><br />
					<br /><br />
				</div>
			</div>
		</div>
	</div>
</div>