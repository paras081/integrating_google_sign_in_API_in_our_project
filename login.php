<?php
	
	include('config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 //$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="assets/images/google.png" /></a>';
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="assets/images/google.png" width="34px" height="34px"/>GOOGLE</a>';

 // <img src="assets/images/google.png" width="34px" height="34px"/>GOOGLE
}

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
			$msg="";


			if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']))
			{

					$t1=$_REQUEST['username'];
					$t2=$_REQUEST['password'];
					$con = mysqli_connect("localhost","root","","sample");

				//	$sql="select * from lab1 where UserName = '$t1' AND password ='$t2'";

				  $sql="select * from lab1";

					$rs=mysqli_query($con,$sql);
				//	$row=mysqli_fetch_array($rs);
				//	$count=mysqli_num_rows($rs);
					//if($count==1)
				//	{
				//		header('URL=welcome.php');
				//	}
					while($row=mysqli_fetch_array($rs))
					{
						$unm=$row['UserName'];
						$p=$row['password'];
						if($t1==$unm && $t2==$p)
						{
							$_SESSION['valid']= true;
							$_SESSION['timeout']=time()+3600;
							$_SESSION['username']=$_POST['username'];
							header('Location:welcome.php');
						}

					}
					mysqli_close($con);
				
				}else if($login_button == '')
   				{
   					header('Location:welcome.php');
				    // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
				    // echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
				    // echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
				    // echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
				    // echo '<h3><a href="logout.php">Logout</h3></div>';
			   }else{


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
											<h2>USER LOGIN</h2>
										</td>
									</tr>
									<tr>
										<td>
											<h4><?php echo $msg; ?></h4>
											<b>User Id:</b>
										</td>
									</tr>
									<tr>
										<td>
											<input type="text" class="inputbox" placeholder="unm= Miraj limbasia" name="username"></input>
										</td>
									</tr>
									<tr>
										<td>
											<b>Password:</b>
										</td>
									</tr>
									<tr>
										<td>
											<input type="password" class="inputbox" placeholder="password=123" name="password"></input>
										</td>
									</tr>
									<tr>
										<td align="left">
											<input id="ckb1" type="checkbox" name="remember-me" >
											<label  for="ckb1">
											Remember me
											</label>
								        </td>
							        </tr>
									<tr>
										<td align="center">
											<br>
											<!--<a class="btn-normal" name="login" >LOGIN</a><br>-->
											<button class="btn-normal" name="login" >LOGIN</button>
										</td>
									</tr>

									<tr>
										<td align="left">
											<br>
											<span class="f"><a href="fp.php"> Forgot Password ?</span>
								        </td>
							        </tr>
							        <tr>
										<td>
											<hr style="background-color:blue;height:1px;margin:0px;"/>

										</td>
									</tr>
									<tr>
										<td align="center">
											Login with
										</td>
									</tr>
									<tr>
										<td>
											<button class="btn-normal-logo"><span><img src="assets/images/fb.png" width="34px" height="34px"/>FACEBOOK</span></button>
											&nbsp;&nbsp;
											<!-- <button class="btn-normal-logo"><span><img src="assets/images/google.png" width="34px" height="34px"/>GOOGLE</span></button> -->
											<button class="btn-normal-logo">
											<span>
												<?php 
												echo $login_button;
												?>
											</span>
											</button>

										</td>
									</tr>
									<tr>
										<td>
											<span>New here?<a class="f" href="signup.php">Sign Up</span>
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

		<?php

		}
		
		?>

	</body>
</html>
