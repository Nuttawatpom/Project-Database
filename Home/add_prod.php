<?php
    session_start();
    include('connect.php');
    
    isset($_POST['add_product']){
        $current_user = $_SESSION['user_id'];
        $sql = "SELECT * FROM product WHERE product_id = '$product_id'";
        $user = mysqli_query($conn,$sql);

        if($user){
            while($row = $user->fetch_assoc()){
                $u_id = $row["u_id"];
                $p_id = $row["product_id"];
                $send = "INSERT INTO cart(u_id,p_id) VALUES('$u_id','$p_id')";
                mysqli_query($conn,$send);
                $cart_id = "CT".$current_user."";
                $send2 = "UPDATE cart SET cart_id = '$cart_id'";
                mysqli_query($conn,$send2);
            }
        }
    }
?>
