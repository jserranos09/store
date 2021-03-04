<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?php echo $pageTitle; ?></title>

	<style>
	footer {
	  padding-top: 3rem;
	  padding-bottom: 3rem;
	}
	footer p {
	  margin-bottom: .25rem;
	}
	</style>
  </head>
  <body>
	<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container">
	  <a class="navbar-brand" href="index.php">MyShop</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item active">
			<a class="nav-link" href="index.php">Home</a>
		  </li>
		  <li class="nav-item">
          <!-- makes the id equal about -->
			<a class="nav-link" href="pages.php?id=about">About</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="pages.php?id=contact">Contact</a>
		  </li>
          <li class="nav-item">
			<a class="nav-link" href="pages.php?id=rules">Rules</a>
		  </li>
		</ul>
	  </div>
	  </div>
	</nav> 
	</header>