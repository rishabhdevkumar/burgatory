<?php
	include("config.php");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Add Gallery Photo</title>

	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.notifyBar.js"></script>
	<link rel="stylesheet" href="css/notifyBar.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<script type="text/javascript" src="js/jquery.configuration.js"></script>

	<script type="text/javascript" language="javascript" src="js/jquery.validationEngine.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.validationEngine-en.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="ckeditor/_samples/sample.js"></script>
	<link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css">
	<!-- <script type="text/javascript">
		$(document).ready(function () {
			$("#dashboard").validationEngine()
		});

		function chk_valid_img(input) {
			var file = document.getElementById("img").value;
			if (file) {
				var ext = file.match(/\.([^\.]+)$/)[1];
				switch (ext) {
					case 'jpg':
					case 'jpeg':
					case 'bmp':
					case 'png':
					case 'JPG':
					case 'JPEG':
					case 'BMP':
					case 'PNG':
						$("#preview1").html('<img src="images/loader.gif" alt="Uploading...."/>');
						if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {

								document.getElementById('blah').style.display = "block";
								document.getElementById('preview1').style.display = "none";
								$('#blah').attr('src', e.target.result);
							}

							reader.readAsDataURL(input.files[0]);
						}
						return true;
						break;
					default:
						showError('Invalid file format');
						document.getElementById("img").value = '';
						return false;
				}
			}
			else {
				document.getElementById("menu_p").style.display = "block";
				document.getElementById("image_p1").style.display = "block";
			}
		}
		function checkname(e) {
			if (document.getElementById("name").value.length == 0 && e.which == 32) {
				return false;
			}
		}

	</script> -->
	<script>
		function check_page(temp) {
			window.location = "add_banner.php?page_id=" + temp;
		}
	</script>
</head>

<body style="background: #f8f8f8ff">
	<div id="body-wrapper" style="background: #f8f8f8ff">
		<div id="sidebar">
			<div id="sidebar-wrapper">
				<?php require 'sidebar.php'; ?>
			</div>
		</div>
		<div id="main-content">
			<div class="content-box" style="box-shadow: 0px 0 12px 5px rgba(128, 122, 122, 0.29);width: 100%;">
				<div class="content-box-header">
					<h3>Add Banner Photo</h3>
					<ul class="content-box-tabs">
						<li><a href="add_banner.php" class="default-tab">Add Banner Photo</a></li>
					</ul>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content">
						<form action="" id="dashboard" enctype="multipart/form-data" method="post">
							<fieldset>
                                <p>
								<label>&nbsp;Select a Page&nbsp;<span style="color:red;">*</span></label>
								<SELECT NAME="page" id="page" class="medium-input validate[required]"
								onchange="check_page(this.value)">
									<option value="">Select</option>
									<?php
										$page = "SELECT * FROM `pages` WHERE 1";
										$run_page = mysqli_query($connect,$page);	
										while($fetch_page = mysqli_fetch_array($run_page))
										{
									?>
									<option value="<?php echo $fetch_page['id']?>"
									<?php
									  if(isset($_GET['page_id']) && $_GET['page_id']==$fetch_page['id'])
										{echo "selected='selected'" ;}?>>
										<?php echo $fetch_page['page_title']?>
									</option>
									<?php
										}
									?>
								</SELECT>
							</p>
								<p id="image_p">
									<label>&nbsp;Gallery Image&nbsp;<span style="color:red;">*</span></label>
									<input class="text-input medium-input validate[required]" type="file" id="img"
										name="img" onchange="chk_valid_img(this)" />
								</p>
								<div id="preview1">

								</div>
								<p>
									<img id="blah" src="#" alt="Preview" width="400" height="300"
										style="display:none;" />
								</p>
								<!-- <p>
									<label>&nbsp;Status&nbsp;<span style="color:red;">*</span></label>
									<input class="validate[required]" type="radio" id="status" name="status" value="Y"
										<?php if(isset($_POST['status']) && ($_POST['status']=="Y" ) )
										{echo "checked='checked'" ;} ?>/>Active
									<input class="validate[required]" type="radio" id="status" name="status" value="N"
										<?php if(isset($_POST['status']) && ($_POST['status']=="N" ) )
										{echo "checked='checked'" ;} ?>/>Inactive
								</p> -->
								<p>
									<input class="button" type="submit" value="Add Photo" id="insert" name="insert" />
								</p>
							</fieldset>
							<fieldset style="">
								<p id="preview"></p>
							</fieldset>
							<div class="clear"></div>
						</form>
					</div>
					<table>
								<thead>
									<tr>
										<th>Sl.No</th>
										<th>Page Name</th>
										<th>Banner Image</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$check_page = "SELECT * FROM `pages` WHERE page_id='".$_GET['cat_id']."'";
										$run_check = mysqli_query($connect,$check_page);
										while($fetch = mysqli_fetch_array($run_check))
										{
									?>
									<tr>
										<td style=" vertical-align: top;">
											<?php echo $fetch['name']?>
										</td>
										<td style="vertical-align: top;">
											<div id="did_<?=$fetch['id']?>">
												<?php if($fetch['status']=='Y') 
													{ 
												?>
												<a href="javascript:void(0)" style="color:green;"
													Title="Click here to deactivate"><img src="images/act.png"
													width="24" height="24" border="0" alt=""
													onclick="change_status('<?php echo $fetch['id'] ?>', 'yes' )">
												</a>
												<?php 
													}
													else 
													{ 
												?>
												<a href="javascript:void(0)" style="color:red;"
													Title="Click here to activate"><img src="images/deact.png"
													width="24" height="24" border="0" alt=""
													onclick="change_status('<?php echo $fetch['id'] ?>', 'no' )">
												</a>
												<?php
													}	 
												?>
											</div>
										</td>
										<td>
											<img src="../admin/menu_img/<?php echo $fetch['banner_image']?>" style=" height: 30px;width:40px">
										</td>
										<td style=" vertical-align: top;">
											<a href="edit_categories.php?cat_id=<?php echo $fetch['id']?>"
												title="Edit"><img src="images/pencil.png" alt="Edit" />
											</a>&nbsp;
											<a href="delete.php?cat_id=<?php echo $fetch['id']?> &page_id1=<?php echo $fetch['page_id']?>"
												onclick="return confirm('Are you sure you want to delete this page?')"
												title="Delete"><img src="images/cross.png" alt="Delete" />
											</a> &nbsp;
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

</body>

</html>

<style>
	table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 15px;
  font-size: 14px;
  background: #fff;
}

thead {
  background: #2c3e50;
  color: #fff;
}

thead th {
  padding: 10px;
  text-align: left;
  font-weight: bold;
}

</style>