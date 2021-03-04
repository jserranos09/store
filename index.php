<?php include ("header.php");?>
	<main class="bg-light">
		<div class="jumbotron">
			<div class="container">
			  <h1>Welcome to My Shop</h1>
			  <p>Buy new cell phones at a cheap price!</p>
			</div>
		</div>
		<div class="container py-5">
			<div class="row">
				<?php
				// Our Data
				include ("data.php");

				// inserts data while using bootsrap to look nice
				for ($i=0;$i<count($title);$i++) {
					echo '	
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
					  <div class="card mb-3">
						<img src="uploads/'.$photo[$i].'" class="card-img-top" width="10" height="300">
						<div class="card-body">
						  <h3 class="card-title">'.$title[$i].'</h3>
						  <p class="card-text">$'.$price[$i].'</p>
						  <a href="details.php?id='.$i.'"><button type="button" class="btn btn-success">Details</button></a>
						</div>
					  </div>
					</div>';
				}	
				?>
			</div> 
		</div>
	</main>
<?php include ("footer.php"); ?>

