<?php
include ("header.php");
?>
	<main class="bg-light">
			<div class="jumbotron">
			<div class="container">
			  <h1>Create Product</h1>
			</div>
		</div>
		<div class="container py-3">
		
<?php
if($_POST){
	// check and upload photo first
	
	// include uploader class
	include '../libs/class.upload.php';	
	 
	if ($_FILES["photo"]["error"] == 0) {
	$handle = new Upload($_FILES['photo']);
	if ($handle->uploaded) {
	$handle->allowed = array('image/*');
	$handle->Process('../uploads/');

	if ($handle->processed) {
	$photo  = $handle->file_dst_name; // set $photo with file name
	} else {
	echo '<div class="alert alert-info">'.$handle->error.'</div>';	
	$photo = 'default.jpg'; // set $photo to default.jpg
	}
	$handle-> Clean();
	} else {
	echo '<div class="alert alert-info">'.$handle->error.'</div>';	
	$photo = 'default.jpg'; // set $photo to default.jpg
	}
	} else {
	echo '<div class="alert alert-warning">Photo not selected!</div>';	
	$photo = 'default.jpg'; // set $photo to default.jpg
	}

	// then insert data to database 

    // include database connection
    include '../config/db.php';	
	
		try{
		 
			// insert query
			$query = "INSERT INTO products SET title=:title, description=:description, price=:price, photo=:photo, created=:created";
	 
			// prepare query for execution
			$stmt = $con->prepare($query);
	 
			// posted values
			$title=htmlspecialchars(strip_tags($_POST['title']));
			$description=htmlspecialchars(strip_tags($_POST['description']));
			$price=htmlspecialchars(strip_tags($_POST['price']));

			// bind the parameters
			$stmt->bindValue(':title', $title);
			$stmt->bindValue(':description', $description);
			$stmt->bindValue(':price', $price, PDO::PARAM_INT);
			$stmt->bindValue(':photo', $photo);
			
			// specify when this record was inserted to the database
			$created=date('Y-m-d H:i:s');
			$stmt->bindValue(':created', $created);
			 
			// Execute the query
			if($stmt->execute()){
				echo "<div class='alert alert-success'>Record was saved.</div>";
			}else{
				echo "<div class='alert alert-danger'>Unable to save record.</div>";
			}
			 
		}
		 
		// show error
		catch(PDOException $exception){
			die('ERROR: ' . $exception->getMessage());
		}
}
?>	
			
			<a href="products_read.php" class="btn btn-secondary float-right mb-2">Back to read products</a>
			<!-- html form here where the product information will be entered -->			
			<form action="products_create.php" method="post" enctype="multipart/form-data">
				<table class="table table-hover table-bordered">
					<tr>
						<td>Title</td>
						<td><input type="text" name="title" class="form-control" /></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><textarea name="description" class="form-control"></textarea></td>
					</tr>
					<tr>
						<td>Price</td>
						<td><input type="text" name="price" class="form-control" /></td>
					</tr>
					<tr>
						<td>Photo</td>
						<td><input type="file" name="photo" /></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" value="Create" class="btn btn-primary" />
						</td>
					</tr>
				</table>
			</form>
		
		</div>
	</main>
<?php
include ("footer.php");
?>