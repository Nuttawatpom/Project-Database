<?php
    session_start();
    include('connect.php');

    if(isset($_POST['confirm'])){
        $current_user = $_SESSION['user_id'];
        $orderID = $_POST['orderID'];

        $sql = "SELECT * FROM cart WHERE u_id = '$current_user' AND cart_id = '$orderID'";
        $del = "SELECT * FROM payment WHERE u_id = '$current_user' AND order_id = '$orderID'";
        $user = mysqli_query($conn,$sql);
        $user2 = mysqli_query($conn,$del);
        
        if($user){
            while($row = $user->fetch_assoc()){
                $order_id = $row["cart_id"];
                $u_id = $row["u_id"];
                $p_id = $row["p_id"];
                $p_name = $row["p_name"];
                $color_s = $row["color_s"];
                $p_quantity = $row["p_quantity"];
                $p_price = $row["p_price"];
                $p_img = $row["p_img"];
                $b_status = "สำเร็จ";
                $send = "INSERT INTO history(order_id,u_id,b_status) VALUES('$order_id','$u_id','$b_status')";
                mysqli_query($conn,$send);
                $pro = "SELECT * FROM product WHERE user_id = '$u_id' AND product_id = '$p_id'";
                $user3 = mysqli_query($conn,$pro);
                while($rows = $user3->fetch_assoc()){
                    $product_id = $rows["product_id"];
                    $quantity = $rows["quantity"];
                    $new_quan = $quantity - $p_quantity;
                    $send2 = "UPDATE product SET quantity = '$new_quan' WHERE product_id = '$p_id'";
                    mysqli_query($conn,$send2);
                }
            }
            $reg = "DELETE FROM cart WHERE cart_id = '$orderID'";
            mysqli_query($conn,$reg);
            $reg2 = "DELETE FROM payment";
            mysqli_query($conn,$reg2);
            echo "<script type='text/javascript'>alert('Order has been confirmed.');
                window.location='manage.php';
                </script>";
        }
    }

    else if(isset($_POST['decline'])){
        
        $current_user = $_SESSION['user_id'];
        $orderID = $_POST['orderID'];

        $sql = "SELECT * FROM cart WHERE u_id = '$current_user' AND cart_id = '$orderID'";
        $user = mysqli_query($conn,$sql);
        $del = "SELECT * FROM payment WHERE u_id = '$current_user' AND order_id = '$orderID'";
        $user2 = mysqli_query($conn,$del);
        
        if($user2){
            while($row = $user->fetch_assoc()){
                $order_id = $row["cart_id"];
                $u_id = $row["u_id"];
                $p_id = $row["p_id"];
                $p_name = $row["p_name"];
                $color_s = $row["color_s"];
                $p_quantity = $row["p_quantity"];
                $p_price = $row["p_price"];
                $p_img = $row["p_img"];
                $b_status = "ถูกปฏิเสธ";
                $send = "INSERT INTO history(order_id,u_id,b_status) VALUES('$order_id','$u_id','$b_status')";
                mysqli_query($conn,$send);
            }
            $reg2 = "DELETE FROM payment";
            mysqli_query($conn,$reg2);
            echo "<script type='text/javascript'>alert('Order has been declined.');
                window.location='manage.php';
                </script>";
        }
    }
?>