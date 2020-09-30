<?php
session_start();
?>
<html>

<head>
	<title>Login Page</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/site.css" />

</head>

<body>
	<?php
	$msg = "";


	if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$con = mysqli_connect("localhost", "root", "", "sample");

		//			mysqli_select_db("student", $con);

		$nm = $_POST['username'];
		$pass = $_POST['password'];
		$em = $_POST['email'];

		$sql = "INSERT INTO lab1 (UserName, password, email) VALUES('$nm','$pass','$em')";

		mysqli_query($con, $sql);
	}


	?>


	<div>
		<div class="a">

			<table width="100%" height="100%">
				<tr>
					<td align="center" valign="middle">
						<div class="b">
							<table style="background-color: white;" class="table-condensed">
								<form method="post">
									<tr>
										<td align="center">
											<h2>JOIN NOW!</h2>
										</td>
									</tr>
									<tr>
										<td>
											<b>User Id:</b>
										</td>
									</tr>
									<tr>
										<td>
											<input type="text" class="inputbox" name="username" placeholder="User Id"></input>
										</td>
									</tr>
									<tr>
										<td>
											<b>Password:</b>
										</td>
									</tr>
									<tr>
										<td>
											<input type="password" class="inputbox" name="password" placeholder="Password"></input>
										</td>
									</tr>
									<tr>
										<td>
											<b>Email:</b>
										</td>
									</tr>

									<tr>
										<td>
											<input type="email" class="inputbox" name="email" placeholder="Email"></input>
										</td>
									</tr>
									<tr>
										<td align="center">
											<br>
											<!--<a class="btn-normal" name="login" >LOGIN</a><br>-->
											<button class="btn-normal" name="submit">Submit</button>
										</td>
									</tr>
									<td>
										<hr style="background-color:blue;height:1px;margin:0px;" />

									</td>
				</tr>
				<tr>
					<td align="center">
						Join using
					</td>
				</tr>
				<tr>
					<td>
						<button class="btn-normal-logo"><span><img src="assets/images/fb.png" width="34px" height="34px" />FACEBOOK</span></button>
						&nbsp;&nbsp;
						<button class="btn-normal-logo"><span><img src="assets/images/google.png" width="34px" height="34px" />GOOGLE</span></button>
					</td>
				</tr>
				</form>
			</table>
		</div>
		</td>
		</tr>
		</table>
	</div>
	</div>

</body>

</html>