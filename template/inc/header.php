<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= NAME_SITE; ?></title>

	<link rel="stylesheet" href="/lib/materialize/bin/materialize.css">
	<link rel="stylesheet" href="/lib/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
	<ul id="dropdown1" class="dropdown-content">
		
		<?php
			$drop_lang = '';
			foreach ($langs as $key => $value) {
				$drop_lang .= '<li><a href="/'. $key .'">'. $value .'</a></li>';
			}
			echo $drop_lang;
		?>
	</ul>
	<nav>
		<div class="nav-wrapper">
			<a href="/" class="brand-logo"><i class="fa fa-opencart"></i> <?= NAME_SITE; ?></a>
			<ul class="right hide-on-med-and-down">
				<li>
					<form action="/search" method="GET">
						<div class="input-field">
							<input id="search" type="search" placeholder="<?= TEXT_SEARCH_INPUT; ?>" required>
							<label for="search"><i class="fa fa-search"></i></label>
						</div>
					</form>
				</li>
				<li><a href="/categorys"><?= KEYWORD_CATEGORYS; ?></a></li>
				<li><a href="/user"><?= KEYWORD_USER; ?></a></li>
				<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Langue <i class="fa fa-chevron-down right"></i></a></li>
			</ul>
		</div>
	</nav>
        

	<div class="container">
