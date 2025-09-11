<?php
  include("config.php");
  session_start();  
  if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
  {
    header("Location: index.php");
  }
  $user_id = $_SESSION['user_id'];
  $login_user = "
    SELECT u.*, s.state_name, c.city_name 
    FROM user u
    LEFT JOIN state s ON u.state = s.id
    LEFT JOIN city c ON u.city = c.id
    WHERE u.id = '$user_id'
  ";
  $command_run = mysqli_query($connect, $login_user);
  $fetch_rec = mysqli_fetch_array($command_run);

  // ---------- update user data ------------

  $id = $_SESSION['user_id'];
  if(isset($_POST['save']))
	{
		$Name = $_POST['name'];
		$Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Address = $_POST['address'];
		$Dob = $_POST['dob'];
    $State = $_POST['state'];
    $zipcode = $_POST['Zipcode'];
    $City = $_POST['city'];
		
    $email_check = "SELECT * FROM user WHERE email = '".$Email."' And id!='".$id."'";
		$run_email = mysqli_query($connect,$email_check);
		$num_rows= mysqli_num_rows($run_email);
		if($num_rows>0)
		{
			echo'<script>alert("Duplicate Email Id Is Not Allowed")</script>';
		}
		else
		{
			$update_rec = "UPDATE user Set name='".$Name."',email='".$Email."', phone_no='".$Phone."', address='".$Address."',
      dob='".$Dob."', state='".$State."', zip_code='".$zipcode."',city='".$City."' WHERE id ='".$id."'";
		$run_update = mysqli_query($connect,$update_rec);
		if($run_update)
		{
			header("location: my_account.php");
		}
		else
		{
			echo'<script>alert("Somthing Went Wrong")</script>';
		}
		}
	}

  // ------------- update profile ------------
  $id = $_SESSION['user_id'];
	$change_image = "SELECT * FROM user WHERE id = '".$id."'";
	$run = mysqli_query($connect,$change_image);
	$fetch_image = mysqli_fetch_array($run);
	if(isset($_POST['submit']))
	{
		$new_image = ($_FILES['userprofile']['name']);
		$update_image = "UPDATE user Set profile = '".$new_image."' WHERE id = '".$id."'";
		echo $run_update = mysqli_query($connect,$update_image);
		if($run_update)
		{
			// header("location:dashboard.php");
			move_uploaded_file(($_FILES['userprofile']['tmp_name']),'profile_image/'.$new_image);
			echo '<script>alert("profile update")</script>';
		}else
		{
			echo '<script>alert("Profile does not update")</script>';
		}

	}

  // ------------- update password ------------
if(isset($_POST['update']))
	{
		$New_password = md5($_POST['password']);
		$Conf_password = $_POST['confirm_password'];
		$Old_password  = md5($_POST['old_password']);
	
	  $valid_password = "SELECT * FROM user WHERE id = '".$id."'";
		$run = mysqli_query($connect,$valid_password);
		$fetch_pass = mysqli_fetch_array($run);

		if($Old_password==$fetch_pass['password'])
		{
			$update_password = "UPDATE user Set password = '".$New_password."' WHERE id ='".$id."'";
			$run_update = mysqli_query($connect,$update_password);
			if($run_update)
			{
				header("location: my_account.php");
			}
			else
			{
				echo '<script>alert("password does not update")</script>';
			}
		}
		else
		{
			echo '<script>alert("Wrong old password")</script>';
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>My Burgatory</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>


  <script type="text/javascript">

    $(document).ready(function () {

      var validator = $("#myform").validate({

        rules: {

          name: {
            required: true,
            minlength: 2
          },

          email: {
            required: true,
            email: true
          },

          password: {
            required: true,
            minlength: 5
          },
          confirm_password: {
            required: true,
            minlength: 5,
            equalTo: "#password"
          },

          phone: {
            required: true,
            minlength: 10
          },

          address: "required",
          dob: "required",
          State: "required",
          Zipcode: "required",
          City: "required"

        },

        messages: {
          name: {
            required: "Please enter your name",
            minlength: "Your name must consist of at least 2 characters"
          },

          email: "Please enter a valid email address",

          old_password: {
            required: "Please provide  password",
            equalTo: "Please enter correct password"
          },

          password: {
            required: "Please provide  password",
            minlength: "Your password must be at least 5 characters long"
          },

          confirm_password: {
            required: "Please provide confirm password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password"
          },

          phone: {
            required: "Please enter your Phone No",
            minlength: "Your Phone No must consist of at least 10 digits"
          },

          address:
          {
            required: "please enter address"
          },
          dob:
          {
            required: "please choose date of birth"
          },

          State:
          {
            required: "Please select State"
          },

          Zipcode: "please enter Zipcode",

          City:
          {
            required: "Please select City"
          }

        },

        errorElement: "em",
        errorPlacement: function (error, element) {
          error.addClass("help-block");

          element.parents(".valid");

          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element);
          }
        },
        success: function (label, element) {
        },
        highlight: function (element, errorClass, validClass) {
          $(element).parents(".valid").addClass("has-error").removeClass("has-success");
          /*$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );*/
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).parents(".valid").addClass("has-success").removeClass("has-error");
          /*$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );*/
        }
      });

    });
    document.addEventListener("DOMContentLoaded", function () {
      document.getElementById('editProfilebutton').addEventListener('click', function (e) {
        e.preventDefault();
        console.log("Edit Profile button clicked");
      });
    });

    document.addEventListener("DOMContentLoaded", function () {
      document.getElementById('editPasswordbutton').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('password').removeAttribute('disabled');
        document.getElementById('confirm_password').removeAttribute('disabled');
        document.getElementById('password').focus();
      });
    });

    document.getElementById('editPasswordbutton').addEventListener('click', function (e) {
      e.preventDefault();
      document.getElementById('password').removeAttribute('disabled');
      document.getElementById('confirm_password').removeAttribute('disabled');
      document.getElementById('password').focus();
    });

    function get_city_by_state(temp) {
      const state = temp;
      const value = 'state=' + state;
      $.ajax({
        url: "city_ajax.php",
        type: "POST",
        data: value,
        success: function (data) {
          $("#city").html(data);
        },
        error: function (jqXHR, textstatus, errorThrown) {
          console.log(textstatus, errorThrown);
        }
      })
    }
  </script>

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
  <!-- <nav class="navbar navbar-default navbar-fixed-top ggg">
    <div class="container-fluid jjj">
      <div class="navbar-header ddd">
        <button type="button" class="navbar-toggle nnn" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand mmm1 out_line acc_col" href="index.html">BURGATORY<img src="image/burger.png" height="60"
            height="60" class="ttt"></a>
      </div>
      <div class="collapse navbar-collapse mmm askjd" id="myNavbar">
        <ul class="nav navbar-nav navbar-right iii">
          <li><a href="index.php" class="asek out_line acc_col">HOME</a></li>
          <li><a href="about.php" class="asek out_line acc_col">ABOUT</a></li>
          <li><a href="menus.php" class="asek out_line acc_col">MENU</a></li>
          <li><a href="gallary.php" class="asek out_line acc_col">GALLARY</a></li>
          <li><a href="reservation.php" class="asek out_line acc_col">RESERVATION</a></li>
          <li><a href="contact_us.php" class="asek out_line acc_col">CONTACT US</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle toggle_radius cart_ic_font acc_col" data-toggle="dropdown" role="button"
              aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> 7<span
                class="caret"></span></a>
            <ul class="dropdown-menu dropdown-cart toggle_radius drop_back1" role="menu">
              <li>
                <span class="item">
                  <span class="item-left">
                    <img src="http://lorempixel.com/50/50/" alt="" />
                    <span class="item-info">
                      <span>Item name</span>
                      <span>$23</span>
                    </span>
                  </span>
                  <span class="item-right">
                    <button class="btn btn-xs cap_mar1"><img src="image/pencil.png" alt=""><button
                        class="btn btn-xs btn-danger pull-right">x</button>
                  </span>
                </span>
              </li>
              <li>
                <span class="item">
                  <span class="item-left">
                    <img src="http://lorempixel.com/50/50/" alt="" />
                    <span class="item-info">
                      <span>Item name</span>
                      <span>$23</span>
                    </span>
                  </span>
                  <span class="item-right">
                    <button class="btn btn-xs cap_mar1"><img src="image/pencil.png" alt=""><button
                        class="btn btn-xs btn-danger pull-right">x</button>
                  </span>
                </span>
              </li>
              <li>
                <span class="item">
                  <span class="item-left">
                    <img src="http://lorempixel.com/50/50/" alt="" />
                    <span class="item-info">
                      <span>Item name</span>
                      <span>$23</span>
                    </span>
                  </span>
                  <span class="item-right">
                    <button class="btn btn-xs cap_mar1"><img src="image/pencil.png" alt=""><button
                        class="btn btn-xs btn-danger pull-right">x</button>
                  </span>
                </span>
              </li>
              <li>
                <span class="item">
                  <span class="item-left">
                    <img src="http://lorempixel.com/50/50/" alt="" />
                    <span class="item-info">
                      <span>Item name</span>
                      <span>$23</span>
                    </span>
                  </span>
                  <span class="item-right">
                    <button class="btn btn-xs cap_mar1"><img src="image/pencil.png" alt=""><button
                        class="btn btn-xs btn-danger pull-right">x</button>
                  </span>
                </span>
              </li>
              <li class="divider"></li>
              <li><a class="text-center order_weight " href="cart.php"><button type="button"
                    class="btn btn-danger text-center">View All</button></a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle user_mar_font toggle_radius cart_ic_font acc_col" data-toggle="dropdown"
              href="#"><i class="fa fa-user" aria-hidden="true"></i>
              <span class="caret"></span></a>
            <ul class="dropdown-menu toggle_radius drop_back1">
              <?php
                session_start();
                include("config.php");
                if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
                $id = $_SESSION['user_id'];
                $select = "SELECT * FROM user WHERE id = '".$id."'";
                $run = mysqli_query($connect, $select);
                $fetch = mysqli_fetch_array($run);
              ?>
              <p style="margin: 0px 0px 5px 0px; color: purple">
                Welcome
                <?php echo $fetch['name']; ?>
              </p>
              <li><a href="my_account.php" class="drop_back">My Account</a></li>
              <li><a href="my_order.php" class="drop_back">My Order</a></li>
              <li><a href="logout.php" class="drop_back">Logout</a></li>
              <?php
              } else {
              ?>
              <li><a href="login.php" class="drop_back">Login/Register</a></li>
              <?php
              }
              ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row imagd-height">
      <img src="image/restaurant-interior.jpg" class="pos_re">
      <div class="carousel-caption abt_margin">
        <h3 class="abt_width">MY ACCOUNT</h3>
      </div>
    </div>
  </div> -->
  <div class="container">
    <div class="row">
      <div class="col-md-11 col-sm-12 col-xs-12">
        <div class="col-md-11 col-sm-12 col-xs-12 pull-right">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
              <div class="col-md-4 col-sm-4 col-xs-4 text-start">
                <img src="profile_image/<?php echo $fetch_image['profile']?>" class="rounded-circle" alt="Profile" width="50" height="50">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4 myacc_mar1">
                <h4 class="text_c1 regis_font text-center">MY ACCOUNT</h4>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4 text-end">
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle user_mar_font toggle_radius cart_ic_font acc_col"
                      data-toggle="dropdown">
                      <span class="mail">
                        <?php echo $fetch['name'];?>
                      </span>
                      <i class="fa fa-caret-down" style="color: black;"></i>
                    </a>
                    <ul class="dropdown-menu toggle_radius drop_back1">
                      <li>
                        <a href="#" class="drop_back" id="editProfilebutton" data-toggle="modal"
                          data-target="#profileModal">
                          <img src="../burgatory/image/edit.png" alt="icon" width="15px" height="15px"> Change Profile
                        </a>
                      </li>
                      <li>
                        <a href="#" id="editPasswordbutton" class="drop_back" data-toggle="modal"
                          data-target="#passwordModal">
                          <img src="../burgatory/image/padlock.png" alt="icon" width="15px" height="15px"> Edit Password
                        </a>
                      </li>
                      <li>
                        <a href="logout.php" class="drop_back">
                          <img src="../burgatory/image/exit.png" alt="icon" width="15px" height="15px"> Logout
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <form data-toggle="validator" role="form" id="myform" method="POST" action="">
                <div class="form-group myacc_mar">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="valid">
                        <input type="text" value="<?php echo $fetch['name']?>" class="form-control my_acc_top"
                          placeholder="Name" id="name" name="name">
                        </input>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 my_acc_top2">
                      <div class="valid">
                        <input type="text" value="<?php echo $fetch['email']?>" class="form-control my_acc_top"
                          placeholder="Email" id="email" name="email">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="profileModal" tabindex="-1" role="dialog"
                  aria-labelledby="profileModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-3 shadow">
                      <div class="modal-header bg-primary text-white d-flex align-items-center">
                        <button type="button" class="close text-white mr-2" data-dismiss="modal" aria-label="Close"
                          style="opacity:1;">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title font-weight-bold mb-0" id="profileModalLabel">
                          👤 EDIT PROFILE
                        </h5>
                      </div>
                      <div class="modal-body">
                        <form id="updateProfileForm" method="POST" action="" enctype="multipart/form-data">
                          <div>
                            <img src="profile_image/<?php echo $fetch_image['profile']?>" alt="profile" style="margin: 0px 25px 0px 220px; border-radius: 5px;" height="90px" width="120px">
                          </div><br>
                          <div class="form-group">
                            <label for="username" class="font-weight-bold">Choose Profile</label>
                            <input type="file" class="form-control" id="userprofile" name="userprofile">
                          </div>
                          <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" value="save" class="btn btn-primary">Update Profile</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog"
                  aria-labelledby="passwordModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-3 shadow">
                      <div class="modal-header bg-primary text-white d-flex align-items-center">
                        <button type="button" class="close text-white mr-2" data-dismiss="modal" aria-label="Close"
                          style="opacity:1;">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title font-weight-bold mb-0" id="passwordModalLabel">
                          🔑 UPDATE PASSWORD
                        </h5>
                      </div>
                      <div class="modal-body">
                        <form id="updatePasswordForm" method="POST" action="">
                          <div class="form-group">
                            <label for="old_password" class="font-weight-bold">Old Password</label>
                            <div class="valid">
                              <input type="password" class="form-control" id="old_password" name="old_password"
                                placeholder="Enter old password" required>
                            </div>
                          </div>
                          <div class="form-group myacc_mar2">
                            <div class="row">
                              <div class="col-md-6 col-sm-12">
                                <label class="font-weight-bold">New Password</label>
                                <div class="valid">
                                  <input type="password" class="form-control my_acc_top" placeholder="New Password"
                                    id="password" name="password" required>
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-12 my_acc_top2">
                                <label class="font-weight-bold">Confirm Password</label>
                                <div class="valid">
                                  <input type="password" class="form-control my_acc_top" placeholder="Confirm Password"
                                    id="confirm_password" name="confirm_password" required>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" value="submit" id="update" name="update"
                              class="btn btn-primary">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group myacc_mar2">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="valid">
                        <input type="text" value="<?php echo $fetch['phone_no']?>" class="form-control my_acc_top"
                          placeholder="Phone No" id="phone" name="phone">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 my_acc_top2">
                      <div class="valid">
                        <input type="text" value="<?php echo $fetch['address']?>" class="form-control my_acc_top"
                          placeholder="Address" id="address" name="address">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group myacc_mar2 my_acc_top2">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="valid">
                        <input type="date" value="<?php echo $fetch['dob']?>" class="form-control my_acc_top" id="dob"
                          name="dob">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 my_acc_top2">
                      <div class="valid">
                        <select class="form-control my_acc_top" id="state" name="state"
                          onchange="get_city_by_state(this.value)">
                          <option value="">Select State</option>
                          <?php
                            $select = "SELECT * FROM state WHERE 1";
                            $run = mysqli_query($connect, $select);
                            while($fetch_state = mysqli_fetch_array($run))
                            {
                          ?>
                          <option value="<?php echo $fetch_state['id']?>" <?php
                            if($fetch_rec['state']==$fetch_state['id']){echo "selected" ;} ?>>
                            <?php echo $fetch_state['state_name']; ?>
                          </option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group myacc_mar2">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="valid">
                        <input type="text" value="<?php echo $fetch['zip_code']?>" class="form-control my_acc_top"
                          placeholder="Enter Zipcode" id="Zipcode" name="Zipcode">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 my_acc_top2">
                      <div class="valid">
                        <select class="form-control my_acc_top" id="city" name="city">
                          <option value="">Select City</option>
                          <?php
                            $city_query = mysqli_query($connect, "SELECT * FROM city");
                            while($fetch_city = mysqli_fetch_array($city_query))
                              {
                          ?>
                          <option value="<?php echo $fetch_city['id']?>" <?php
                            if($fetch_rec['city']==$fetch_city['id']){echo "selected" ;} ?>>
                            <?php echo $fetch_city['city_name']; ?>
                          </option>
                          <?php
                             } 
                         ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center acc_pag">
                  <button type="Submit" value="Submit" class="btn label-danger btn_padding" id="save"
                    name="save">Submit</button>
                  <button type="button" class="btn label-danger btn_padding">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--start important link section-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-md-12 col-xs-12 text_center1 nopadd video_sec1">
        <div class="col-md-3 col-sm-12 col-xs-12 text-center asddf clearfix">
          <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h5 class="qaxds">BURGATORY <img src="image/cropped-Logo-1.png" height="20"></h5>
            <p class="mar-le2">
              vienna a premium resturant wordpress
              theme develop by micro themes and
              design for resturant and bar owners.
            </p>
          </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 text-center asddf1 clearfix">
          <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h5 class="qaxds1">IMPORTANT LINKS</h5>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12 text-center pad11 mar-ico">
            <p><a class="dhhkd1 let_spce" href="index.php"><i class="fa fa-chevron-circle-right icon-padd1"
                  aria-hidden="true"></i>&nbsp HOME</a></p>
            <p><a class="dhhkd1 let_spce" href="about.php">
                <i class="fa fa-chevron-circle-right icon-padd1" aria-hidden="true"></i>&nbsp ABOUT</a></p>
            <p><a class="dhhkd1 let_spce" href="menus.php"><i class="fa fa-chevron-circle-right icon-padd1"
                  aria-hidden="true"></i>&nbsp MENU</a></p>
            <p><a class="dhhkd1 let_spce" href="gallary.php"><i class="fa fa-chevron-circle-right icon-padd1"
                  aria-hidden="true"></i>&nbsp GALLARY</a></p>
            <p><a class="dhhkd1 let_spce" href="reservation.php"><i class="fa fa-chevron-circle-right icon-padd1"
                  aria-hidden="true"></i>&nbsp RESERVATION</a></p>
            <p><a class="dhhkd1 let_spce" href="contact_us.php"><i class="fa fa-chevron-circle-right icon-padd1"
                  aria-hidden="true"></i>&nbsp CONTACT US</a></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 asddf1 clearfix">
          <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h5 class="qaxds1 qncbn">CONTACT US</h5>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 map_hight">
            <div id="" class="col-md-12 col-sm-12 col-xs-12 regs qbca">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14736.2936651799!2d88.42520676582065!3d22.57635731172786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0275b020703c0d%3A0xece6f8e0fc2e1613!2sSector+V%2C+Salt+Lake+City%2C+Kolkata%2C+West+Bengal!5e0!3m2!1sen!2sin!4v1524148893398"
                frameborder="0" style="border:0" allowfullscreen class="regs"></iframe>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12 text-center revk">
            <div class="col-md-12 col-sm-12 col-xs-12  pad_rem col_whi1 mar-ico">
              <p class="qbca">
                <i class="fa fa-address-book icon-padd" aria-hidden="true"></i>&nbsp 1234 Street Name
                City
              </p>
              <p class="qbca"><i class="fa fa-envelope icon-padd" aria-hidden="true"></i>&nbsp support@mobirise.com
              </p>
              <p class="qbca"><i class="fa fa-phone icon-padd" aria-hidden="true"></i>&nbsp +1 (0) 000 0000 001
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 text-center asddf1 clearfix">
          <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h5 class="qaxds1 qncbn">SOCIAL MEDIA</h5>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12 text-center social_padd mar-ico fsdddp">
            <a class="qbca" href="#"><img src="image/facebook.png" class="imgg_height"></a>
            <a href="#"><img src="image/google-plus.png" class="imgg_height"></a>
            <a href="#"><img src="image/twitter.png" class="imgg_height"></a>
            <a href="#"><img src="image/linkedin.png" class="imgg_height"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end important link section-->
  <!-- Footer -->
  <footer class="text-center footr">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
      <span class="glyphicon glyphicon-chevron-up rrr"></span>
    </a><br><br>
    <p>© Copyright 2018 - All Rights Reserved</p>
  </footer>
  <!--<script>
      $(document).ready(function(){
      // Initialize Tooltip
      $('[data-toggle="tooltip"]').tooltip(); 

      // Add smooth scrolling to all links in navbar + footer link
      $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
      scrollTop: $(hash).offset().top
      }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
      });
      } // End if
      });
      })
</script>-->

</body>

</html>