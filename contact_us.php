<?php
  include("config.php");
  if(isset($_POST['submit']))
  {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Subject = $_POST['sub'];
    $Enquire = $_POST['enq'];

    echo $add_enquiry = "INSERT INTO enquiry (name,email,subject,enquiry) VALUES('".$Name."','".$Email."','".$Subject."','".$Enquire."')";
    $run  =  mysqli_query($connect, $add_enquiry);
    $num   =  mysqli_num_rows($run);
    if($num_rows)
      {
        header('location: contact_us.php');
      }else
      {
        echo '<script>alert("Something Went Wrong")</script>';
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

         phone: {
            required: true,
            minlength: 10,
            maxlength: 10,
            digits: true
          },

          sub: "required",
          enq: "required"
        },
        messages: {

          name: {
            required: "Please enter your Last Name",
            minlength: "Your name must consist of at least 2 characters"
          },

          email: "Please enter a valid email address",

          phone: {
            required: "Please enter your Phone No",
            minlength: "Your Phone No must consist of at least 10 digits"
          },

          sub:
          {
            required: "please enter Subject"
          },

          enq:
          {
            required: "Please enter enquiry"
          }

        },

        errorElement: "em",
        errorPlacement: function (error, element) {
          error.addClass("help-block rev_left1");
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
          <li class="active"><a href="contact_us.php" class="asek out_line acc_col">CONTACT US</a></li>
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
              <li><a class="text-center order_weight" href="cart.php"><button type="button"
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
                Welcome <?php echo $fetch['name']; ?>
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
      <img src="image/41993-das-loft-sofitel-19to1.jpeg" class="pos_re">
      <div class="carousel-caption abt_margin">
        <h3 class="abt_width">CONTACT US</h3>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 map_heihgt1 u_map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14736.2936651799!2d88.42520676582065!3d22.57635731172786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0275b020703c0d%3A0xece6f8e0fc2e1613!2sSector+V%2C+Salt+Lake+City%2C+Kolkata%2C+West+Bengal!5e0!3m2!1sen!2sin!4v1524148893398"
          frameborder="0" style="border:0" allowfullscreen class="regs"></iframe>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-4 col-sm-12 col-xs-12 cap_mar">
          <h5 class="cont_add">ADDRESS</h5>
          <p class="pad_add">Balrampur, Gamharia</p>
          <p>Jamshedpur, Jharkhand</p>
          <p>832108</p>
          <p class="undr_line1"></p>
          <h5 class="cont_add1">TELEPHONES</h5>
          <p class="pad_add">Restaurant : 6566757677</p>
          <p> Fax : 7467658908</p>
          <p class="undr_line1"></p>
          <h5 class="cont_add1">LET’S STAY IN TOUCH</h5>
          <p class="pad_add">Lorem ipsum dotlor
            sit amet,consectetur
            adipiscing elit.
            Vivamus sit amet purus consectetur,rhoncus
            urna eget,semper sapien.Integer vehicula,
            dolor gravida lobortis consectetur,lorem
            elit mollis magna,vitae rutrum velit nulla
            id dui.Morbi eu mattis justo,vitae porta orci.</p>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
          <form class="form_pad" form data-toggle="validator" role="form" id="myform" method="POST" action="">
            <div class="form-group">
              <p class="p_marg">Your email address will be held strictly confidential. Required fields are marked *</p>
              <div class="valid">
                <input type="text" class="form-control width_c3" placeholder="Name *" name="name">
              </div>
            </div>
            <div class="form-group">
              <div class="valid">
                <input type="text" class="form-control width_c3" placeholder="Email *" name="email">
              </div>
            </div>
             <div class="form-group">
              <div class="valid">
                <input type="number" class="form-control width_c3" placeholder="Phone no *" name="phone">
              </div>
            </div>
            <div class="form-group">
              <div class="valid">
                <input type="text" class="form-control width_c3" placeholder="Subject *" name="sub">
              </div>
            </div>
            <div class="form-group">
              <div class="valid">
                <textarea class="form-control width_c4" placeholder="Inquiry *" name="enq"></textarea>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 pad_add1">
              <button type="Submit" name="submit" value="submit" class="btn btn-danger bt_style">SUBMIT INQUIRY</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

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
  
  <!-- Footer -->
  <footer class="text-center footr">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
      <span class="glyphicon glyphicon-chevron-up rrr"></span>
    </a><br><br>
    <p>© Copyright 2018 - All Rights Reserved</p>
  </footer>

</body>

</html>