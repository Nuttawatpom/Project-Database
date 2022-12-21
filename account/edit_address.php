<?php
    session_start();
    include('connect.php');
    
    if(isset($_POST['edit_addr'])){
        $ship_name = $_POST['ship_name'];
        $ship_num = $_POST['ship_num'];
        $province = $_POST['province'];
        $zip = $_POST['zip'];
        $detail_add = $_POST['detail_add'];
        $current_user = $_SESSION['user_id'];

        $sql = "SELECT * FROM customer WHERE user_id = '$current_user'";
        $userFound = mysqli_query($conn,$sql);

        if($userFound){
            if(mysqli_num_rows($userFound) > 0){
                if(!empty($ship_name) && !empty($ship_num) && !empty($detail_add) && !empty($province) && !empty($zip)){
                    $reg = "UPDATE customer SET ship_name='$ship_name', ship_phone='$ship_num', province='$province', zip='$zip', detail_add='$detail_add' WHERE user_id = '$current_user'";
                    mysqli_query($conn,$reg);
                    echo "<script type='text/javascript'>alert('Your shipping address has been updated.');
                        window.location='address.php';
                        </script>";
                }
            }
        }
    }
?>