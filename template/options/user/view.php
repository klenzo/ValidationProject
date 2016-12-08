<?php
	if( $_TOKEN == null ){
		require_once TEMPLATE_DIR .'subtemplate/user/form.php';
	}else{
		require_once TEMPLATE_DIR .'subtemplate/user/view.php';
	}