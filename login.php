<?php include_once('composants/public/header.php'); ?>
<?php include_once('functions/function_login.php'); ?>
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
        <form class="form-signin col-md-4 card" action="login.php" method="POST">

            <!-- Message  -->
            <?php include_once('composants/fashMessage.php') ?>

            <p class="text-center">
                <img class="img-thumbnail mt-2" src="assets/images/logo.png" alt="" width="150">
            </p>
            <h1 class="h3 mb-3 font-weight-normal">Se Connectez</h1>

            <label for="username" class="col-form-label">username</label>
            <input type="email" name="username" id="username" class="form-control" placeholder="username" required>
            
            <label for="inputPassword" class="col-form-label">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            
            <button name="login" class="btn btn-lg btn-primary btn-block mt-5" type="submit">Login</button>
        </form>
    </div>

<?php include_once('composants/public/footer.php') ?>