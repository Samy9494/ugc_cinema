<?php include_once 'functions/parameters.php'; ?>
<?php include_once 'functions/database.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>UCG Cinema</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicons -->
    <link rel="icon" href="assets/images/logo.png" sizes="32x32" type="image/png">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .video {
          background-color: black;
          background-image: url("https://wallpapermemory.com/uploads/601/fantastic-four-movie-wallpaper-ultra-hd-4k-70140.jpg");
          background-position: top center;
          background-size: cover;
	      color: white;
      }

      .video-opacity {
	      background-color: rgba(0, 0, 0, 0.5);
	      color: white;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
	        <img class="img-thumbnail mt-2" src="assets/images/logo.png" alt="" width="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>

            <div class="form-inline my-2 my-lg-0">
	            <?php if($_SESSION['id'] == 0) {  ?>
	                <a href="login.php" class="btn btn-success my-2 my-sm-0 mr-3" >Connexion</a>
	                <a href="register.php" class="btn btn-secondary my-2 my-sm-0" >Inscription</a>
                <?php } else { ?>
		            <a href="apps/user/dashboard.php" class="btn btn-primary my-2 my-sm-0 mr-3" > <i class="fa fa-user"></i>  <?php echo $_SESSION['username']; ?>  </a>
		            <a class="btn btn-danger" href="functions/logout.php"> <i class="fa fa-power-off"></i> Deconnexion</a>
                <?php } ?>
            </div>
        </div>
        </nav>
    </header>