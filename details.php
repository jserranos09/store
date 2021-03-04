
<?php
// Our Data
include ("data.php");

// Get and Prepare Data
$id = $_GET['id'];
$out = '
<div class="card">
  <div class="row no-gutters">
	<div class="col-md-4">
	  <img src="uploads/'.$photo[$id].'" class="card-img">
	</div>
	<div class="col-md-8">
	  <div class="card-body">
		<h5 class="card-title">'.$title[$id].'</h5>
		<p class="card-text">'.$description[$id].'</p>
	  </div>
	</div>
  </div>
  <div class="card-footer">$'.$price[$id].'</div>
</div>
';

$pageTitle = $title[$id];
include ("header.php");
?>
	<main class="bg-light">
		<div class="jumbotron">
			<div class="container">
                <?php echo '<h2>' . $title[$id] . '</h2>'; ?>
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

