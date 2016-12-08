<?php
	if( isset( $_POST['action_user'] ) && in_array($_POST['action_user'], ['add', 'delete', 'login']) ){
		$_OPTION = $_POST['action_user'];
	}

	require_once 'options/user/'. $_OPTION .'.php';