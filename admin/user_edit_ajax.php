<?php
include("config.php");

if (isset($_POST['user'])) {
    $user_id = mysqli_real_escape_string($connect, $_POST['user']);
    $User = "SELECT * FROM `user` WHERE id = '$user_id'";
    $run = mysqli_query($connect, $User);

    if ($fetch = mysqli_fetch_assoc($run)) {

        $state_query = "SELECT * FROM state";
        $state_run = mysqli_query($connect, $state_query);

        $city_query = "SELECT * FROM city WHERE state_id = '".$fetch['state']."'";
        $city_run = mysqli_query($connect, $city_query);

        echo '
        <form id="editUserForm" method="POST" action="user_update.php">
            <input type="hidden" name="id" value="' . htmlspecialchars($fetch['id']) . '">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="' . htmlspecialchars($fetch['name']) . '" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="' . htmlspecialchars($fetch['email']) . '" required>
            </div>

            <div class="mb-3">
                <label class="form-label">State</label>
                <select class="form-control" id="state" name="state" onchange="get_city_by_state(this.value)" required>
                    <option value="">Select State</option>';
                    while ($fetch_state = mysqli_fetch_array($state_run)) {
                        $selected = ($fetch_state['id'] == $fetch['state']) ? 'selected' : '';
                        echo '<option value="' . $fetch_state['id'] . '" ' . $selected . '>' . htmlspecialchars($fetch_state['state_name']) . '</option>';
                    }
        echo    '</select>
            </div>

            <div class="mb-3">
                <label class="form-label">City</label>
                <select class="form-control" id="city" name="city" required>
                    <option value="">Select City</option>';
                    while ($fetch_city = mysqli_fetch_array($city_run)) {
                        $selected = ($fetch_city['id'] == $fetch['city']) ? 'selected' : '';
                        echo '<option value="' . $fetch_city['id'] . '" ' . $selected . '>' . htmlspecialchars($fetch_city['city_name']) . '</option>';
                    }
        echo    '</select>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="' . htmlspecialchars($fetch['address']) . '" required>
            </div>

            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-secondary me-2">Reset</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>';
    } else {
        echo '<p class="text-danger text-center">User not found!</p>';
    }
} else {
    echo '<p class="text-danger text-center">Invalid Request!</p>';
}
?>
