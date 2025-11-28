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
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
 <?php $nav = "home";
    include("header.php"); 
  ?>
  <div class="container-fluid">
    <div class="row imagd-height">
      <img src="image/Samudra Restaurant Mayfair Waves.jpg" class="pos_re">
      <div class="carousel-caption abt_margin">
        <h3 class="abt_width">MY ORDER</h3>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="table-responsive">
        <div class="col-md-12 col-sm-12 col-xs-12 border_st order_back ">
          <h2 class="cart_total2 text-center">MY ORDER</h2>
        </div>
        <table class="table table-striped table-hover border_st table_margin">
          <thead>
            <tr>
              <th class="my_order_back">Order Number</th>
              <th class="my_order_back">Order Date</th>
              <th class="my_order_back">Total Price</th>
              <th class="my_order_back">Payment Type</th>
              <th class="my_order_back">Order At</th>
              <th class="my_order_back">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
            <tr>
              <td class="my_order_back1">11211</td>
              <td class="my_order_back1">05-04-2007</td>
              <td class="my_order_back1">$1211</td>
              <td class="my_order_back1">debit card</td>
              <td class="my_order_back1">dqwdwq</td>
              <td class="my_order_back1">dwdwddg</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
    include("footer.php"); 
  ?>

</body>

</html>