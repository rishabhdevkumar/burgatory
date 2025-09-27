<?php
	include("config.php");
	$id = base64_decode($_GET['profile_id']);
	$change_image = "SELECT * FROM user WHERE id = '".$id."'";
	$run = mysqli_query($connect,$change_image);
	$fetch_image = mysqli_fetch_array($run);
	if(isset($_POST['submit']))
	{
		$new_image = ($_FILES['image']['name']);
		$update_image = "UPDATE user Set profile = '".$new_image."' WHERE id = '".$id."'";
		echo $run_update = mysqli_query($connect,$update_image);
		if($run_update)
		{
			move_uploaded_file(($_FILES['image']['tmp_name']),'profile_image/'.$new_image);
			header("location:my_account.php");
		}else
		{
			echo '<script>alert("Profile does not update")</script>';
		}

	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Pprofile</title>
</head>

<body>
	<div>
		<form method="POST" action="" enctype="multipart/form-data">
			<div>
				<title>Edit Profile</title>
			</div>
			<div class="previous_image">
				<img src="profile_image/<?php echo $fetch_image['profile']?>" width="200px" height="150px">
			</div>
			<div>
				<input type="file" class="form-control" name="image">
			</div>
			<div>
				<button type="submit" name="submit" value="submit">upload</button>
			</div>
		</form>
	</div>
</body>

</html>