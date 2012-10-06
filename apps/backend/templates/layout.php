<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<?php include_http_metas() ?>
		<?php include_metas() ?>
		<title>
			<?php echo titleize($sf_content), sfDbConfigHandler::get('server_name') ?>
		</title>
		<link rel="shortcut icon" href="/favicon.ico" />
		<?php include_stylesheets() ?>
		<?php include_javascripts() ?>
	</head>
	<body>
		<div id="conteneur">
			<div id="Header">
				<div class="connexion">
					<?php
					printf(__('Logged on as <b>%s</b>'), $sf_user->getAccount()->getPseudo());
					echo '&nbsp;&bull;&nbsp;', $sf_user->getLevel();
					?>
				</div>
			</div>
			<div id="menu"><br />
				<!--
				<a href="#"><img src="images/logo1_site.png"><br /></a>
				<img src="images/logo3_site.png"><br />
				<img src="images/logo2_site.png"><br /><br />-->
				<div class="categorie_menu_header"></div>
				<div class="content">
					<div class="title">~ <?php echo __('Modules') ?> ~</div>
					<div class="categorie">
						<ul>
							<li><?php echo link_to(__('Stats'), '@Stat') ?></li>
							<li><?php echo link_to(__('Staff'), '@Rank') ?></li>
							<li><?php echo link_to(__('Polls'), '@Poll') ?></li>
							<li><?php echo link_to(__('FAQ'), 'faq') ?></li>
							<li><?php echo link_to(__('Rules List'), 'rule') ?></li>
							<li><?php echo link_to(__('Shop'), 'Shop/index') ?></li>
							<li><?php echo ca_link_to(__('Contact messages'), 'frontend.Contact/index') ?></li>
						</ul>
					</div>
				</div>
				<div class="end"></div>
				<div class="categorie_menu_header"></div>
				<div class="content">
					<div class="title">~ <?php echo __('Server') ?> ~</div>
					<div class="categorie">
						<ul>
							<li><?php echo link_to(__('Account List'), 'account') ?></li>
							<li><?php echo link_to(__('Server List'), 'Server/index') ?></li>
							<li><?php echo link_to(__('Zaap List'), 'zaap/index') ?></li>
							<li><?php echo link_to(__('Zaapi List'), 'zaapi/index') ?></li>
							<li><?php echo link_to(__('Exp List'), 'Exp/index') ?><br /></li>

							<li><?php echo link_to(__('Mass Mail'), 'account/newMail') ?></li>
						</ul>
					</div>
				</div>
				<div class="end"></div>
				<div class="categorie_menu_header"></div>
				<div class="content">
					<div class="title">~ <?php echo ca_link_to(__('Site Index'), 'frontend') ?> ~</div>
					<div class="categorie"><ul></ul></div>
				</div>
				<div class="end"></div>
			</div>
			<div id="content">
				<?php echo $sf_content ?>
			</div>
		</div>
	</body>
</html>
