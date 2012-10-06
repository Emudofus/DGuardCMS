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
		<!-- BARRE PRE-HEADER -->
		<div id="pre-header">
			<a href="#"><img src="<?php echo image_path('durkle/squelette/pre-header/s-a_logomini.png') ?>" class="s-a_logomini"/></a>
			<?php if ($sf_user->isAuthenticated()): ?>
			<div id="up-gestion">
				<!--div class="mail-up">
				
					<a href="#" class="mail-up"></a>
					<!--a href="#" class="no_mail-up"></a- ->
					<a href="#">Vous avez (<span class="rouge">3</span>) nouveau(x) message(s)</a>
				</div>
				-->
				<div class="up_separator" id="sep1"></div>
				<div class="bjr">
					<a href="#" class="close-up"></a>
					<p class="bjr-txt"><?php echo __('Welcome, %name%', array('%name%' => '<span class="nplayer">'.$sf_user->getAccount()->getPseudo().'</span>')) ?></p>
				</div>
				<div class="up_separator" id="sep2"></div>
				<div class="abo">
					<span href="#" class="abo-up"></span>
					<span href="#" class="abo-ok"><?php echo __('Not actually subscriber') ?></span>
				</div>
				<div class="up_separator" id="sep3"></div>
				<div class="points">
					<span class="sap"><?php echo $sf_user->getAccount()->getPoints() ?></span>
					<img class="sap" src="<?php echo image_path('durkle/squelette/pre-header/sap.png') ?>"/>
				</div>
				<div class="up_separator" id="sep4"></div>
				<div class="gcompte">
					<a href="<?php echo url_for('Account/log') ?>" class="up-gcompte"><?php echo __('Log out') ?></a>
				</div>
			</div>
			<?php else: ?>
			<div id="up-login">
				<form method="get" action="<?php echo url_for('Account/log') ?>" class="champs">
					<div class="login">
						<p>
							<input id="inputlogin" type="text" name="username" value="<?php echo __('Username') ?>" onfocus="if (this.value == '<?php echo str_replace("'", "\\'", __('Username')) ?>'){this.value = '';}" maxlength="16" />
						</p>
					</div>
					<div class="pass">
						<p>
							<input id="inputpassword" type="password" name="password" onfocus="if (this.value == '***')this.value='';" value="***" maxlength="15" />
						</p>
					</div>
					<p class="submit">
						<input class="seconnecter" value="" name="connexion" type="submit" />
					</p>
				</form>
				<a href="<?php echo url_for('Account/new') ?>" class="join-up" title="<?php echo __('Register') ?>"></a>
				<div class="up_separator" id="sep0"></div>
				<!--a href="#" class="passlost-up" title="Mot de passe oublié"></a-->
			</div>
			<?php endif ?>
		</div>
		<div id="page" style="vertical-align:top;">
			<!-- HEADER -->
			<div id="header">
				<a href="#"><img src="<?php echo image_path('durkle/squelette/header/s-a_logo.png') ?>" class="s-a_logo"/></a>
			</div>

			<!-- BARRE DE NAVIGATION -->
			<div id="navigbar">
				<div id="navbar">
					<a class="navAccueil" href="<?php echo url_for('News/index') ?>">Accueil</a>
					<a class="navForum" href="<?php echo '?' ?>">Forum</a>
					<a class="navBoutique" href="<?php echo url_for('FAQ/index') ?>">FAQ</a>
					<a class="navClassement" href="<?php echo url_for('Shop/index') ?>">Boutique</a>
					<a class="navSupport" href="<?php echo url_for('Account/vote') ?>">Voter</a>
				</div>
			</div>

			<div class="spacer"></div>
			<!-- PRE CONTENT -->
			<div id="pre-content">
				<div id="bloc-login">
					<?php if ($sf_user->isAuthenticated()): ?>
					<div id="cadre_gestion">
						<div class="cadre_avatar">
						<!--<img title="aucun avatar" style="margin:7px 0 0 6px;" class="avatar" src="<?php echo image_path('durkle/squelette/pre-content/panel-gestion/avatars/no_avat.png') ?>"/>-->
							<img title="natSu" style="margin:7px 0 0 6px;" class="avatar" src="<?php echo image_path('durkle/squelette/pre-content/panel-gestion/avatars/natSu.png') ?>"/>
						</div>
						<p class="welcome"><?php echo __('Welcome, %name%', array('%name%' => $sf_user->getAccount()->getPseudo())) ?></p>
						<div class="bg_point">
							<p class="points"><?php echo $sf_user->getAccount()->getPoints() ?><img class="sap" src="<?php echo image_path('durkle/squelette/pre-content/panel-gestion/sap.png') ?>"  style="margin:0px 0 0 3px;"/>
							</p>
						</div>
						<!--div class="barre_vote">
							<img class="barre_vote_f" src="<?php echo image_path('durkle/squelette/pre-content/panel-gestion/barre_vote_f.png') ?>"  style="height:11px;width:50%;margin:4px 0 0 3px;"/>
							<p class="nbr_vote">5/10</p>
						</div-->
						<div class="link_gestion">
							<!--img class="mail" src="<?php echo image_path('durkle/squelette/pre-content/panel-gestion/mail.png') ?>"/><a class="link_mail" href="#">Vous avez (1) nouveau message</a><br/-- >
							<img style="margin-left:4px;" class="clef" src="<?php echo image_path('durkle/squelette/pre-content/panel-gestion/gestion.png') ?>"/><a class="link_clef" href="#">Gestion de votre compte</a><br/-->
							<img style="margin-left:1px;" class="achat" src="<?php echo image_path('durkle/squelette/pre-content/panel-gestion/achat.png') ?>"/><a class="link_achat" href="<?php echo url_for('Account/credit') ?>"><?php echo __('Credit account') ?></a><br/>
							<img style="margin-left:-3px;" class="close" src="<?php echo image_path('durkle/squelette/pre-content/panel-gestion/close.png') ?>"/><a class="link_close" href="<?php echo url_for('Account/log') ?>"><?php echo __('Log Out') ?></a>
						</div>
					</div>
					<?php else: ?>
						<div id="cadre_login">
							<form method="get" action="<?php echo url_for('Account/log') ?>" class="champs">
								<div class="login">
									<p>
										<input id="inputlogin" type="text" name="username" value="<?php echo __('Username') ?>" onfocus="if (this.value == '<?php echo str_replace("'", "\\'", __('Username')) ?>'){this.value = '';}" maxlength="13" />
									</p>
								</div>
								<div class="pass">
									<p>
										<input id="inputpassword" type="password" name="password" value="***" onfocus="if (this.value == '***'){this.value = '';}" maxlength="13" />
									</p>
								</div>
								<p class="submit">
									<input class="seconnecter" value="<?php echo __('Log In') ?>" name="connexion" type="submit" />
								</p>
							</form>
							<!--a href="#" class="passlost" title="Mot de passe oubliÃ©" /></a-->
						</div>
					<?php endif ?>
				</div>

				<div id="carrousel">
					<div id="slide1" class="slide">
						<!--div class="title"><!-- not working - ->
							<p><a style="color:#959598;" href="#">CMS Soul Avenger, Enfin disponible !</a><br/>
			Achetez le maintenant, et recevez en plus <span style="color:#54a9a3;">3 objets inê¥©ts</span>.</p>
						</div-->
						<div class="visu">
							<img src="<?php echo image_path('durkle/scroller/images/item1.png') ?>"/>
						</div>
					</div>
					<!--div id="slide2" class="slide">
						<div class="visu">
							<img src="<?php echo image_path('durkle/scroller/images/item2.png') ?>"/>
						</div>
						<div class="title">
							<p>N'avez vous jamais rêvé de faire un monde à votre <br/>
			effigie ... Biensure que si, alors qu'attendez vous !<br/>
								<span style="color:#54a9a3;">YggDrassil Editor 4.0</span> : <a style="color:#959598;" href="#">c'est par ici !</a></p>
						</div>
					</div>
					<div id="slide3" class="slide">
						<div class="visu">
							<img src="<?php echo image_path('durkle/scroller/images/item3.png') ?>"/>
						</div>
						<div class="title">
							<p>Enfin du contenu vraiment custommisé !<br/>
			Un système sera bientôt mis en place et vous <br/>
			permettra de faire <span style="color:#54a9a3;">vos demandes</span> d'objet customisé.</p>
						</div>
					</div>-->
				</div>
			</div>

			<div class="spacer"></div>

			<div id="ins_vote">
				<?php if (!$sf_user->isAuthenticated()): ?><a href="#" class="join" title="<?php echo __('Register') ?>"></a><?php endif ?>
				<div id="promo_acc">
					<p id="mess_acc">
						<?php echo __('Welcome on %serv%,<br />If you\'re looking for stability and features,<br />You just found what you were looking for !', array('%serv%' => sfDbConfigHandler::get('server_name'))) ?>
					</p>
				</div>
				<a href="#" class="vote" title="<?php echo __('Vote and earn %money% !', array('%money%' => sfDbConfigHandler::get('shop_name'))) ?>"></a>
			</div>

			<div class="spacer"></div>
<!--
					<div id="menu-link">
						<?php if ($sf_user->isAuthenticated()): ?>
						<?php if (sfDbConfigHandler::has('pass_type')): ?>
						<span><?php echo link_to(__('Credit account'), 'Account/credit') ?></span>
						<?php endif /*credit*/ ?>
						<?php if (!$sf_user->getAccount()->relatedExists('Contact')): ?>
						<?php url_for('Contact/new') ?>" class="menuItem2"><?php echo __('Contact us') ?></a>
						<?php endif /*!contact*/ ?>
						<?php else: /*!authenticated*/ ?>
						<span><?php echo link_to(__('Register'), 'Account/new') ?></span>
						<?php endif /*authenticated*/ ?>
						<?php echo link_to(__('Join us'), 'Account/join') ?>
						<?php echo link_to(__('Shop'), 'Shop/index') ?>
						<?php if (sfDbConfigHandler::has('vote_id')): ?>
						<?php echo link_to(image_tag('http://rpg-paradize.com/vote.gif'), 'Account/vote') ?>
						<?php endif /*vote*/ ?>
						<!--div class="stats_glob">
							<p class="nbrc">1000</p>
							<p class="nbrp">1230</p>
						</div
					</div>-->
			<div id="left_col">
				<div id="menu">
					<div id="menutop">
					</div>
					<div id="menubg">
						<br />
						<ul id="menu-link">
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
							<li><?php echo link_to('Vote', 'Account/vote') ?></li>
							<?php endif /*vote*/ ?>
							<!--
							<li><a id="btn_1" class="active" href="#">Accueil</a></li>
							<li><a id="btn_2" href="#">Boutique</a></li>
							<li><a id="btn_3" href="#">Sondage</a></li>
							<li><a id="btn_p" href="#">Forum</a></li>
							<li><a id="btn_i" href="#">Livre d'or</a></li>
							<li><a id="btn_p" href="#">Armurerie</a></li>
							<li><a id="btn_i" href="#">Itemviewer</a></li>
							<li><a id="btn_p" href="#">Statistiques</a></li>
							<li><a id="btn_i" href="#">Membres</a></li>
							<li><a id="btn_p" href="#">Event</a></li>			--->
						</ul>		
					</div>
					<div id="menubot">
					</div>
				</div>
				<div id="stats_serv">
					<div class="stats_live">
						<div class="serveurs">
							<div class="first">
								<p class="name_type">Azendar - HÃ©roique :</p>
								<img class="statu" alt="on" src="<?php echo image_path('durkle/squelette/left_col/stats_serv/on.png') ?>"/>
								<div class="barre_pourc">
									<img src="<?php echo image_path('durkle/squelette/left_col/stats_serv/barre_pourc_full.png') ?>" style="height:14px;width:75%;margin:4px 0 0 3px;"/>
									<p style="font-size:12px;margin-top:-18px;text-align:center;width:205px;" class="Jonline">450/600</p>
								</div>
							</div>
						</div>
					</div>
					<div class="nextback">
						<a href="javascript:;" id="backlink"></a>
						<a href="javascript:;" id="nextlink"></a>
					</div>
				</div>
				<a href="#" class="link_officiel" title="Rejoindre le serveur officiel"></a>
			</div>

			<div id="content">
				<?php echo $sf_content ?>
			</div>

			<div id="footer">
				<div class="footer_sep"></div>
				<div class="footercontent">
					<div id="footernav">
						<a href="#">Conditions gÃ©nÃ©rales d'utilisation</a>
		|
						<a href="#">L'Ã©quipe</a>
		|
						<a href="#">Politique de confidentialitÃ©</a>
		|
						<a  href="#">Nous contacter</a>
					</div>
					<div class="spacer"></div>
					<br/>
					<div id="copyright">
	Ce site n'est en aucun cas liÃ© Ã  Ankama Games&copy; et/ou ses affiliÃ©s.<br/>
	      &copy; 2011 - Azendar - Tous droits reservÃ©s.
					</div>
				</div>
		</div>
	</body>
</html>