<?php
    session_start();
    include('connect.php');

    if(isset($_POST['delete'])){
        $current_user = $_SESSION['user_id'];
        $product = $_POST['text'];

        $sql = "SELECT * FROM cart WHERE u_id = '$current_user' AND p_id = '$product'";
        $user = mysqli_query($conn,$sql);

        if($user){
            $reg = "DELETE FROM cart WHERE p_id = '$product'";
            mysqli_query($conn,$reg);
            header('location: sumproduct.php');
        }else{
            header('location: sumproduct.php');
        }
    }
?>

