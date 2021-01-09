<?php include_once('../../composants/dashboard/header.php') ?>
<?php include_once('../../composants/dashboard/menu_user.php') ?>
<?php require_once('../../functions/function_user_profil.php'); ?>
<?php require_once('../../functions/function_user_profil_update.php'); ?>


  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Profil</h1>
    </div>

    <div class="d-flex justify-content-center mt-5">
	    <form method="POST" action="profil.php" class="form-signin col-md-4 card">

		    <!-- Message  -->
	        <?php include_once('../../composants/fashMessage.php') ?>

		    <p class="text-center">
			    <img class="img-thumbnail mt-2" src="../../assets/images/logo.png" alt="" width="150">
		    </p>

	        <h1 class="h3 mb-3 font-weight-normal">Profil</h1>

	        <select name="genre" class="custom-select custom-select-sm mb-3">
	          <option selected value="<?php echo $user['genre'];?>">Genre</option>
	          <option value="H">Homme</option>
	          <option value="F">Femme</option>
	        </select>

	        <label for="email" class="col-form-label">Email</label>
	        <input type="email" name="email" id="email" class="form-control" value="<?php echo $user['email'];?>" required >

	        <label for="dateNaissance" class="col-form-label">date de Naissance</label>
	        <input type="date" name="dateNaissance" class="form-control" id="dateNaissance" value="<?php echo $user['dateNaissance'];?>">

	      	        
	        <button name="register" class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>
	        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
	    </form>
	</div>
    </main>
  </div>
</div>

<?php include_once('../../composants/dashboard/footer.php') ?>