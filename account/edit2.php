<?php
    session_start();
    include('connect.php');
    
    if(isset($_POST['edit_pass'])){
        $password = $_POST['password'];
        $n_password = $_POST['n_password'];
        $current_user = $_SESSION['user_id'];
        
        $u = "SELECT * FROM customer WHERE user_id = '$current_user'";
        $s = "SELECT * FROM customer WHERE password = '$password'";
        $ns = "SELECT * FROM customer WHERE password = '$n_password'";

        $user = mysqli_query($conn,$u);
        $result = mysqli_query($conn,$s);
        $result2 = mysqli_query($conn,$s);

        if($user){
            if(!empty($password) && !empty($n_password)){
                if(mysqli_num_rows($result) > 0){
                    $reg = "UPDATE customer SET password = '$n_password' WHERE user_id = '$current_user'";
                    mysqli_query($conn,$reg);
                    echo "<script type='text/javascript'>alert('Your password has been changed.');
                        window.location='password.php';
                        </script>";
                }

                else if(mysqli_num_rows($result2) > 0){
                    echo "<script type='text/javascript'>alert('Password has been used.');
                    window.location='password.php';
                    </script>";

                }

                else if(mysqli_num_rows($result) == 0){
                    echo "<script type='text/javascript'>alert('Old password is not correct.');
                    window.location='password.php';
                    </script>";
                }
            }
        }
    }
?>