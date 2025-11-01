<?php
    include("config.php");
    $id = $_POST['user_id'];
    $select_rec = "SELECT * FROM `user` WHERE id = '".$id."'";
    $run_rec = mysqli_query($connect,$select_rec);
    $fetch_rec = mysqli_fetch_array($run_rec);
    $name = $fetch_rec['name'];
    $email = $fetch_rec['email'];
    $phone = $fetch_rec['phone'];
    $dob = $fetch_rec['dob'];
    $state = $fetch_rec['state'];
    $city = $fetch_rec['city'];
    $address = $fetch_rec['address'];
    $Zipcode = $fetch_rec['zipcode'];

    $select_state = "SELECT * FROM `state` WHERE id = '".$state_id."'";
    $run_state = mysqli_query($connect, $select_state);
    $fetch_state = mysqli_fetch_array($run_state);
    $state = $fetch_state['state_name'];

    $select_city = "SELECT * FROM `city` WHERE id = '".$city_id."'";
    $run_city = mysqli_query($connect, $select_city);
    $fetch_city = mysqli_fetch_array($run_city);
    $city = $fetch_city['city_name'];

  echo '
<div class="modal-dialog modal-dialog-centered modal-md">
  <div class="modal-content card-style">
    <div class="modal-header">
      <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <div class="modal-body">
      <form method="POST" action="">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" class="form-control" value="'.$name.'" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="'.$email.'" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Phone No</label>
          <input type="number" name="phone" class="form-control" value="'.$phone.'" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Date of Birth</label>
          <input type="date" name="dob" class="form-control" value="'.$dob.'" required>
        </div>

        <div class="mb-3">
          <label class="form-label">State</label>
          <select class="form-control" id="state" name="state" required>
            <option value="">Select State</option>';
            $select_states = "SELECT * FROM `state`";
            $run_states = mysqli_query($connect, $select_states);
            while($fetch_states = mysqli_fetch_array($run_states)) {
              $S = ($state_id == $fetch_states["id"]) ? "selected" : "";
              echo '<option value="'.$fetch_states["id"].'" '.$S.'>'.$fetch_states["state_name"].'</option>';
            }
echo '
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">City</label>
          <select class="form-control" id="city" name="city" required>
            <option value="">Select City</option>';
            $select_cities = "SELECT * FROM `city`";
            $run_cities = mysqli_query($connect, $select_cities);
            while($fetch_cities = mysqli_fetch_array($run_cities)) {
              $C = ($city_id == $fetch_cities["id"]) ? "selected" : "";
              echo '<option value="'.$fetch_cities["id"].'" '.$C.'>'.$fetch_cities["city_name"].'</option>';
            }
echo '
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" name="address" class="form-control" value="'.$address.'" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Zip Code</label>
          <input type="number" name="zipcode" class="form-control" value="'.$Zipcode.'" required>
        </div>

        <div class="d-flex justify-content-end">
          <button type="reset" class="btn btn-secondary me-2">Reset</button>
          <button type="submit" name="update_user" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>';
?>