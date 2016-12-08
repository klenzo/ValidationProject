<?php
	$products = getProduct();

	echo '<div class="row">';
	foreach ($products as $key => $value) {
?>
		<div class="col s3 m4">
			<div class="card sticky-action">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?= $value['thumb']; ?>">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?= $value['name']; ?><i class="fa fa-ellipsis-v material-icons right"></i></span>
					<p><?= $value['price'] . getDevise($value['devise']); ?></p>
				</div>
				<div class="card-action" style="text-align: right;"><a href="/cart/add/<?= $key; ?>" class="link_ajax"><?= TEXT_ADD_TO_CART; ?></a></div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4"><?= $value['name']; ?><i class="fa fa-times material-icons right"></i> </span>
					<p><?= $value['descript']; ?></p>
				</div>
			</div>
		</div>
<?php
	}
?>
	</div>