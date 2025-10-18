<?php
include("config.php");
$record = "SELECT * FROM user WHERE 1";
$run = mysqli_query($connect, $record);
if (!$run) {
    die("Database query failed: " . mysqli_error($connect)); 
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>User Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery.notifyBar.js"></script>
    <link rel="stylesheet" href="css/notifyBar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="js/jquery.configuration.js"></script>
    <script type="text/javascript" src="js/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
    <link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/_samples/sample.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#dashboard").validationEngine();

            $(document).on("click", ".editBtn", function () {
                var userId = $(this).data("id");
                console.log("Fetching data for user ID:", userId);
                $.ajax({
                    url: "get_user.php",
                    type: "POST",
                    data: { id: userId },
                    dataType: "json",
                    success: function (response) {
                        console.log("Response from get_user.php:", response);
                        if (response && response.name !== undefined) {
                            $("#userId").val(userId);
                            $("#userName").val(response.name || '');
                            $("#userEmail").val(response.email || '');
                            $("#state").val(response.state || '');
                            get_city_by_state(response.state || '', response.city || '');
                            $("#address").val(response.address || '');
                            $("#editUserModal").modal("show");
                        } else {
                            alert("No user data found or invalid response.");
                            console.log("Invalid response structure:", response);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", status, error, xhr.responseText);
                        alert("Error fetching user data. Check console for details.");
                    }
                });
            });

            $("#editUserForm").on("submit", function (e) {
                e.preventDefault();
                var userId = $("#userId").val();
                var userName = $("#userName").val();
                var userEmail = $("#userEmail").val();
                var state = $("#state").val();
                var city = $("#city").val();
                var address = $("#address").val();
                console.log("Submitting data:", { id: userId, name: userName, email: userEmail, state: state, city: city, address: address }); // Debug
                $.ajax({
                    url: "update_user.php",
                    type: "POST",
                    data: { id: userId, name: userName, email: userEmail, state: state, city: city, address: address },
                    dataType: "json",
                    success: function (response) {
                        console.log("Update response:", response);
                        if (response.status === "success") {
                            alert("User updated successfully!");
                            $("#editUserModal").modal("hide");
                            location.reload();
                        } else {
                            alert("Error updating user: " + (response.message || "Unknown error"));
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Update AJAX error:", status, error, xhr.responseText);
                        alert("Error updating user. Check console for details.");
                    }
                });
            });

            $("#userName").on("keypress", function (e) {
                if ($(this).val().length === 0 && e.which === 32) {
                    return false;
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

<body style="background: #f8f8f8">
    <div id="body-wrapper" style="background: #f8f8f8">
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
                                    $i = 1;
                                    while ($fetch_user = mysqli_fetch_array($run)) {
                                        $state_query = mysqli_query($connect, "SELECT state_name FROM state WHERE id = '" . mysqli_real_escape_string($connect, $fetch_user['state']) . "'");
                                        $state_name = $state_query && mysqli_num_rows($state_query) > 0 ? mysqli_fetch_assoc($state_query)['state_name'] : 'N/A';
                                        $city_query = mysqli_query($connect, "SELECT city_name FROM city WHERE id = '" . mysqli_real_escape_string($connect, $fetch_user['city']) . "'");
                                        $city_name = $city_query && mysqli_num_rows($city_query) > 0 ? mysqli_fetch_assoc($city_query)['city_name'] : 'N/A';
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <img src="/burgatory/profile_image/<?php echo htmlspecialchars($fetch_user['profile']); ?>"
                                                alt="Profile" class="profile_img">
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($fetch_user['name'] ?: 'N/A'); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($fetch_user['email'] ?: 'N/A'); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($fetch_user['dob'] ?: 'N/A'); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($state_name); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($city_name); ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($fetch_user['address'] ?: 'N/A'); ?>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" title="Edit User" class="editBtn"
                                                data-bs-toggle="modal" data-bs-target="#editUserModal"
                                                data-id="<?php echo htmlspecialchars($fetch_user['id']); ?>">
                                                <img src="images/edit_user.png" alt="Edit">
                                            </a>&nbsp;
                                            <a href="javascript:void(0)"
                                                onclick="return confirm('Are you sure you want to delete this user?')"
                                                title="Delete" class="deleteBtn"
                                                data-id="<?php echo htmlspecialchars($fetch_user['id']); ?>">
                                                <img src="images/form_delete.png" alt="Delete">
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        $i++;
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

    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content card-style">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <input type="hidden" name="id" id="userId">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="userName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="userEmail" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">State</label>
                            <select class="form-control" id="state" name="state"
                                onchange="get_city_by_state(this.value)" required>
                                <option value="">Select State</option>
                                <?php
                                $select = "SELECT * FROM state WHERE 1";
                                $run_state = mysqli_query($connect, $select);
                                while ($fetch_state = mysqli_fetch_array($run_state)) {
                                ?>
                                <option value="<?php echo htmlspecialchars($fetch_state['id']); ?>">
                                    <?php echo htmlspecialchars($fetch_state['state_name']); ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <select class="form-control" id="city" name="city" required>
                                <option value="">Select City</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address"
                                required>
                        </div>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    .content-box {
        background: #f7f7f7;
        overflow: hidden;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .content-box-header {
        background: #210b44;
        color: #fff;
    }

    .content-box-header h3 {
        margin: 0;
        font-size: 20px;
    }

    .modal-header .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
    }

    .user_table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
        border: 1px solid #cecece;
    }

    .user_table thead th {
        color: #333;
        border: 1px solid #cecece;
        background: #faf5f5;
        text-align: center;
    }

    .user_table td {
        color: #555;
        background: #fff;
        border: 1px solid #cecece;
        text-align: center;
        vertical-align: middle;
        padding: 8px;
    }

    .form-label {
        color: #000;
        font-weight: bold;
    }

    select.form-control {
        -webkit-appearance: auto;
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

    .card-style {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border: none;
    }

    .modal-header {
        background: #210b44;
        color: #fff;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .modal-body {
        background: #f8f8f8;
    }

    .btn-link {
        text-decoration: none;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #cecece;
        padding: 8px;
    }

    .btn-primary,
    .btn-secondary {
        border-radius: 5px;
    }
</style>