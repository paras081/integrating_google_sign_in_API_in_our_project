<?php
	session_start();

	if(empty($_SESSION['username']) && empty($_SESSION['user_first_name']))
	{
		echo "session username is empty";
		header('Location:login.php');
	}else
	{
		$usr=$_SESSION['username'];
?>
<html>
	<head>
		<title>Welcome</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/site.css" />
	</head>
	<body>
		<div>
			<div class="a">

				<table width="100%" height="100%">
					<tr>
						<td align="center" valign="middle">
							<div class="b">
								<table style="background-color: white;" class="table-condensed">
									<tr>
										<td align="center">
											<h1>Welcome</h1>
										</td>
									</tr>
									<tr>
										<td align="center">
											<h1><?php 	echo $usr.'<br>'; ?></h1>
										</td>
									</tr>
									
									<tr><td align="center"><?php
   									 echo '<img src="'.$_SESSION["user_image"].'" height="100px" width="100px" />';

   									 ?>
   									 </td></tr>


									<tr><td><?php
											echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
										?>
   									
   									 </td></tr>


									<tr><td>
									<?php
										echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
										?>
   									 </td></tr>

									<tr>
										<td align="center">
											<br>
											<a class="btn-normal" href="logout.php">Logout</a>
										</td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
<?php
}
?>