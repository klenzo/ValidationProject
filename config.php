<?php
	
// Constantes
	define('NAME_SITE', 'MyShop');

	define('IMG_DIR', '/assets/img/');
	define('UPLOADS_DIR', 'uploads/');
	define('DATA_DIR', 'data/');
	define('TEMPLATE_DIR', 'template/');
	define('TMP_DIR', 'tmp/');
	
	define('PRODUCT_DEFAULT_DEVISE', 'euro');
	define('PRODUCT_DEFAULT_THUMB', IMG_DIR .'no-thumb.png');
	define('PRODUCT_DEFAULT_STOCK', 10);
	define('PRODUCT_PREFIX_REF', 'MSPx');

	define('SHOW_PRODUCT_NBR', 9);
	define('SHOW_PRODUCT_ROW', 3);
	
	// define('DEVISE_VALIDE', ['euro']);
	

// Gestion des templates
	$templates = ['home', 'categorys', 'cart', 'product', 'user', 'search'];
	$_TEMPLATE = 'home'; // Page par défaut

	if( isset( $_GET['template'] ) && in_array($_GET['template'], $templates) ){ $_TEMPLATE = $_GET['template']; }

// Gestion des options de templates
	$options = ['view', 'add', 'delete', 'update'];
	$_OPTION = 'view';

	if( isset( $_GET['option'] ) && in_array($_GET['option'], $options) ){ $_OPTION = $_GET['option']; }

// Gestion des IDs ( pour les options )
	if( isset( $_GET['name'] ) && strlen( intval( $_GET['name'] ) ) == 10 ){ $_ID = $_GET['name']; }else{ $_ID = null; }

// Gestion de la recherche
	$_SEARCH = null;
	if( isset( $_GET['search'] ) && !empty( $_GET['search'] ) && is_string( strip_tags( $_GET['search'] ) ) ){ $_SEARCH = strip_tags( $_GET['search'] ); }

// Gestion des langues ( Oui je l'ai fait ! :) )
	$langs = ['fr' => 'Français', 'en' => 'English'];
	$_LANG = 'fr';

	if( isset( $_GET['lang'] ) && in_array($_GET['lang'], array_keys( $langs ) ) ){
		$_LANG = $_GET['lang'];
		$_SESSION['lang'] = $_LANG;
	}else{ 
		if( isset( $_SESSION['lang'] ) && in_array($_SESSION['lang'], $langs) ){
			$_LANG = $_SESSION['lang'];
		}
	}

// Gestion de l'utilisateur
	if( isset( $_SESSION['token'] ) && !empty( $_SESSION['token'] ) ){ $_TOKEN = $_SESSION['token']; }else{ $_TOKEN = null; }

// Gestion du panier
	if( !isset( $_SESSION['cart_q'] ) || !is_int( $_SESSION['cart_q'] ) ){ $_SESSION['cart_q'] = 0; }