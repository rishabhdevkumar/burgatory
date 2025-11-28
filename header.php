<?php
  include("config.php");  

  $id = $_SESSION['user_id'];
  $select = "SELECT * FROM user WHERE id = '".$id."'";
  $run = mysqli_query($connect, $select);
  $fetch = mysqli_fetch_array($run);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OneBite</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script> 
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>

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
        <li class="<?php echo ($nav=='home') ? 'active' : ''; ?>">
          <a href="index.php" class="asek out_line acc_col">HOME</a>
        </li>
        <li class="<?php echo ($nav=='about') ? 'active' : ''; ?>">
          <a href="about.php" class="asek out_line acc_col">ABOUT</a>
        </li>
        <li class="<?php echo ($nav=='menu') ? 'active' : ''; ?>">
          <a href="menus.php" class="asek out_line acc_col">MENU</a>
        </li>
        <li class="<?php echo ($nav=='gallery') ? 'active' : ''; ?>">
          <a href="gallary.php" class="asek out_line acc_col">GALLARY</a>
        </li>
        <li class="<?php echo ($nav=='rev') ? 'active' : ''; ?>">
          <a href="reservation.php" class="asek out_line acc_col">RESERVATION</a>
        </li>
        <li class="<?php echo ($nav=='contact') ? 'active' : ''; ?>">
          <a href="contact_us.php" class="asek out_line acc_col">CONTACT US</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle toggle_radius cart_ic_font acc_col" data-toggle="dropdown" role="button"
            aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> 7<span
              class="caret"></span></a>
          <ul class="dropdown-menu dropdown-cart toggle_radius drop_back1" role="menu">
            <li>
              <span class="item">
                <span class="item-left">
                  <img src="" alt="" />
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
                  <img src="" alt="" />
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
                  <img src="" alt="" />
                  <span class="item-info">
                    <span>Item name</span>
                    <span>$23</span>
                  </span>
                </span>
                <span class="item-right">
                  <button class="btn btn-xs cap_mar1"><img src="image/pencil.png" alt=""></button><button
                    class="btn btn-xs btn-danger pull-right">x</button>
                </span>
              </span>
            </li>
            <li>
              <span class="item">
                <span class="item-left">
                  <img src="" alt="" />
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
          <a class="dropdown-toggle user_mar_font toggle_radius cart_ic_font acc_col" data-toggle="dropdown" href="#">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu toggle_radius drop_back1">
            <?php 
              if(isset($_SESSION['user_id'])) {
                $id = $_SESSION['user_id'];
                $select = "SELECT * FROM user WHERE id='$id'";
                $run = mysqli_query($connect, $select);
                $fetch = mysqli_fetch_array($run);
            ?>
            <li class="text-center" style="color: purple; padding: 5px 10px;">
              Welcome
              <?php echo $fetch['name']; ?>
            </li>
            <li><a href="my_account.php" class="drop_back">My Account</a></li>
            <li><a href="my_order.php" class="drop_back">My Order</a></li>
            <li><a href="logout.php" class="drop_back">Logout</a></li>
            <?php } else { ?>
            <li><a href="login.php" class="drop_back">Login/Register</a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

</html>