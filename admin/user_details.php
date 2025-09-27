<?php
    include("config.php");
    // $id = $_SESSION['user_id'];
    $record = "SELECT * FROM user WHERE 1";
    $run = mysqli_query($connect, $record);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>User Details</title>

    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.notifyBar.js"></script>
    <link rel="stylesheet" href="css/notifyBar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="js/jquery.configuration.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.validationEngine.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.validationEngine-en.js"></script>
    <link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/_samples/sample.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#dashboard").validationEngine()
        });
        function checkname(e) {
            if (document.getElementById("name").value.length == 0 && e.which == 32) {
                return false;
            }
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
            <div class="content-box" style="box-shadow: 0px 0 12px 5px rgba(128, 122, 122, 0.29);">
                <div class="content-box-header">
                    <h3>User Details</h3>
                    <div class="clear"></div>
                </div>
                <div class="content-box-content">
                    <div class="tab-content">
                        <form id="dashboard" method="POST" action="" enctype="multipart/form-data">
                            <table class="user_table">
                                <thead>
                                    <tr>
                                        <th class="user_detail">Sl No</th>
                                        <th class="user_detail">Profile</th>
                                        <th class="user_detail">Full Name</th>
                                        <th class="user_detail">Email Id</th>
                                        <th class="user_detail">Dob</th>
                                        <th class="user_detail">State</th>
                                        <th class="user_detail">City</th>
                                        <th class="user_detail">Address</th>
                                        <th class="user_detail">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
					                    $i=1;
					                    while($fetch_user = mysqli_fetch_array($run))
					                    {
					                ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td>
                                           <img src="/burgatory/profile_image/<?php echo $fetch_user['profile']; ?>" 
                                            alt="Profile" class="profile_img">
                                        </td>
                                        <td><?php echo $fetch_user['name']?></td>
                                        <td><?php echo $fetch_user['email']?></td>
                                        <td><?php echo $fetch_user['dob']?></td>
                                        <td><?php echo $fetch_user['state']?></td>
                                        <td><?php echo $fetch_user['city']?></td>
                                        <td><?php echo $fetch_user['address']?></td>
                                        <td>
                                            <a href="" title="Edit">
												<img src="images/edit_user.png" alt="Edit" />
											</a>&nbsp;
                                            <a href=""
												onclick="return confirm('Are you sure you want to delete this page title?')"
												title="Delete">
												<img src="images/form_delete.png" alt="Delete" />
											</a>&nbsp;
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</body>

</html>

<style>
    .content-box {
        background: #f7f7f7ff;
        overflow: hidden;
        width: 100%;
        max-width: 1200px;
        display: flex;
        flex-direction: column;
    }

    .content-box-header {
        background: #8c53e9ff;
        color: #fff;
    }

    .content-box-header h3 {
        margin: 0;
        font-size: 20px;
    }

    .user_table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        border: 1px solid #cececeff;
    }

    .user_table thead th {
        padding: 12px 10px;
        color: #333;
        border: 1px solid #cececeff;
        background: #faf5f5ff;
        text-align: center;
    }

    .user_table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .user_table td {
        color: #555;
        background: #fff;
        border: 1px solid #cececeff;
        text-align: center;
        vertical-align: middle;
    }

    .profile_img {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        object-fit: cover;
    }

    .user_table tbody tr:nth-child(odd) td {
        background: #ffffff;
    }

    .user_table tbody tr:nth-child(even) td {
        background: #f9f9f9;
    }
</style>