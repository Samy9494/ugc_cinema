<?php include_once('../../composants/dashboard/header.php') ?>
<?php include_once('../../composants/dashboard/menu.php') ?>
<?php include_once('../../functions/function_list_user.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des utilisateurs</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Genre</th>
                    <th>Username</th>
                    <th>role</th>
                    <th>date de naissance</th>
	                <th>date de creation</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
		                <tr>
			                <td> <?= $user['id'] ?> </td>
			                <td> <?= $user['genre'] ?> </td>
			                <td> <?= $user['username'] ?> </td>
			                <td> <?= $user['role'] ?> </td>
			                <td> <?= $user['dateNaissance'] ?> </td>
			                <td> <?= $user['dateCreation'] ?> </td>
		                </tr>
	                <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    </div>
    </div>

<?php include_once('../../composants/dashboard/footer.php') ?>