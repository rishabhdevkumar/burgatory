<?php
  include("config.php");
  session_start();  
  if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
  {
    header("Location: index.php");
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

    $.validator.setDefaults({
      submitHandler: function () {
        alert("submitted!");
      }
    });

    $(document).ready(function () {


      $('#check').click(function () {


        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var dob = $('#dob').val();
        var gen = $('#gen').val();
        var State = $('#State').val();
        var City = $('#City').val();
        var Zipcode = $('#Zipcode').val();

        if ($('#check').prop('checked') == true) {
          $('#name1').val(name);
          $('#email1').val(email);
          $('#phone1').val(phone);
          $('#address1').val(address);
          $('#dob1').val(dob);
          $('#gen1').val(gen);
          $('#State1').val(State);
          $('#City1').val(City);
          $('#Zipcode1').val(Zipcode);
        }
        else {
          $('#name1').val('');
          $('#email1').val('');
          $('#phone1').val('');
          $('#address1').val('');
          $('#dob1').val('');
          $('#gen1').val('');
          $('#State1').val('');
          $('#City1').val('');
          $('#Zipcode1').val('');
        }

      });

      $('#name1').keyup(function () {
        if ($('#name').val() != $('#name1').val()) {
          $('#check').prop('checked', false)
        }
        else {
          $('#check').prop('checked', true)
        }
      });

      $('#email1').keyup(function () {
        if ($('#email').val() != $('#email1').val()) {
          $('#check').prop('checked', false)
        }
        else {
          $('#check').prop('checked', true)
        }
      });

      $('#phone1').keyup(function () {
        if ($('#phone').val() != $('#phone1').val()) {
          $('#check').prop('checked', false)
        }
        else {
          $('#check').prop('checked', true)
        }
      });

      $('#address1').keyup(function () {
        if ($('#address').val() != $('#address1').val()) {
          $('#check').prop('checked', false)
        }
        else {
          $('#check').prop('checked', true)
        }
      });

      $('#dob1').change(function () {
        if ($('#dob').val() != $('#dob1').val()) {
          $('#check').prop('checked', false)
        }
        else {
          $('#check').prop('checked', true)
        }
      });

      $('#gen1').change(function () {
        if ($('#gen').val() != $('#gen1').val()) {
          $('#check').prop('checked', false)
        }
        else {
          $('#check').prop('checked', true)
        }
      });


      $('#State1').change(function () {
        if ($('#State').val() != $('#State1').val()) {
          $('#check').prop('checked', false)
        }
        else {
          $('#check').prop('checked', true)
        }
      });


      $('#City1').change(function () {
        if ($('#City').val() != $('#City1').val()) {
          $('#check').prop('checked', false)
        }
        else {
          $('#check').prop('checked', true)
        }
      });


      $('#Zipcode1').keyup(function () {
        if ($('#Zipcode').val() != $('#Zipcode1').val()) {
          $('#check').prop('checked', false)
        }
        else {
          $('#check').prop('checked', true)
        }
      });

      var validator = $("#myform").validate({

        rules: {

          name: {
            required: true,
            minlength: 2
          },
          name1: {
            required: true,
            minlength: 2
          },

          email: {
            required: true,
            email: true
          },
          email1: {
            required: true,
            email: true
          },
          phone: {
            required: true,
            minlength: 10
          },
          phone1: {
            required: true,
            minlength: 10
          },
          address: "required",
          dob: "required",
          gen: "required",
          State: "required",
          City: "required",
          Zipcode: "required",

          address1: "required",
          dob1: "required",
          gen1: "required",
          State1: "required",
          City1: "required",
          Zipcode1: "required"
        },
        messages: {
          name: {
            required: "Please enter your name",
            minlength: "Your name must consist of at least 2 characters"
          },
          name1: {
            required: "Please enter your name",
            minlength: "Your name must consist of at least 2 characters"
          },

          email: "Please enter a valid email address",
          email1: "Please enter a valid email address",

          phone: {
            required: "Please enter your Phone No",
            minlength: "Your Phone No must consist of at least 10 digits"
          },
          phone1: {
            required: "Please enter your Phone No",
            minlength: "Your Phone No must consist of at least 10 digits"
          },
          address:
          {
            required: "please enter address"
          },
          address1:
          {
            required: "please enter address"
          },
          dob:
          {
            required: "please choose date of birth"
          },
          dob1:
          {
            required: "please choose date of birth"
          },
          gen:
          {
            required: "Please select Gender"
          },
          gen1:
          {
            required: "Please select Gender"
          },
          State:
          {
            required: "Please select State"
          },
          State1:
          {
            required: "Please select State"
          },
          City:
          {
            required: "Please select City"
          },
          City1:
          {
            required: "Please select City"
          },
          Zipcode: "please enter Zipcode",
          Zipcode1: "please enter Zipcode"
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
      <img src="image/parpr-restaurant-0039-hor-feat.jpg" class="pos_re">
      <div class="carousel-caption abt_marparpr-restaurant-0039-hor-featgin">
        <h3 class="abt_width cart_font">ORDER NOW</h3>
      </div>
    </div>
  </div>

  <div class="container">
    <!--start order section-->
    <div class="table-responsive">
      <table class="table table-striped table-hover border_st">
        <thead>
          <tr class="">
            <th colspan="4">
              <h5 class="cart_total">YOUR ORDER</h5>
            </th>
          </tr>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Woo Single #4</td>
            <td>$13.00</td>
            <td><input type="number" name="qty" value="1" class="cart_input">
            <td>$13.00</td>
          </tr>
          <tr>
            <th colspan="4">Subtotal</th>
          </tr>
          <tr>
            <th colspan="4">Total</th>
          </tr>
        </tbody>
      </table>
    </div>

    <!--start billing and shipping section-->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <form data-toggle="validator" role="form" id="myform">
        <!--start billing section-->
        <div class="col-md-6 col-sm-12 col-xs-12 regis_mar">
          <div class="col-md-12 col-sm-12  col-xs-12 border_st">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h4 class="regis_font">Billing details</h4>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="form-group log_padding2">
                <label for="name" class="">Name</label>
                <div class="valid">
                  <input type="text" class="form-control input_height4" placeholder="Enter Name" id="name" name="name">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="">Email</label>
                <div class="valid">
                  <input type="text" class="form-control input_height4" placeholder="Enter Email" id="email"
                    name="email">
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
                <label for="Address" class="">Address</label>
                <div class="valid">
                  <input type="text" class="form-control input_height4" placeholder="Enter Address" id="address"
                    name="address">
                </div>
              </div>
              <div class="form-group">
                <label for="sel1" class="">DOB</label>
                <div class="valid">
                  <input type="date" class="form-control input_height4" placeholder="Enter date of birth" id="dob"
                    name="dob">
                </div>
              </div>
              <!-- <div class="form-group">
                            <label for="sel1" class="">Gender</label>
                        </div> 
                        <<div class="form-group radio_top">
                             <label class="radio-inline"><input type="radio" name="optradio" class="radio_top1" id="Male">Male</label>
                              <label class="radio-inline"><input type="radio" name="optradio" class="radio_top1" id="Female">Female</label>
                        </div>  -->

              <div class="form-group">
                <label for="sel1">Gender</label>
                <div class="valid">
                  <select class="form-control input_height4" name="gen" id="gen">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>

              </div>
              <div class="form-group">
                <label for="sel1">State</label>
                <div class="valid">
                  <select class="form-control input_height4" name="State" id="State">
                    <option value="">Select State</option>
                    <option value="jharkhand">jharkhand</option>
                    <option value="westbengal">westbengal</option>
                    <option value="odisha">odisha</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="sel2">City</label>
                <div class="valid">
                  <select class="form-control input_height4" name="City" id="City">
                    <option value="">Select City</option>
                    <option value="jamshedpur">jamshedpur</option>
                    <option value="kolkata">kolkata</option>
                    <option value="cuttack">cuttack</option>
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

            </div>
          </div>
        </div>
        <!--End billing section-->
        <!--start shipping section-->
        <div class="col-md-6 col-sm-12 col-xs-12 regis_mar">
          <div class="col-md-12 col-sm-12  col-xs-12 border_st">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h5 class="regis_font">Shipping details</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <label><input type="checkbox" id="check" onclick="sd1()">&nbsp <h5 class="remb_mar">Same as Billing
                    Address</h5></label>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 shipp_marg">
              <div class="form-group log_padding">
                <label for="name" class="">Name</label>
                <div class="valid">
                  <input type="text" class="form-control input_height4" placeholder="Enter Name" name="name1"
                    id="name1">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="">Email</label>
                <div class="valid">
                  <input type="text" class="form-control input_height4" placeholder="Enter Email" name="email1"
                    id="email1">
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="">Phone No</label>
                <div class="valid">
                  <input type="text" class="form-control input_height4" placeholder="Enter Phone no" name="phone1"
                    id="phone1">
                </div>
              </div>
              <div class="form-group">
                <label for="Address" class="">Address</label>
                <div class="valid">
                  <input type="text" class="form-control input_height4" placeholder="Enter Address" id="address1"
                    name="address1">
                </div>
              </div>
              <div class="form-group">
                <label for="sel1" class="">DOB</label>
                <div class="valid">
                  <input type="date" class="form-control input_height4" placeholder="Enter date" name="dob1" id="dob1">
                </div>
              </div>
              <!-- <div class="form-group">
                            <label for="sel1" class="">Gender</label>
                        </div> 
                      <div class="form-group radio_top">
                             <label class="radio-inline"><input type="radio" name="optradio" class="radio_top1">Male</label>
                              <label class="radio-inline"><input type="radio" name="optradio" class="radio_top1">Female</label>
                        </div>  -->


              <div class="form-group">
                <label for="sel1">Gender</label>
                <div class="valid">
                  <select class="form-control input_height4" id="gen1" name="gen1">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="sel1">State</label>
                <div class="valid">
                  <select class="form-control input_height4" name="State1" id="State1">
                    <option value="">Select State</option>
                    <option value="jharkhand">jharkhand</option>
                    <option value="westbengal">westbengal</option>
                    <option value="odisha">odisha</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="sel2">City</label>
                <div class="valid">
                  <select class="form-control input_height4" name="City1" id="City1">
                    <option value="">Select City</option>
                    <option value="jamshedpur">jamshedpur</option>
                    <option value="kolkata">kolkata</option>
                    <option value="cuttack">cuttack</option>
                  </select>
                </div>
              </div>
              <div class="form-group zip_mar">
                <label for="Zipcode" class="">Zipcode</label>
                <div class="valid">
                  <input type="text" class="form-control input_height4" placeholder="Enter Zipcode" name="Zipcode1"
                    id="Zipcode1">
                </div>
              </div>

            </div>
          </div>
        </div>
        <!--End shipping section-->
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st text-center pad_rem border_topp">
            <a href="thank_you.php"> <button type="Submit" value="Submit"
                class="btn btn-danger cart_btn cart_pad btn_color" id="save">PROCEED TO CHECKOUT</button></a>
          </div>
        </div>
      </form>
    </div>
    <!--End billing and shipping section-->
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