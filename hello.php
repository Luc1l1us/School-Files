<!DOCTYPE html>
<html>
<head>
	<title>PHP Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel = "stylesheet" href = "style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        .rowtest {padding: 50px; margin: 0px 20%}
        .left {border-radius: 20px 0px 0px 20px;background: linear-gradient(90deg, rgba(233,17,156,1) 0%, rgba(0,212,255,1) 100%);}
        .spacer {padding: 35px;}
        .right {border-radius: 0px 20px 20px 0px;padding-bottom: 150px;}
        .rem {text-align: left;}
        .rec {text-align: right;color:blue;}
        .rec:hover{cursor:pointer;}
        .d-grid {margin-top: 8%;}
        .form {box-shadow: 0 3px 4px rgba(37,37,37,.2),0 1px 6px rgba(65,63,63,.25);border-radius: 20px;}
    </style>
</head>
<body>
	
	<form method="post" action="">
    <div class = "container-fluid text-center">
        <div class = "rowtest text-center">
            <div class = "container-fluid text-center">
                <div class = "row form">
                    <div class = "col-6 left">
                        <div class = "designcol">
                            
                        </div>
                    </div>
                    <div class = "col-6 right">
                        <div class = "spacer">
                        </div>
                        <div class = "logo-placement">
                            <img src = "IconForWebsite.png" class = "logo">
                        </div>
                        <div class = "intro">
                            <h1> He<small class="text-muted">llo!</small> </h1>
                            <h4> Please regi<small class="text-muted">ster/login!</small> </h4>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                              <input type="text" class="form-control" placeholder="First name" name = "firstname">
                            </div>
                            <div class="col">
                              <input type="text" class="form-control" placeholder="Last name" name = "lastname">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name = "address">
                        </div>

                        <div class="form-group">
                            <label for="inputContact">City</label>
                            <input type="text" class="form-control" id="inputContact" placeholder="Bacolod City" name = "city">
                          </div>

                        <div class = "rem-rec">
                            <div class = "row">
                                <div class = "col rem">
                                    Remember me
                                </div>
                                <div class = "col rec">
                                    Recover Password
                                </div>
                            </div>
                        </div>
                        <div class = "d-grid gap-3">
                        <input type="submit" name="submit" value="Submit">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
	</form>

	<?php
		if(isset($_POST['submit'])){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "logintest";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
			  die("Connection failed: " . mysqli_connect_error());
			}
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$sql = "INSERT INTO loginTable (firstname, lastname, address, city) VALUES ('$firstname', '$lastname', '$address', '$city')";
			if (mysqli_query($conn, $sql)) {
			  echo "Recorded";
			} else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	?>
</body>
</html>