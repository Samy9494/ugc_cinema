<?php include_once('../../composants/dashboard/header.php') ?>
<?php include_once('../../composants/dashboard/menu.php') ?>
<?php include_once('../../functions/function_add_categorie.php'); ?>
<?php include_once('../../functions/function_list_categorie.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ajouter une categorie</h1>
        </div>

	    <div class="row">
		    <div class="col-md-6">
			    <!-- Message  -->
                <?php include_once('../../composants/fashMessage.php') ?>

			    <form action="add_categorie.php" method="POST">
				    <div class="form-group">
					    <label for="categorie">Nom de la categorie</label>
					    <input type="text" placeholder="Nom de la categorie" name="nom_categorie" class="form-control" id="categorie">
				    </div>
				    <button name="categorie" type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Ajouter</button>
			    </form>
		    </div>
		    <div class="col-md-6">
			    <div class="table-responsive">
				    <table class="table table-striped table-sm">
					    <thead>
					    <tr>
						    <th>#</th>
						    <th>Nom</th>
					    </tr>
					    </thead>
					    <tbody>
						    <?php foreach ($categories as $categorie) { ?>
							    <tr>
								    <td> <?= $categorie['id'] ?> </td>
								    <td> <?= $categorie['nom'] ?> </td>
							    </tr>
							<?php } ?>
					    </tbody>
				    </table>
			    </div>
		    </div>
	    </div>
    </main>
    </div>
    </div>

<?php include_once('../../composants/dashboard/footer.php') ?>