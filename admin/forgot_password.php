<!-- <?php
include("config.php");
if(isset($_POST['email_address']) && $_POST['email_address']!='' && isset($_POST['submit']))
	{
		
		

		$email=htmlentities(addslashes(trim($_POST['email_address'])));
    	$check_email="SELECT * FROM `dosa_admin_master` WHERE email_address='".$email."'";
    	$run_email=mysql_query($check_email);

		if($run_email)
		{
			
			$fetch_email=mysql_fetch_array($run_email);  
     		$id=$fetch_email['id'];
      		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      		$count = mb_strlen($chars);
      		$length = 8;
      		for ($i = 0, $result = ''; $i < $length; $i++) 
    		{
       		 $index = rand(0, $count - 1);
       		 $result .= mb_substr($chars, $index, 1);
    		}	
    		$new_password = $result;
        	$encrpt_pass=MD5($new_password);
        	 $update_forget_password="UPDATE `dosa_admin_master` SET password='".$encrpt_pass."' WHERE id='".$id."'";
       		 $run_update=mysql_query($update_forget_password);



			if($run_update)
			{
			

				$mail_body = "Dear ".$fetch_email['username'].",<br/><br/>You have successfully reset your admin account access details. Following describe the new account access details. You can update these access details once you get login to your account.<br/><br/><b>Username:</b> ".$fetch_email['username']."<br/><b>Password:</b> ".$new_password."<br/><br/>Regards,<br/>Administrator,<br/>REDCHILLIES Restaurant";
			
				@mail($_POST['email_address'], $fetch_email['email_address'], '', 'Your updated account access details', $mail_body);
				
				$_SESSION['SET_TYPE'] = 'success';
				$_SESSION['SET_FLASH'] = 'Your password have been reset successfully. Please check your email.';
			}
		}
		else
		{
			$_SESSION['SET_TYPE'] = 'error';
	        $_SESSION['SET_FLASH'] = 'This Email Address is not available within our database. Please enter correct email address.';
		}
	}
?> -->
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Forgot Password || Burgatory</title>	  
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.notifyBar.js"></script>
		<script type="text/javascript" src="js/jquery.configuration.js"></script>
		<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
		<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
	    <link rel="stylesheet" href="css/notifyBar.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" />
	<script type="text/javascript">
	
		$(document).ready(function() 
		{
			$("#forgot_password_form").validationEngine({scroll:true})	
		});
	
	</script>
</head>  
<body style="background:#F7F7F7;" onload = "document.getElementById('email_address').focus();">		
	<div id="login-wrapper" class="png_bg">
		<div id="login-top" style="margin-top:-30px;;">&nbsp;</div>		
		<div id="login-content" style="width:508px;height:272px;background: #f7f7f7 url('images/loginbox_bg.png') top left no-repeat;">
			<div style="width:300px;clear:both;height:30px;padding-top:30px;padding-left:120px;">
				<h4><font color = "#FFFFFF">Forgot Password || REDCHILLIES</font></h4>
			</div>
			<form name ="forgot_password_form" id ="forgot_password_form" action ="" 
			method="POST">							
				<div style="width:385px;clear:both;height:50px;padding-left:65px">
					<font color = "#FFFFFF">Please enter your valid email address to regenerate your password.</font>
				</div>
				<div class="clear"></div>
				<div style="width:300px;clear:both;height:30px;padding-left:80px">
					<div style="width:30px;float:left;margin-left:40px;" align="right">
						<img src="images/user.png" width="30" height="30" border="0" alt="email">
					</div>
					<div>
						<input class="text-input validate[required,custom[email],length[0,255]]" type="text" name="email_address" id="email_address" value="" tabindex = "1" autocomplete="off"/>
					</div>
				</div>
				<div class="clear"></div>
				<div style="width:147px;height:20px;float:left;margin:0px 0px 0px 100px;padding:24px 0px 0px 0px">
					<a href="index.php" style="text-decoration:none" title = "Back To Login Page"><font color="#ffffff">Back To Login Page</font></a>
				</div>
				<p style="width:110px;height:30px;padding-left:0px;margin:0px 0px 0px 20px;float:left">
				   <input class="button" type="submit" value="Submit" name="submit" tabindex = "2" style="cursor:pointer;"/>
				</p>
			</form>
		</div>
	</div>		
</body>  
</html>
<!-- <?php
if(isset($_SESSION['SET_FLASH']))
{
	if($_SESSION['SET_TYPE']=='success')
	{
		echo "<script type='text/javascript'>showSuccess('".$_SESSION['SET_FLASH']."');</script>";
	}
	else if($_SESSION['SET_TYPE']=='error')
	{
		echo "<script type='text/javascript'>showError('".$_SESSION['SET_FLASH']."');</script>";
	}
}
unset($_SESSION['SET_FLASH']);
unset($_SESSION['SET_TYPE']);
?> -->