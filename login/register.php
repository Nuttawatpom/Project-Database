<?php
    session_start();
    include('connect.php');
?>
<?php
    if(isset($_POST['reg_user'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        $s = " select * from customer where email = '$email'";
        $s2 = " select * from customer where username = '$username'";
        $s3 = " select * from customer";

        $result = mysqli_query($conn,$s);
        $result2 = mysqli_query($conn,$s2);
        $result3 = mysqli_query($conn,$s3);
        $ema = mysqli_num_rows($result);
        $use = mysqli_num_rows($result2);

    ?>
    <?php
        if($use > 0){
            echo "<script type='text/javascript'>alert('Username : $username has been used, please try again.');
                window.location='index.php';
                </script>";
        }
        
        if($ema > 0){
            echo "<script type='text/javascript'>alert('Email : $email has been used, please try again.');
                window.location='index.php';
                </script>";
        }
        
        else{
            if($use == 0 && $ema ==0){
                $reg = "INSERT INTO customer(username,email,password,fname,lname) values ('$username','$email','$password','$fname','$lname')";
                mysqli_query($conn,$reg);
                $result3 = mysqli_query($conn,$s3);
                $use2 = mysqli_num_rows($result3);
                $user_id = "CA".$use2;
                $uid = "UPDATE customer set user_id = '$user_id' WHERE username = '$username'";
                mysqli_query($conn,$uid);
                echo "<script type='text/javascript'>alert('Register successful!');
                window.location='index.php';
                </script>";
            }
        }
    }
?>