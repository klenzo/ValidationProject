<?php
	if ( isset( $_POST['action_user'] ) ) {
		if( isset( $_POST['name'] ) && !empty( $_POST['name'] ) && isset( $_POST['password'] ) && !empty( $_POST['password'] ) ){
			$name = strip_tags( $_POST['name'] );

			addUser($name, $_POST['password']);

		}else{
			return NOTIF_ERROR_USER_INFO_INVALID;
		}
	}