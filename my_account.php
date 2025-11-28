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
  $profile =  "SELECT * FROM user WHERE id = '".$id."'";
  $run = mysqli_query($connect,$profile);
  $fetch_image = mysqli_fetch_array($run);

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
  <!-- <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> -->
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
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).parents(".valid").addClass("has-success").removeClass("has-error");
        }
      });

    });

    // document.addEventListener("DOMContentLoaded", function () {
    //   document.getElementById('editPasswordbutton').addEventListener('click', function (e) {
    //     e.preventDefault();
    //     document.getElementById('password').removeAttribute('disabled');
    //     document.getElementById('confirm_password').removeAttribute('disabled');
    //     document.getElementById('password').focus();
    //   });
    // });

    // document.getElementById('editPasswordbutton').addEventListener('click', function (e) {
    //   e.preventDefault();
    //   document.getElementById('password').removeAttribute('disabled');
    //   document.getElementById('confirm_password').removeAttribute('disabled');
    //   document.getElementById('password').focus();
    // });

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
  <nav class="navbar navbar-default navbar-fixed-top ggg">
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
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-11 col-sm-12 col-xs-12">
        <div class="col-md-11 col-sm-12 col-xs-12 pull-right">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
              <div class="col-md-4 col-sm-4 col-xs-4 text-start">
                <img src="profile_image/<?php echo $fetch_image['profile']?>" class="rounded-circle" alt="Profile"
                  width="60" height="60">
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4 myacc_mar1">
                <h4 class="text_c1 regis_font text-center">MY ACCOUNT</h4>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4 text-end">
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle user_mar_font toggle_radius cart_ic_font acc_col"
                      data-toggle="dropdown" style="margin-right: -2px">
                      <span class="mail">
                        <?php echo $fetch['name'];?>
                      </span>
                      <i class="fa fa-caret-down" style="color: black;"></i>
                    </a>
                    <ul class="dropdown-menu toggle_radius drop_back1">
                      <li>
                        <a href="edit_profile.php?profile_id=<?php echo base64_encode($id)?>" class="drop_back"
                          id="editProfilebutton">
                          <img src="../burgatory/image/edit.png" alt="icon" width="15px" height="15px"> Change Profile
                        </a>
                      </li>
                      <li>
                        <a href="edit_profile.php"></a>
                      </li>
                      <li>
                        <a href="#" id="editPasswordbutton" class="drop_back" data-toggle="modal"
                          data-target="#passwordModal">
                          <img src="../burgatory/image/padlock.png" alt="icon" width="15px" height="15px"> Edit Password
                        </a>
                      </li>
                      <li>
                        <a href="logout.php" class="drop_back">
                          <img src="../burgatory/image/logout.png" alt="icon" width="15px" height="15px"> Logout
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
                        <div id="updatePasswordForm">
                          <div class="form-group">
                            <label class="font-weight-bold">Old Password</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" required>
                          </div>
                          <div class="form-group myacc_mar2">
                            <div class="row">
                              <div class="col-md-6 col-sm-12">
                                <label class="font-weight-bold">New Password</label>
                                <input type="password" class="form-control my_acc_top" id="password" name="password"
                                  required>
                              </div>
                              <div class="col-md-6 col-sm-12 my_acc_top2">
                                <label class="font-weight-bold">Confirm Password</label>
                                <input type="password" class="form-control my_acc_top" id="confirm_password"
                                  name="confirm_password" required>
                              </div>
                            </div>
                          </div>
                          <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="update" id="update" class="btn btn-primary">Save</button>
                          </div>
                        </div>
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
  <?php
    include("footer.php"); 
  ?>

</body>

</html>