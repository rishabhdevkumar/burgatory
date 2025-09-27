<?php
  include("config.php");
  $id = $_SESSION['category_id'];
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
  <nav class="navbar navbar-default navbar-fixed-top ggg">
    <div class="container-fluid jjj">
      <div class="navbar-header ddd">
        <button type="button" class="navbar-toggle nnn" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand mmm1 out_line acc_col" href="index.html">BURGATORY<img src="image/burger.png" width="60"
            height="60" class="ttt"></a>
      </div>
      <div class="collapse navbar-collapse mmm askjd" id="myNavbar">
        <ul class="nav navbar-nav navbar-right iii">
          <li class="active"><a href="index.php" class="asek out_line acc_col">HOME</a></li>
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
            <a class="dropdown-toggle user_mar_font toggle_radius cart_ic_font acc_col" data-toggle="dropdown" href="#">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span class="caret"></span>
            </a>
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

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active htt">
        <img src="image/pasta-puttanesca-horiz-c-1800.jpg" alt="">
        <div class="carousel-caption">
          <h3 class="abt_width1">WELCOME TO BURGATORY</h3>
          <button type="button" class="btn btn-danger btn-md dfa kjai">VIEW OUR MENUS</button>
        </div>
      </div>
      <div class="item htt">
        <img src="image/1515456591895.jpg" alt="">
        <div class="carousel-caption">
          <h3 class="abt_width1">WELCOME TO BURGATORY</h3>
          <button type="button" class="btn btn-danger btn-md dfa kjai">VIEW OUR MENUS</button>
        </div>
      </div>
      <div class="item htt">
        <img src="image/pexels-pixabay-461382.jpg" alt="">
        <div class="carousel-caption">
          <h3 class="abt_width1">WELCOME TO BURGATORY</h3>
          <button type="button" class="btn btn-danger btn-md dfa kjai">VIEW OUR MENUS</button>
        </div>
      </div>
      <div class="item htt">
        <img src="image/pexels-snappr-27365296.jpg" alt="">
        <div class="carousel-caption">
          <h3 class="abt_width1">WELCOME TO BURGATORY</h3>
          <button type="button" class="btn btn-danger btn-md dfa kjai">VIEW OUR MENUS</button>
        </div>
      </div>
      <div class="item htt">
        <img src="image/davide-cantelli-jpkfc5_d-DI-unsplash.jpg" alt="">
        <div class="carousel-caption">
          <h3 class="abt_width1">WELCOME TO BURGATORY</h3>
          <button type="button" class="btn btn-danger btn-md dfa kjai">VIEW OUR MENUS</button>
        </div>
      </div>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control acb" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <?php
          $get_menus = "SELECT * FROM `menu` WHERE status = 'y' LIMIT 1";
          $run_menus = mysqli_query($connect, $get_menus);
          if($menu = mysqli_fetch_array($run_menus)) { 
        ?>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st pad_rem">
            <div class="col-12 col-sm-12 col-xs-12 fix_height pad_rem opb1">
              <img src="admin/menu_img/<?php echo $menu['menu_image']; ?>" class="img-thumbnail jsd pad_remv"
                alt="<?php echo $menu['name']; ?>">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 opo">
              <p class="pob">
                <?php echo $menu['menu_title']; ?>
              </p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 cbc">
              <h6>
                <?php echo $menu['menu_description']; ?>
              </h6>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 www">
    <a href="menus.php?category_id=<?php echo base64_encode($id)?>">
        <button type="button" class="btn btn-danger btn-md dfa">VIEW MORE</button>
    </a>
</div>

          </div>
        </div>
        <?php
          }
        ?>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st pad_rem">
            <div class="col-md-12 col-sm-12 col-xs-12 fan fix_height pad_rem opb1">
              <img src="image/img6.jpg" class="img-thumbnail jsd pad_remv" alt="Cinque Terre">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 opo">
              <p class="pob">WE SERVE AUTHENTIC CUISINE</p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 cbc">
              <h6>Come and enjoy the good test and hospitality in burgatory </h6>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 www">
              <a href="menus.html"> <button type="button" class="btn btn-danger btn-md dfa">VIEW MORE</button></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st pad_rem">
            <div class="col-md-12 col-sm-12 col-xs-12 fan fix_height pad_rem opb1">
              <img src="image/180f85abcf234aa09fad878c04d286e3.jpg" class="img-thumbnail jsd pad_remv"
                alt="Cinque Terre">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 opo">
              <p class="pob">SAY HELLO TO BURGATORY</p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 cbc">
              <h6>Come and enjoy the good test and hospitality in burgatory </h6>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 www">
              <a href="menus.html"> <button type="button" class="btn btn-danger btn-md dfa">VIEW MORE</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end section element-->
  <!--start daily section-->
  <div class="container mhj">
    <div class="row jhg trd" id="ty">
      <div class="col-md-12 col-sm-12 col-xs-12 gfo">
        <h3 class="atar">Daily Specials</h3>
        <p class="uuu">Featuring the best dishes from our menu</p>
      </div>
    </div>
  </div>
  <div class="container mhj">
    <div class="row dgtk">
      <div class="col-md-12 col-sm-12 col-xs-12 gfo1">
        <p class="asa">FEATURED</p>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st pad_rem">
            <div class="col-md-12 col-sm-12 col-xs-12 cbc item1 fix_height pad_rem opb1">
              <span class="notify-badge"><i class="fa fa-inr jhdqa" aria-hidden="true"></i>199</span>
              <img src="image/1515456591895.jpg" class="img-thumbnail jsd pad_remv" alt="Cinque Terre">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 ma">
              <h5 class="text_c margin_t">SDFDSF</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <p class="marg_left">
                It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout.
              </p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h5 class="marg_left text_c">Read More &#8594;</h5>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st pad_rem">
            <div class="col-md-12 col-sm-12 col-xs-12 cbc item1 fix_height pad_rem opb1">
              <span class="notify-badge"><i class="fa fa-inr jhdqa" aria-hidden="true"></i>499</span>
              <img src="./image/chinese/manchurian-625_625x350_81441392055.jpg" class="img-thumbnail jsd pad_remv"
                alt="Cinque Terre">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 ma">
              <h5 class="text_c margin_t">SDFDSF</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <p class="marg_left">
                It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout.
              </p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h5 class="marg_left text_c">Read More &#8594;</h5>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st pad_rem">
            <div class="col-md-12 col-sm-12 col-xs-12 cbc item1 fix_height pad_rem opb1">
              <span class="notify-badge"><i class="fa fa-inr jhdqa" aria-hidden="true"></i>299</span>
              <img src="image/img2.jpg" class="img-thumbnail jsd pad_remv" alt="Cinque Terre">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 ma">
              <h5 class="text_c margin_t">SDFDSF</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <p class="marg_left">
                It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout.
              </p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h5 class="marg_left text_c">Read More &#8594;</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!--end daily section-->
  <!--start video section-->
  <div class="container-fluid text-center">
    <div class="row text-center">
      <div class="col-md-12 col-md-12 col-xs-12 text_center nopadd video_sec">
        <div class="col-md-6 col-sm-12 col-xs-12 pull-left">
          <div class="col-md-12 col-sm-12 col-xs-12 ">
            <h5 class="paddtop font_size">Italian Chef Taste Test</h5>
            <p class="text_adj">
              One of our favorite things to do is taken a person with an exceptional plate and make them eat or drink
              with us plebes actually buy day-to-day.
              We do it for two reasons.First,we like to torture people.Two,it helps us khow which product to buy the
              next time we're at the grocery store.so to find the best tomato sauce at supermarket we want to acclaimed
              italian chef steve samson.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 text-center ">
          <div class="col-md-12 col-sm-12 col-xs-12 text-center pad_rem">
            <iframe src="https://www.youtube.com/embed/sWisuBtbypE" frameborder="0" allow="autoplay; encrypted-media"
              allowfullscreen class="marg_tp video_wid"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end video section-->
  <!--stat popular section-->
  <div class="container ">
    <div class="row jhg trd1" id="ty">
      <div class="col-md-12 col-sm-12 col-xs-12 gfo3">
        <h3 class="atar1">POPULAR MENU</h3>
        <p class="uuu">Come and Test our speceial dishes</p>
      </div>
    </div>
  </div>
  <div class="container pdd_mar">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 gfo1">
        <p class="asa">POPULAR MENU</p>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st pad_rem">
            <div class="col-md-12 col-sm-12 col-xs-12 cbc item1 fix_height pad_rem opb1">
              <span class="notify-badge">NEW</span>
              <img src="image/image.jpeg" class="img-thumbnail jsd pad_remv" alt="Cinque Terre">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
              <h5 class="dhhkd margin_t1">FRIED CHICKEN</h5>
              <p class="undr_line"></p>
              <h5 class="marg_left3 text_c font_w"><i class="fa fa-inr jhdqa" aria-hidden="true"></i>259</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center marg-t">
              <p class="marg_left">
                It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout
              </p>
              <p class="undr_line"></p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center marg-t">
              <button type="button" class="btn btn-danger bt_style">ADD TO CART</button>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st pad_rem">
            <div class="col-md-12 col-sm-12 col-xs-12 cbc item1 fix_height pad_rem opb1">
              <span class="notify-badge">NEW</span>
              <img src="image/pasta-puttanesca-horiz-c-1800.jpg" class="img-thumbnail jsd pad_remv"
                class="img-thumbnail jsd pad_remv" alt="Cinque Terre">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
              <h5 class="dhhkd margin_t1">CLASSIC ITALIAN PASTA</h5>
              <p class="undr_line"></p>
              <h5 class="marg_left3 text_c font_w"><i class="fa fa-inr jhdqa" aria-hidden="true"></i>200</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center marg-t">
              <p class="marg_left">
                It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout
              </p>
              <p class="undr_line"></p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center marg-t">
              <button type="button" class="btn btn-danger bt_style">ADD TO CART</button>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 border_st pad_rem">
            <div class="col-md-12 col-sm-12 col-xs-12 cbc item1 fix_height pad_rem opb1">
              <span class="notify-badge">NEW</span>
              <img src="image/pizza--575x323.jpg" class="img-thumbnail jsd pad_remv" class="img-thumbnail jsd pad_remv"
                alt="Cinque Terre">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
              <h5 class="dhhkd margin_t1">PENN PIZZA</h5>
              <p class="undr_line"></p>
              <h5 class="marg_left3 text_c font_w"><i class="fa fa-inr jhdqa" aria-hidden="true"></i>299</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center marg-t">
              <p class="marg_left">
                It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout
              </p>
              <p class="undr_line"></p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center marg-t">
              <button type="button" class="btn btn-danger bt_style">ADD TO CART</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end popular section-->
  <!--start latest news section-->
  <div class="container ">
    <div class="row jhg trd2" id="ty">
      <div class="col-md-12 col-sm-12 col-xs-12 gfo3">
        <h3 class="atar1">Latest News</h3>
        <p class="uuu">Bringing you the latest in cuisine and culture</p>
      </div>
    </div>
  </div>
  <div class="container marr_top">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-md-12">
        <div class="col-md-6 col-sm-12 col-xs-12 text-center">
          <div class="col-md-12 col-sm-12 col-xs-12 text-center item1 pad_rem border_st">
            <div class="col-md-12 col-sm-12 col-xs-12 img_hight text-center item1 pad_rem opb1">
              <span class="notify-badge top_mar left_mar">Packed with tons of features such as Google Fonts,Font Awesome
                4 and Typicons</span>
              <img src="image/NewYork.jpg" class="img-thumbnail jsd pad_remv" alt="Cinque Terre">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 ">
              <div class="col-md-4 col-sm-12 col-xs-12 xxz aswk clearfix pull-left">
                <div class="col-md-12 col-sm-12 col-xs-12 kop">
                  <h4 class="font_siz kgd">18 SEP 2014</h4>
                  <p> <i class="fa fa-comment kgd" aria-hidden="true"></i> 0 comments</p>
                  <p class="mar-rx kgd">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    Tweets this
                  </p>
                  <p class="mar-lf kgd"> <i class="fa fa-pencil" aria-hidden="true"></i> Post a comment</p>
                </div>
              </div>
              <div class=" clearfix  col-md-8 col-sm-12 col-xs-12 m1-top1 madw pull-right">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <p class="tdga">
                    vienna a premium resturant wordpress
                    theme develop by micro themes and
                    design for resturant and bar owners.
                    vienna a premium resturant wordpress
                    theme develop by micro themes and
                    design for resturant and bar owners.
                  </p>
                  <h5 class="marg_left2 text_c">Continue Reading &#8594;</h5>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 text-center">
          <div class="col-md-12 col-sm-12 col-xs-12 text-center item1 pad_rem border_st">
            <div class="col-md-12 col-sm-12 col-xs-12 img_hight text-center item1 pad_rem opb1">
              <span class="notify-badge top_mar left_mar">Start selling your own items, recipe books or utensils with
                Woocommerce</span>
              <img src="image/first-1.jpg" class="img-thumbnail jsd pad_remv" alt="Cinque Terre">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-4 col-sm-12 col-xs-12 xxz aswk clearfix pull-left">
                <div class="col-md-12 col-sm-12 col-xs-12 kop">
                  <h4 class="font_siz kgd">16 SEP 2014</h4>
                  <p> <i class="fa fa-comment kgd" aria-hidden="true"></i> 0 comments</p>
                  <p class="mar-rx kgd">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    Tweets this
                  </p>
                  <p class="mar-lf kgd"> <i class="fa fa-pencil" aria-hidden="true"></i> Post a comment</p>
                </div>
              </div>
              <div class=" clearfix  col-md-8 col-sm-12 col-xs-12 m1-top1 madw pull-right">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <p class="tdga">
                    vienna a premium resturant wordpress
                    theme develop by micro themes and
                    design for resturant and bar owners.
                    vienna a premium resturant wordpress
                    theme develop by micro themes and
                    design for resturant and bar owners.
                  </p>
                  <h5 class="marg_left2 text_c">Continue Reading &#8594;</h5>
                </div>
              </div>
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
            <h5 class="qaxds">BURGATORY<img src="image/cropped-Logo-1.png" height="20"></h5>
            <p class="mar-le">
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
            <p><a class="dhhkd1 let_spce" href="about.html">
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