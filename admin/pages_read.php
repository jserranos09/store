<?php
include ("header.php");
?>
	<main class="bg-light">
			<div class="jumbotron">
			<div class="container">
			  <h1>Read Pages</h1>
			</div>
		</div>
		<div class="container py-3">
            <!-- PHP code will be here -->
            <?php
                // include database connection
                include ("db.php");

                echo '<a href="pages_create.php" class="btn btn-primary float-right mb-2">Create New Page</a>';

                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
                    or die("Didn't work");

                $query = "SELECT id, title FROM pages ORDER BY id ASC";                
                $data = mysqli_query($dbc, $query);

                // delete codes will be here

                //$id = 'id';
                if (isset($_GET['delete'])) {

                    // delete query
                    $query2 = "DELETE FROM pages WHERE id = $id";
                    mysqli_query($dbc,$query2)
                        or die('Error querying database');
                    mysqli_close($dbc);

                    echo 'deleted';
                } else {
                    echo 'Not deleted';

                    /*if($stmt->execute()) {
                        // redirect to read records page and 
                        // tell the user record was deleted
                        header('Location: pages_read.php?message=deleted');
                    } else {
                        echo "<div class='alert alert-danger'>Unable to delete record.</div>";		
                    }*/
                }

                /*if (isset($_GET['message']) && $_GET['message'] == 'deleted') {
                    echo "<div class='alert alert-success'>Record was deleted.</div>";
                }*/

                // end of the delete code

                echo '<table class="table table-hover table-bordered">';//start table
                //creating our table heading
                echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Title</th>';
                    echo '<th>Action</th>';
                echo '</tr>';

                while($rows = mysqli_fetch_array($data)) { 
                    echo '<tr>';
                        echo '<td>'.$rows['id'].'</td>';
                        echo '<td>'.$rows['title'].'</td>';
                        echo '<td>';
                            // read one record 
                            echo '<a href="pages_read_one.php?id='.$rows['id'].'" class="btn btn-info btn-sm mr-1 mb-1">Read</a>';
                            // update one record
                            echo '<a href="pages_update.php?id='.$rows['id'].'" class="btn btn-primary btn-sm mr-1 mb-1">Edit</a>';
                            // delete one record but with confirmation warning
                            echo '<a href="#" data-href="pages_read.php?delete='.$rows['id'].'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm mb-1">Delete</a>';
                        echo '</td>';
                    echo '</tr>';
                } 

                mysqli_close($dbc);
            ?>
		</div>
        
	</main>
    <!-- Modal is here-->
	<div class="modal fade" id="confirm-delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Confirm Delete
				</div>
				<div class="modal-body">
					<p>Are you sure?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<a class="btn btn-danger btn-ok">Delete</a>
				</div>
			</div>
		</div>
	</div>
<?php
include ("footer.php");
?>


