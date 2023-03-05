<?php
include("db_connection.php");
	if(isset($_POST['submit'])) {
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$sql = "INSERT INTO loginTable (firstname, lastname, address, city) VALUES ('$firstname', '$lastname', '$address', '$city')";
		$result = mysqli_query($conn, $sql);

		if (mysqli_query($conn, $sql)) {
			echo "";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
		$servername = "localhost";
	}

	$select = "select * from logintable";
	$query = mysqli_query($conn, $select);
	if (isset($_GET['CustomerID'])) {
		$customerid = $_GET['CustomerID'];
		$delete = mysqli_query($conn, "DELETE FROM `logintable` WHERE `CustomerID`='$customerid'");

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel = "stylesheet" href = "style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
	
	<form method="post" action="">
	<div class =" d-flex align-items-end" id = "table-container" >
		<a href = 'create.php?' class='btn btn-success'> Add Users </a>
	</div>
		<div id = "table-container" class = "d-flex justify-content-center">
        <table class = "table table-hover">
            <thead class = "thead-dark">
                <tr>
                    <th scope="col"> CustomerID </th>
                    <th scope="col"> First Name </th>
                    <th scope="col"> Last Name </th>
                    <th scope="col"> Address </th>
                    <th scope="col"> City </th>
					<th scope="col"> Action </th>
                </tr>
				<?php 
				$num = mysqli_num_rows($query);
					if ($num>0) {
						while ($result = mysqli_fetch_assoc($query)) {
							echo "
						<tr>
							<td> ".$result['CustomerID']."</td>
							<td> ".$result['firstname']."</td>
							<td> ".$result['lastname']."</td>
							<td> ".$result['address']."</td>
							<td> ".$result['city']."</td>
							<td> 
								<a href = 'delete.php?deleteid=".$result['CustomerID']."'> Delete </a>
								<a href = 'update.php?updateid='".$result['CustomerID']."' class='btn btn-primary'> Update </a>
							</td>
						</tr>
							";
						}
					} else {
						echo "
					<tr>
						<td> No results. </td>
					</tr>";
					}
				?>
            </thead>
        </table>
		</div>
	</form>
</body>
</html>