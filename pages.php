<?php
// Our Data
include ("data.php");

// Get and Prepare Data
$id = $_GET['id'];
$out = '
<div class="card">
	<div class="card-body">
	  <h2 class="card-title">'.$pages_title[$id].'</h2>
	  <p class="card-text">'.$pages_text[$id].'</p>
	</div>
</div>';

$pageTitle = $pages_title[$id];

include ("header.php");
?>
	<main class="bg-light">
		<div class="jumbotron">
			<div class="container">
			  <h1>Welcome to My Shop</h1>
			  <p>Buy new cell phones at a cheap price!</p>
			</div>
		</div>
		<div class="container py-5">
				<?php
				// Show Data
				echo $out;
				?>
		</div>
	</main>
<?php
include ("footer.php");
?>