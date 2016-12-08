<div class="row">
	<form action="/user" method="POST">
		<div class="row">
	        <div class="col s12">
	          <?= MY_NAME_IS; ?>
	          <div class="input-field inline">
	            <input id="user_name" type="text" name="name" placeholder="John">
	          </div>
	        </div>
	        <div class="col s12">
	          <?= MY_PASSWORD_IS; ?>
	          <div class="input-field inline">
	            <input id="user_password" type="password" name="password" placeholder="*****">
	          </div>
	        </div>
	      </div>
		 <button class="btn blue darken-2 waves-effect waves-light" type="submit" name="action_user" value="login"><?= KEYWORDS_LOGIN; ?></button>
		 <button class="btn green darken-2 waves-effect waves-light" type="submit" name="action_user" value="add"><?= KEYWORDS_CREATE; ?></button>
		 <button class="btn red darken-2 waves-effect waves-light" type="submit" name="action_user" value="delete"><?= KEYWORDS_DELETE; ?></button>
	</form>
</div>