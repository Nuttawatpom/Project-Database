<?php 
    session_start();
    include "connect.php";
    
    if((isset($_FILES['slip_image'])) && (isset($_POST['send_slip']))) {

        $img_name = $_FILES['slip_image']['name'];
        $img_size = $_FILES['slip_image']['size'];
        $tmp_name = $_FILES['slip_image']['tmp_name'];
        $error = $_FILES['slip_image']['error'];
        $current_user = $_SESSION['user_id'];
        $total_price = $_POST['total_price'];

        $cid = "SELECT cart_id FROM cart WHERE u_id = '$current_user' GROUP BY u_id";
        $oid = mysqli_query($conn,$cid);
        $order_id = $oid->fetch_array()[0] ?? '';

        if ($error === 0) {
            if ($img_size > 1250000) {
                echo "<script type='text/javascript'>alert('Sorry, your file is too large.');
                        window.location='index.php';
                        </script>";
            }else {
                $allowed_exs = array("jpg", "jpeg", "png"); 
                if (in_array($allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).$current_user;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                
                    $reg = "INSERT INTO payment(order_id,u_id,total_price,slip_img) values ('$order_id','$current_user','$total_price','$new_img_name')";
                    mysqli_query($conn,$reg);
                    $reg2 = "SELECT * FROM payment";
                    $payn = mysqli_query($conn,$reg2);
                    $rows = mysqli_num_rows($payn);
                    $pay_id = "PA".$current_user.$rows;
                    $pay = "UPDATE payment SET payment_id='$pay_id'";
                    echo "<script type='text/javascript'>alert('Payment evidence upload successful.');
                            window.location='slip.php';
                            </script>";
                }else {
                    echo "<script type='text/javascript'>alert('You can't upload files of this type.');
                        window.location='index.php';
                        </script>";
                }
            }
        }else {
            echo "<script type='text/javascript'>alert('Unknown error occurred!');
                window.location='index.php';
                </script>";
        }

    }else {
        header("Location: slip.php");
    }
?>