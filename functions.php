<?php
	// addProduct('Huawei P9 Lite', 'Un téléphone si performant !', '180');

	function addProduct($name, $descript, $price, $devise = null, $thumb = null, $stock = null, $top = false, $imgs = [], $ref = null)
	{
		if( $devise == null ){ $devise = PRODUCT_DEFAULT_DEVISE; }
		if( $thumb == null ){ $thumb = PRODUCT_DEFAULT_THUMB; }
		if( $stock == null ){ $stock = PRODUCT_DEFAULT_STOCK; }
		if( $ref == null ){ $ref = PRODUCT_PREFIX_REF . substr( uniqid(), 0, 5 ); }

		$products = ProductFile();

		$product = array(
			'name'     => $name,
			'descript' => $descript,
			'price'    => $price,
			'devise'   => $devise,
			'thumb'    => $thumb,
			'stock'    => $stock,
			'top'      => $top,
			'imgs'     => $imgs,
			'ref'      => $ref
		);

		$products[ time() ] = $product;

		if( file_put_contents( DATA_DIR .'products.json', json_encode( $products ) ) ){
			return NOTIF_SUCCESS_ADD_PRODUCT;
		}else{
			return NOTIF_ERROR_ADD_PRODUCT;
		}
	}

	function getProduct($nbr = null, $id = null)
	{
		if( $nbr == null ){ $nbr = SHOW_PRODUCT_NBR; }
		$products = ProductFile();

		if( $id == null ){
			$products = array_chunk($products, $nbr, true);
			$products = $products[0];
		}else{

			if( array_key_exists($id, $products) ){
				$products = $products[$id];
			}else{
				return NOTIF_ERROR_GET_ID_PRODUCT;
			}		
		}

		return $products;
	}

// Sert à vérifier si le fichier de produits existe
	function ProductFile()
	{
		if( file_exists(DATA_DIR . 'products.json') ){
			$products = (array) json_decode( file_get_contents( DATA_DIR . 'products.json' ) );
		}else{
			$products = array();
		}

		$return = [];
		foreach ($products as $key => $value) {
			$return[$key] = (array) $value;
		}

		return $return;
	}

	function getDevise($devise)
	{
		switch ($devise) {
			case 'dollar':
				return ' <i class="fa fa-usd"></i>';
				break;
			
			default:
				return ' <i class="fa fa-eur"></i>';
				break;
		}
	}

// USER

	function addUser($name, $password)
	{
		$users = UserFile();

		$id = uniqid();

		$user = array(
			'id'    => $id,
			'name'     => $name,
			'password' => sha1($password)
		);

		$users[ sha1( $id ) ] = $user;

		if( file_put_contents( DATA_DIR .'users.json', json_encode( $users ) ) ){
			return NOTIF_SUCCESS_ADD_USER;
		}else{
			return NOTIF_ERROR_ADD_USER;
		}
	}

	function getUser($id)
	{
		$users = UserFile();

		if( array_key_exists($id, $users) ){
			return $users[$id];
		}else{
			return NOTIF_ERROR_GET_ID_USER;
		}	
	}

	function UserFile()
	{
		if( file_exists(DATA_DIR . 'users.json') ){
			$user = (array) json_decode( file_get_contents( DATA_DIR . 'users.json' ) );
		}else{
			$user = array();
		}

		$return = [];
		$users_list = [];
		foreach ($user as $key => $value) {
			$return[$key] = (array) $value;
			$users_list[] = $value['name'];
		}

		file_put_contents(DATA_DIR . 'users_list.json', array_keys( $users_list ));

		return $return;
	}


// Cart

	function addCart($token, $product)
	{
		$cart = CartFile($token);

		$id = uniqid();

		$user = array('ref' => $product['ref'], $product);

		$cart[ $token ][] = $user;

		if( file_put_contents( DATA_DIR .'cart.json', json_encode( $cart ) ) ){
			return NOTIF_SUCCESS_CART_ADD;
		}else{
			return NOTIF_ERROR_CART_ADD;
		}
	}

	function CartFile($token)
	{
		if( file_exists(DATA_DIR . 'cart.json') ){
			$carts = (array) json_decode( file_get_contents( DATA_DIR . 'cart.json' ) );
		}else{
			$carts = array();
		}

		$return = [];
		foreach ($carts[$token] as $key => $value) {
			$return[$key] = (array) $value;
		}

		return $return;
	}


function myVarDump($dump)
{
	echo "<pre>";

	var_dump($dump);

	echo "</pre>";
}