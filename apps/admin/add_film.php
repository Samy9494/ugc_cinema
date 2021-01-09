<?php include_once('../../composants/dashboard/header.php') ?>
<?php include_once('../../composants/dashboard/menu.php') ?>
<?php require_once('../../functions/function_list_film.php'); ?>
<?php require_once('../../functions/function_add_film.php'); ?>
<?php include_once('../../functions/function_list_categorie.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajouter un film</h1>
      </div>

	    <div class="row">
		    <div class="col-md-6">
			    <!-- Message  -->
	            <?php include_once('../../composants/fashMessage.php') ?>

			    <form action="add_film.php" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
					    <label for="nom_film">Nom</label>
					    <input type="text" placeholder="Nom" name="titre" class="form-control" id="nom_film">
				    </div>
				    <div class="form-group">
					    <label for="description">description</label>
					    <textarea class="form-control" name="description" rows="3" cols="15"></textarea>
				    </div>
				    <div class="form-group">
					    <label for="auteur">Nom de l'auteur</label>
					    <input type="text" placeholder="Nom de l'auteur" name="auteur" class="form-control" id="auteur">
				    </div>
				    <div class="form-group">
					    <label for="affiche">L'affiche du film</label>
					    <input type="file" required name="affiche" class="form-control" id="affiche">
				    </div>
				    <div class="form-group">
					    <label for="dateSortir">Date de sortir</label>
					    <input type="date" name="date_sortir" class="form-control" id="dateSortir">
				    </div>
				    <div class="form-group">
					    <label for="categorie">Categorie</label>
					    <select class="form-control" id="categorie" name="categorie">
							<?php foreach ($categories as $categorie) { ?>
						        <option value="<?= $categorie['id'] ?>"> <?= $categorie['nom'] ?></option>
                            <?php } ?>
					    </select>
				    </div>
				    <button name="film" type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Ajouter</button>
			    </form>
		    </div>
		    <div class="col-md-6">
			    <div class="table-responsive">
				    <table class="table table-striped table-sm">
					    <thead>
					    <tr>
						    <th>#</th>
						    <th>Titre</th>
						    <th>Auteur</th>
						    <th>Date de sortir</th>
						    <th>Categorie</th>
					    </tr>
					    </thead>
					    <tbody>
                        <?php foreach ($films as $film) { ?>
						    <tr>
							    <td>
							        <img alt="" width="100" height="150" src="<?php echo '../../assets/images/films/' . $film['affiche']; ?>">
							    </td>
							    <td> <?= $film['titre'] ?> </td>
							    <td> <?= $film['auteur'] ?> </td>
							    <td> <?= $film['dateSortir'] ?> </td>
							    <td> <?= $film['nom_categorie'] ?> </td>
						    </tr>
                        <?php } ?>
					    </tbody>
				    </table>
			    </div>
		    </div>
	    </div>
	    <hr class="mt-4">
    </main>
  </div>
</div>

<?php include_once('../../composants/dashboard/footer.php') ?>