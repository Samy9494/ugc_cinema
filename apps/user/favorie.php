<?php include_once('../../composants/dashboard/header.php') ?>
<?php include_once('../../composants/dashboard/menu_user.php') ?>
<?php require_once('../../functions/function_list_favorie.php') ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Favorie</h1>
  </div>

  <?php echo $_SESSION['username'];?> 


    <div class="album py-5 bg-light">
      <div class="container">
	      <div class="row">

          <?php foreach ($films as $film) { ?>
	          <div class="col-md-4">
		          <div class="card mb-4 shadow-sm">
			          <img alt="" width="100%" height="390" src="../../assets/images/films/<?= $film['affiche'] ?>">
			          <div class="card-body">
				          <p class="card-text"><?= $film['titre'] ?></p>
				          <div class="d-flex justify-content-between align-items-center">
					            <div class="btn-group">
						            <button type="button" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i> Plus de détail</button>
					            </div>
				          </div>
			          </div>
		          </div>
	          </div>
          <?php } ?>

	      </div>
      </div>
    </div>  

  </main>


<?php include_once('../../composants/public/footer.php') ?>