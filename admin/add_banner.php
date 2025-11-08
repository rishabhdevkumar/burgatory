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
      <!-- Add Banner Photo Card -->
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
                  <select name="page" id="page" class="medium-input validate[required]" onchange="check_page(this.value)">
                    <option value="">Select</option>
                    <?php
                      $page = "SELECT * FROM `pages` WHERE 1";
                      $run_page = mysqli_query($connect,$page);	
                      while($fetch_page = mysqli_fetch_array($run_page)) {
                    ?>
                      <option value="<?php echo $fetch_page['id']?>" 
                        <?php if(isset($_GET['page_id']) && $_GET['page_id']==$fetch_page['id']) {echo "selected='selected'";}?>>
                        <?php echo $fetch_page['page_title']?>
                      </option>
                    <?php } ?>
                  </select>
                </p>

                <p id="image_p">
                  <label>&nbsp;Gallery Image&nbsp;<span style="color:red;">*</span></label>
                  <input class="text-input medium-input validate[required]" type="file" id="img"
                         name="img" onchange="chk_valid_img(this)" />
                </p>

                <p>
                  <img id="blah" src="#" alt="Preview" width="400" height="300" style="display:none;" />
                </p>

                <p>
                  <input class="button" type="submit" value="Add Photo" id="insert" name="insert" />
                </p>
              </fieldset>

              <fieldset>
                <p id="preview"></p>
              </fieldset>

              <div class="clear"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
	<div id="main-content">
	
<div class="content-box banner-list-card" style="box-shadow: 0px 0 12px 5px rgba(128, 122, 122, 0.29); width: 100%;">
  <div class="content-box-header">
    <h3>Banner List</h3>
    <ul class="content-box-tabs">
      <li><a href="#" class="default-tab">Show All Banners</a></li>
    </ul>
    <div class="clear"></div>
  </div>

  <div class="content-box-content">
    <table class="styled-table">
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
        <tr>
          <td>1</td>
          <td>Home Page</td>
          <td><img src="images/sample1.jpg" alt="Banner" height="40" width="60"></td>
          <td><span class="status active">Active</span></td>
          <td>
            <a href="#" title="Edit"><img src="images/pencil.png" alt="Edit"></a>
            &nbsp;
            <a href="#" title="Delete"><img src="images/cross.png" alt="Delete"></a>
          </td>
        </tr>

        <tr>
          <td>2</td>
          <td>About Us</td>
          <td><img src="images/sample2.jpg" alt="Banner" height="40" width="60"></td>
          <td><span class="status inactive">Inactive</span></td>
          <td>
            <a href="#" title="Edit"><img src="images/pencil.png" alt="Edit"></a>
            &nbsp;
            <a href="#" title="Delete"><img src="images/cross.png" alt="Delete"></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
					  </div>

  </div>
</body>


</html>
<style>
.banner-list-card {
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 0 12px 5px rgba(128, 122, 122, 0.29);
  margin-top: -41%;
  padding: 0;
  overflow: hidden;
}

.banner-list-card .content-box-header {
  background: #f0f0f0;
  padding: 2px 5px;
  border-bottom: 1px solid #ddd;
  h3 {
    font-weight: 800;
  }
}

.styled-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}

.styled-table th,
.styled-table td {
  text-align: left;
  padding: 12px 15px;
  border-bottom: 1px solid #ddd;
}

.styled-table th {
  font-weight: 600;
  color: #000;
}

.status {
  padding: 5px 10px;
  border-radius: 20px;
  font-size: 13px;
  font-weight: 600;
  text-transform: capitalize;
}

.status.active {
  background-color: #d4edda;
  color: #155724;
}

.status.inactive {
  background-color: #f8d7da;
  color: #721c24;
}

/* ✅ Responsive for Mobile (up to 768px) */
@media (max-width: 768px) {
  .banner-list-card {
    position: relative;
    margin-top: 400%;
    width: 95%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 6px;
    box-shadow: 0px 0 8px 3px rgba(128, 122, 122, 0.2);
  }

  .banner-list-card .content-box-header {
    padding: 10px 15px;
    text-align: center;
  }

  .banner-list-card .content-box-header h3 {
    font-size: 16px;
  }

  .styled-table th,
  .styled-table td {
    font-size: 13px;
    padding: 8px;
    display: block;
    text-align: right;
    border-bottom: 1px solid #ddd;
  }

  .styled-table th::before {
    content: attr(data-label);
    float: left;
    font-weight: 600;
    color: #333;
  }

  .styled-table tr {
    display: block;
    margin-bottom: 15px;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 0 5px rgba(128, 122, 122, 0.1);
  }
}
</style>


