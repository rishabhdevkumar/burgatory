<?php
    include("config.php");
    $name = $_POST['name1'];
    $email = $_POST['email1'];
    $phone = $_POST['phone1'];
    $dob = $_POST['dob1'];
    $state = $_POST['state1']; 
    $city = $_POST['city1']; 
    $address = $_POST['address1'];
    $Zipcode = $_POST['zip_code1'];
    $id = $_POST['id'];

    $check_email = "SELECT * FROM `user` WHERE email = '".$email."' AND id ! = '".$id."'";
    $run_email = mysqli_query($connect, $check_email);
    $num_row_check = mysqli_num_rows($run_email);
    if($num_row_check > 0)
    {
        echo 'Email Already Exists';
    }else{
        $update_user = "UPDATE `user` SET name='".$name."', email='".$email."', phone_no='".$phone."',
        dob='".$dob."', state='".$state."', city='".$city."', address='".$address."', Zip_code='".$Zipcode."'
        WHERE id = '".$id."'";
        $run = mysqli_query($connect, $update_user);
        if($run)
        {
            $select = "SELECT * FROM `user` WHERE 1";
            $run_select = mysqli_query($connect, $select);
            echo '<table class="user_table">
                    <thead>
                       <tr>
                          <th class="user_detail">Sl No</th>
                          <th class="user_detail">Profile</th>
                          <th class="user_detail">Name</th>
                          <th class="user_detail">Email</th>
                          <th class="user_detail">Phone No</th>
                          <th class="user_detail">Dob</th>
                          <th class="user_detail">State</th>
                          <th class="user_detail">City</th>
                          <th class="user_detail">Pincode</th>
                          <th class="user_detail">Address</th>
                          <th class="user_detail">Action</th>
                        </tr>
                    </thead>';
            while($fetch_rec = mysqli_fetch_array($run_select))
            {
              $name = $fetch_rec['name'];
              $email = $fetch_rec['email'];
              $phone = $fetch_rec['phone_no'];
              $dob = $fetch_rec['dob'];
              $state_id = $fetch_rec['state']; 
              $city_id = $fetch_rec['city']; 
              $address = $fetch_rec['address'];
              $Zipcode = $fetch_rec['zip_code'];
              $id = $fetch_rec['id'];
              $select_state = "SELECT * FROM `state` WHERE id = '".$fetch_rec['state']."'";
              $run_state = mysqli_query($connect, $select_state);
              $fetch_state = mysqli_fetch_array($run_state);

              $select_city = "SELECT * FROM `city` WHERE id = '".$fetch_rec['city']."'";
              $run_city = mysqli_query($connect, $select_city);
              $fetch_city = mysqli_fetch_array($run_city);

              echo '<tr id="row_'.$id.'">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>';
            }
            echo '</table>';
        }else{
            
        }
    }
?>