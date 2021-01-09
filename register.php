<?php include_once('composants/public/header.php') ?>
<?php include_once('functions/function_register.php') ?>
<?php include_once('functions/ifLoginConnexion.php'); ?>

	<section class="jumbotron jumbotron-fluid video">
		<div class="container video-opacity">
			<h1>Cinema Canal +</h1>
			<p class="lead">
				CANAL+ rassemble les meilleurs contenus. Tous vos programmes en live et à la demande, partout et quand vous voulez.
			</p>
		</div>
	</section>

	<div class="d-flex justify-content-center mt-5">
	    <form method="POST" action="register.php" class="form-signin col-md-4 card">

		    <!-- Message  -->
	        <?php include_once('composants/fashMessage.php') ?>

		    <p class="text-center">
			    <img class="img-thumbnail mt-2" src="assets/images/logo.png" alt="" width="150">
		    </p>

	        <h1 class="h3 mb-3 font-weight-normal">S'Inscrire</h1>

	        <select name="genre" class="custom-select custom-select-sm mb-3">
	            <option selected>Genre</option>
	            <option value="H">Homme</option>
	            <option value="F">Femme</option>
	        </select>

	        <label for="email" class="col-form-label">Email</label>
	        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required >

	        <label for="dateNaissance" class="col-form-label">date de Naissance</label>
	        <input type="date" name="dateNaissance" class="form-control" id="dateNaissance">

	        <label for="password" class="col-form-label">Mot de passe</label>
	        <input type="password" name="password" id="password" class="form-control" placeholder="xxxxxxx" required>

	        <label for="passwordConfirmed" class="col-form-label">Mot de passe de confirmation</label>
	        <input type="password" name="passwordConfirmed" id="passwordConfirmed" class="form-control" placeholder="xxxxxxx" required>

	        <div class="checkbox mb-3">
	            <label>
	            <input type="checkbox" name="cgu" value="true"> Condition générale d'utilisation
	            </label>
	        </div>
	        <button name="register" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
	    </form>
	</div>

<?php include_once('composants/public/footer.php') ?>