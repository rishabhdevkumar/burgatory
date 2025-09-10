<?php
include("config.php");

$category_id = $_POST['category']; // coming from Ajax
$select_catagory = "SELECT * FROM `categories` WHERE id = '".$category_id."'";
$run_catagory = mysqli_query($connect, $select_catagory);

// Example output: buttons or menu cards
while($fetch_catagory = mysqli_fetch_array($run_catagory)) {
    echo '<button class="menu-btn color_act" style="padding-top: 12px">'
        .$fetch_catagory['name'].
        '</button>';
}
?>
