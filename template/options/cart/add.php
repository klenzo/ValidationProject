<?php
	if( $_ID != null ){
		$product = getProduct(1, $_ID);


		if( !empty( $product ) || !is_null( $product ) || !is_bool( $product ) ){
			if( isset( $_SESSION['cart'][$product['ref']] ) && !empty( $_SESSION['cart'][$product['ref']] ) ){
				$_SESSION['cart'][$product['ref']]['quant'] = $_SESSION['cart'][$product['ref']]['quant'] + 1;
			}else{
				$_SESSION['cart'][$product['ref']] = array('data' => $product, 'quant' => 1);
			}
			$_SESSION['cart_q'] = $_SESSION['cart_q'] + 1;

			if( isset( $_TOKEN ) && $_TOKEN != null ){
				return addCart($_TOKEN, $product);
			}else{
				header('location: /user');
			}
		}else{
			return NOTIF_ERROR_GET_ID_PRODUCT;
		}


	}else{
		return NOTIF_ERROR_CART_ID_NULL;
	}