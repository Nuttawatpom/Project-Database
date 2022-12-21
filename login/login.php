<?php
    session_start();
    include('connect.php');

    if(isset($_POST['login_user'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "SELECT * FROM customer WHERE username = '$username' and password ='$password'";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['user_id'] = $row['user_id'];
                echo "<script type='text/javascript'>alert('Log in successful. Welcome $username');
                window.location='../home/index.php';
                </script>";
            }
            exit();
        }else{
            echo "<script type='text/javascript'>alert('Wrong username of password.');
                window.location='index.php';
                </script>";
            exit();
        }
    }

    if(isset($_POST['login_admin'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $query = "SELECT * FROM admin WHERE admin_uname = '$username' and admin_password ='$password'";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['admin_username'] = $row['admin_uname'];
                echo "<script type='text/javascript'>alert('Welcome, you are log in into admin account');
                window.location='../admin/admin.php';
                </script>";
            }
            exit();
        }else{
            echo "<script type='text/javascript'>alert('Wrong username of password.');
                window.location='index.php';
                </script>";
            exit();
        }
    }
?>