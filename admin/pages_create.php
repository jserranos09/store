<?php
include ("header.php");
?>
	<main class="bg-light">
			<div class="jumbotron">
			<div class="container">
			  <h1>Create Pages</h1>
			</div>
		</div>
		<div class="container py-3">
		
			<?php
				if($_POST){
				//if (isset($_POST['submit'])) { 

					// include database connection
					include ("db.php");

					$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
						or die('Didnt work');
						
					$title = $_POST['title'];
					$body = $_POST['body'];

					// insert query
					$query = "INSERT INTO pages (id, title, body) VALUES (0, '$title', '$body')";

					/*mysql_query($dbc, $query) 
            			or die("This didn't work either");*/

					if (mysql_query($dbc, $query)) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $query . "<br>" . mysqli_error($dbc);
					}

					echo 'Added!';

					$title = "";
					$body = "";

					mysqli_close($dbc);
				}
			?>

			<a href="pages_read.php" class="btn btn-secondary float-right mb-2">Back to read pages</a>
			
			<!-- html form here where the product information will be entered -->			
			<form action="pages_create.php" method="post">
				<table class="table table-hover table-bordered">
					<tr>
						<td>Title</td>
						<td><input type="text" name="title" class="form-control" /></td>
					</tr>
					<tr>
						<td>Body</td>
						<td><textarea name="body" class="form-control"></textarea></td>
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