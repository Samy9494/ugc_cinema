<?php include_once('composants/public/header.php') ?>
<?php require_once('functions/function_list_film.php'); ?>


    <main role="main">

        <section class="jumbotron jumbotron-fluid video">
            <div class="container video-opacity">
	            <h1>Cinema Canal +</h1>
	            <p class="lead">
		            CANAL+ rassemble les meilleurs contenus. Tous vos programmes en live et à la demande, partout et quand vous voulez.
	            </p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
	            <div class="row">
                    <?php foreach ($films as $film) { ?>
	                    <div class="col-md-4">
		                    <div class="card mb-4 shadow-sm">
			                    <img alt="" width="100%" height="390" src="assets/images/films/<?= $film['affiche'] ?>">
			                    <div class="card-body">
				                    <p class="card-text"><?= $film['titre'] ?></p>
				                    <div class="d-flex justify-content-between align-items-center">
					                    <div class="btn-group">
											<button data-id="<?= $film['id_film'] ?>" onclick="addFav(event)">Favorie</button>
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
	
	<script src="<?=GLOBAL_PREFIX?>/assets/js/addFav.js"></script>


 <?php include_once('composants/public/footer.php') ?>