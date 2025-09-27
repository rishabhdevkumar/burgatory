<?php
include("config.php");
$user_id = $_SESSION['user_id'];
$change_profile = "SELECT * FROM `user` WHERE id='".$user_id."'";
$run_profile = mysqli_query($connect,$change_profile);
$fetch_profile = mysqli_fetch_array($run_profile);

if(isset($_POST['save']))
{
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Password = md5($_POST['password']);
    $Conf_password = $_POST['confirm_password'];
    $Address = $_POST['address'];
    $Dob = $_POST['dob'];
    $Gender = $_POST['gender'];
    $State = $_POST['state'];
    $City = $_POST['city'];
    $code = $_POST['Zipcode'];

    if(!empty($_FILES['img']['name'])){
        $profile = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        move_uploaded_file($tmp_name, 'profile_image/'.$profile);
    } else {
        $profile = "my_profile.png";  
        copy("image/my_profile.png", "profile_image/".$profile);
    }

    $conf_email = "SELECT * FROM  user WHERE email = '".$Email."'";
    $run_email  =  mysqli_query($connect, $conf_email);
    $num_rows   =  mysqli_num_rows($run_email);

    if($num_rows){
        echo '<script>alert("This Email Already Exists")</script>';
    } else {
        $add = "INSERT INTO user(name,email,phone_no,password,address,dob,gender,state,city,zip_code,profile)
        VALUES('".$Name."','".$Email."','".$Phone."','".$Password."','".$Address."','".$Dob."','".$Gender."','".$State."','".$City."','".$code."','".$profile."')";
        
        $run = mysqli_query($connect ,$add);
        if($run){
            echo '<script>alert("Added Successfully")</script>';
        } else {
            echo '<script>alert("Something Went Wrong")</script>';
        }
    }
 }

// ------------- php code of authentication ----------------
  if(isset($_POST['save1']))
  {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = md5(mysqli_real_escape_string($connect, $_POST['password']));
    $authenticate = "SELECT * FROM user WHERE email = '".$email."' AND password = '".$password."'";
    $run_rec = mysqli_query($connect, $authenticate);
    $fetch = mysqli_fetch_array($run_rec);
    $num = mysqli_num_rows($run_rec);
    if($num>0)
    {
      $_SESSION['user_id'] = $fetch['id'];
      header('Location:index.php');
    }else{
      echo '<script>alert("something wrong")</script>';
    }

    $id = $_SESSION['user_id'];
    $select = "SELECT * FROM user WHERE id = '".$id."'";
    $run = mysqli_query($connect, $select);
    $fetch = mysqli_fetch_array($run);
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

      var validator = $("#myform1").validate({

        rules: {

          email: {
            required: true,
            email: true
          },

          email2: {
            required: true,
            email: true
          },

          password: {
            required: true,
            minlength: 5
          }
        },

        messages: {

          email: "Please enter a valid email address",
          email2: "Please enter a valid email address",

          password: {
            required: "Please provide  password",
            minlength: "Your password must be at least 5 characters long"
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

        highlight: function (element, errorClass, validClass) {
          $(element).parents(".valid").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).parents(".valid").addClass("has-success").removeClass("has-error");
        }
      });

      var validator = $("#myform2").validate({


        rules: {

          email2: {
            required: true,
            email: true
          }
        },

        messages: {
          email2: "Please enter a valid email address"
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

        highlight: function (element, errorClass, validClass) {
          $(element).parents(".valid").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).parents(".valid").addClass("has-success").removeClass("has-error");
        }
      });


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
          phone: {
            required: true,
            minlength: 10
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
          address: "required",
          dob: "required",
          gen: "required",
          State: "required",
          City: "required",
          agree: "required",
          Zipcode: "required"
        },
        messages: {
          name: {
            required: "Please enter your name",
            minlength: "Your name must consist of at least 2 characters"
          },

          email: "Please enter a valid email address",

          phone: {
            required: "Please enter your Phone No",
            minlength: "Your Phone No must consist of at least 10 digits"
          },

          password: {
            required: "Please provide  password",
            minlength: "Your password must be at least 5 characters long"
          },
          confirm_password: {
            required: "Please provide confirm password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
          },
          address:
          {
            required: "please enter address"
          },
          dob:
          {
            required: "please choose date of birth"
          },
          sel1:
          {
            required: "Please select Gender"
          },
          state:
          {
            required: "Please select State"
          },
          city:
          {
            required: "Please select City"
          },
          Zipcode: "please enter Zipcode"
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

        highlight: function (element, errorClass, validClass) {
          $(element).parents(".valid").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).parents(".valid").addClass("has-success").removeClass("has-error");
        }

      });
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
              <p style="margin: 0px 0px 5px 21px; color: purple">
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
      <img src="image/2.jpg" class="pos_re">
      <div class="carousel-caption abt_margin">
        <h3 class="abt_width">LOGIN AND REGISTER</h3>
      </div>
    </div>
  </div>
  <!--start login section-->
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 map_heihgt4">
        <div class="col-md-6 col-sm-12 col-xs-12 ">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h4 class="text_c1 regis_font">Login</h4>
            </div>
            <form data-toggle="validator" role="form" id="myform1" method="POST" action="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group log_padding">
                  <label for="name" class="">Email-id</label>
                  <div class="valid">
                    <input type="text" class="form-control input_height4" placeholder="Enter Email" id="email1"
                      name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="">Password</label>
                  <div class="valid">
                    <input type="password" class="form-control input_height4" placeholder="Enter Password"
                      id="password1" name="password">
                  </div>
                </div>
                <div class="form-group width_c2">
                  <label><input type="checkbox">&nbsp <h5 class="remb_mar">Rmember me</h5></label>
                </div>
                <div class="form-group">
                  <label for="forget" class="log_padding1" data-toggle="modal" data-target="#myModal">
                    <button style="border: none; background: #fff">Forgot
                      Password?</button></label>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center log_mkh">
                  <button type="Submit" value="Submit" class="btn label-danger btn_padding" id="save1"
                    name="save1">LOGIN</button>
                </div>
              </div>
            </form>
            <!-- Forgot Password Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-3 shadow">
                  <div class="modal-header bg-primary text-white d-flex align-items-center">
                    <button type="button" class="close text-white mr-2" data-dismiss="modal" aria-label="Close"
                      style="opacity:1;">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title font-weight-bold mb-0" id="forgotPasswordLabel">
                      🔑 FORGOT PASSWORD
                    </h5>
                  </div>
                  <div class="modal-body">
                    <form data-toggle="validator" role="form" id="myform1" method="POST" action="">
                      <div class="form-group">
                        <label for="email" class="font-weight-bold">Enter your Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                          required>
                      </div>
                      <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--start register section-->
        <div class="col-md-6 col-sm-12 col-xs-12 regis_mar">
          <div class="col-md-12 col-sm-12  col-xs-12 border_st">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h4 class="text_c1 regis_font">Register</h4>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <form data-toggle="validator" role="form" id="myform" method="POST" action=""
                enctype="multipart/form-data">
                <div class="form-group log_padding">
                  <label for="name" class="">Name</label>
                  <div class="valid">
                    <input type="text" class="form-control input_height4" placeholder="Enter Name" id="name"
                      name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="">Email</label>
                  <div class="valid">
                    <input type="text" class="form-control input_height4" placeholder="Enter Email" id="email"
                      name=email>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone" class="">Phone No</label>
                  <div class="valid">
                    <input type="text" class="form-control input_height4" placeholder="Enter Phone no" id="phone"
                      name="phone">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="">Password</label>
                  <div class="valid">
                    <input type="password" class="form-control input_height4" placeholder="Enter Password" id="password"
                      name="password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="confirm_password" class="">Confirm Password</label>
                  <div class="valid">
                    <input type="password" class="form-control input_height4" placeholder="Enter confirm Password"
                      id="confirm_password" name="confirm_password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Address" class="">Address</label>
                  <div class="valid">
                    <textarea class="form-control add_heigght" placeholder="Enter Address" id="address"
                      name="address"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="sel1" class="">DOB</label>
                  <div class="valid">
                    <input type="date" class="form-control input_height4" placeholder="Enter date" id="dob" name="dob">
                  </div>
                </div>
                <div class="form-group">
                  <label for="sel1">Gender</label>
                  <div class="valid">
                    <select class="form-control input_height4" id="sel1" name="gender">
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="sel1">State</label>
                  <div class="valid">
                    <select class="form-control input_height4" id="state" name="state"
                      onchange="get_city_by_state(this.value)">
                      <option value="">--Select State--</option>
                      <?php
                        $select_state = "SELECT * FROM state WHERE 1";
                        $run_state = mysqli_query($connect, $select_state);
                        while($fetch_state = mysqli_fetch_array($run_state))
                        {
                      ?>
                      <option value="<?php echo $fetch_state['id']?>">
                        <?php echo $fetch_state['state_name']?>
                      </option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="sel2">City</label>
                  <div class="valid">
                    <select class="form-control input_height4" id="city" name="city">
                      <option value="">Select City</option>
                    </select>
                  </div>
                </div>
                <div class="form-group zip_mar">
                  <label for="Zipcode" class="">Zipcode</label>
                  <div class="valid">
                    <input type="text" class="form-control input_height4" placeholder="Enter Zipcode" id="Zipcode"
                      name="Zipcode">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center log_mkh">
                  <button type="Submit" value="Submit" class="btn label-danger btn_padding" id="save"
                    name="save">REGISTER</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--end register section-->
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