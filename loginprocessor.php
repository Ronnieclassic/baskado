<?php
session_start ();
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'baskado';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}


if (isset($_POST['submit']))

	{
		$phone=$_POST['phone'];
		$password=$_POST['password'];

		
			$result=mysqli_query($conn, "SELECT * FROM new WHERE phone='$phone' AND password='$password' ")
				or die ('cannot login' . mysql_error());
			$row=mysqli_fetch_array  ($result);
			$run_num_rows = mysqli_num_rows($result);
							
						if ($run_num_rows > 0 )
						{

							$_SESSION['all'] = $row['Id'];
							$_SESSION['all'] = $row['name'];
							$_SESSION['all'] = $row['phone'];
							$_SESSION['all'] = $row['address'];
							$_SESSION['all'] = $row['dob'];
							$_SESSION['all'] = $row['photo'];
							$_SESSION['all'] = $row['nida'];
							
							header ("location:home.php");
						}
						
						else
						{
							echo "<script>alert('umekosea namba ya simu na nenosiri, tafadhali jaribu tena.')</script>";
							header("location:login.php");
						}
	}

?>