<?php
	session_start();

	require_once 'config.php';
	require_once 'langs/'. $_LANG .'.php';
	require_once 'functions.php';

	include_once 'template/inc/header.php';
	include_once 'template/'. $_TEMPLATE .'.php';
	include_once 'template/inc/footer.php';