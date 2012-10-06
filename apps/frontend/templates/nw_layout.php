<!DOCTYPE html>
<!-- design by NightWolf -->
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
					if ($sf_user->isAuthenticated()):
						printf(__('Logged on as <b>%s</b>'), $sf_user->getAccount()->getPseudo());
						echo '&nbsp;&bull;&nbsp;', $sf_user->getLevel(), '<br >', link_to(__('Log Out'), 'Account/log'), '<br />';
						printf('<b>%d</b> %s', $sf_user->getAccount()->getPoints(), __(sfDbConfigHandler::get('shop_name')));
					else: //@todo LoginForm
					?>
					<form method="GET" action="<?php echo url_for('Account/log') ?>">
					<span><?php echo __('Username') ?> :</span>
					<input class="input_text" type="text" value="" name="username" id="username" /><br>
					<span><?php echo __('Password') ?> :</span>
					<input class="input_text" type="password" value="" name="password" id="password" />
					<input type="submit" value="Go !" />
					</form>
					<?php endif ?>
				</div>
			</div>
			<div id="menu"><br />
				<!--
				<a href="#"><img src="images/logo1_site.png"><br /></a>
				<img src="images/logo3_site.png"><br />
				<img src="images/logo2_site.png"><br /><br />-->
				<div class="categorie_menu_header"></div>
				<div class="content">
					<div class="title">~ <?php echo link_to(__('Home'), '/') ?> ~</div>
					<div class="categorie">
						<ul>
							<?php if ($sf_user->isAuthenticated()): ?>
							<?php if (sfDbConfigHandler::has('pass_type')): ?>
							<li><?php echo link_to(__('Credit account'), 'Account/credit') ?></li>
							<?php endif /*credit*/ ?>
							<?php if (!$sf_user->getAccount()->relatedExists('Contact')): ?>
							<li><?php echo link_to(__('Contact us'), 'Contact/new') ?></li>
							<?php endif /*!contact*/ ?>
							<?php else: /*!authenticated*/ ?>
							<li><?php echo link_to(__('Register'), 'Account/new') ?></li>
							<?php endif /*authenticated*/ ?>
							<li><?php echo link_to(__('Join us'), 'Account/join') ?></li>
							<li><?php echo link_to(__('Shop'), 'Shop/index') ?></li>
							<?php if (sfDbConfigHandler::has('vote_id')): ?>
							<li><?php echo link_to(image_tag('http://rpg-paradize.com/vote.gif'), 'Account/vote') ?></li>
							<?php endif /*vote*/ ?>
						</ul>
					</div>
				</div>
				<div class="end"></div>
				<div class="categorie_menu_header"></div>
				<div class="content">
					<div class="title">~ <?php echo link_to(__('Community'), '/') ?> ~</div>
					<div class="categorie">
						<ul>
							<?php if (sfDbConfigHandler::has('board_url')): ?>
							<li><a href="<?php echo str_replace('%host%', 'http://'.$sf_request->getHost(), sfDbConfigHandler::get('board_url')) ?>"><b><?php echo __('Board') ?></b></a></li>
							<?php endif ?>
							<li><?php echo link_to(__('Staff'), 'Account/staff') ?></li>
							<li><?php echo link_to(__('Polls'), 'Poll/index') ?></li>
							<li><?php echo link_to(__('FAQ'), 'FAQ/index') ?></li>
							<li><?php echo link_to(__('Rules'), 'Rules/index') ?></li>
						</ul>
					</div>
				</div>
				<div class="end"></div>
				<div class="categorie_menu_header"></div>
				<div class="content">
					<div class="title">~ <?php echo __('Server') ?> ~</div>
					<div class="categorie">
						<ul>
							<li><?php echo image_tag('server_'.(@fsockopen(sfConfig::get('app_server_ip'), sfConfig::get('app_server_port'), $err_no, $err_str, 0.2)?'on':'off')), "\n" /*If after 0.2 seconds the server doesn't answer to the request, it's surely because it's off*/ ?></li>
						</ul>
					</div>
				</div>
				<div class="end"></div>
				<?php if ($sf_user->hasCredential('admin')): ?>
				<div class="categorie_menu_header"></div>
				<div class="content">
					<div class="title">~ <?php echo ca_link_to(__('Admin'), 'backend.Stat') ?> ~</div>
					<div class="categorie">
						<ul>
						</ul>
					</div>
				</div>
				<div class="end"></div>
				<?php endif ?>
			</div>
			<div id="content">
				<?php echo $sf_content ?>
			</div>
		</div>
		<img src="http://www.rpg-paradize.com/out.php?num=<?php echo sfDbConfigHandler::get('RPGParadize_id') ?>" width="0" height="0" border="0" alt="" />
	</body>
</html>
