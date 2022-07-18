<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Purchase</h2>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="pur_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="pur_add" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Suburb</label>
                            <input type="text" name="pur_sub" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="pur_ste" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="pur_ctr" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="pur_email" class="form-control">
                        </div>

                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
					<?php
                        
                        $name = $_POST['pur_name'];
	                    $address = $_POST['pur_add'];
	                    $suburb = $_POST['pur_sub'];
       	                $state = $_POST['pur_ste'];
	                    $country = $_POST['pur_ctr'];
	                    $email = $_POST['pur_email'];
	                    
	                    $servername = "localhost";
                        $username = "ec";
                        $password = "internet";
                        $db = "assignment1";

                        $conn = new mysqli($servername, $username, $password, $db);
                        
                        $sql = "INSERT INTO purchase (pur_name,pur_add,pur_sub,pur_ste,pur_ctr,pur_email)
                                VALUES ('" . $name . "','" . $address . "','" . $suburb . "','" . $state . "','" . $country . "','" . $email . "');";
                        if (mysqli_query($conn, $sql)) {
                           echo "New purchase record has been added successfully !";
                              } else {
                           echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
            mysqli_close($conn);
						/*$servername = "localhost";
						$username = "ec";
						$password = "internet";
						$db = "assignment1";

						$conn = new mysqli($servername, $username, $password, $db);

						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						  }
						else{
							echo $_POST['pur_name'];
							if(isset($_POST['submit']))
							{    
								 $name = $_POST['pur_name'];
								 $address = $_POST['pur_add'];
								 $sql = "INSERT INTO purchase (pur_name,pur_add)
								 VALUES ('$name','$address')";
								 if (mysqli_query($conn, $sql)) {
									echo "New record has been added successfully !";
								 } else {
									echo "Error: " . $sql . ":-" . mysqli_error($conn);
								 }
								 mysqli_close($conn);
							}
						}*/
						?>
					
                </div>
            </div>        
        </div>
    </div>
</body>
</html>