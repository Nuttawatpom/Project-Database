<?php
    session_start();
    include('connect.php');

    if(isset($_POST['edit_user'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone_num = $_POST['phone_num'];
        $bday = $_POST['bday'];
        $bmonth = $_POST['bmonth'];
        $byear = $_POST['byear'];
        $sex = $_POST['sex'];

        $current_user = $_SESSION['user_id'];
        $sql = "SELECT * FROM customer WHERE user_id = '$current_user'";
        $result = mysqli_query($conn,$sql);
        
        $e = "UPDATE `customer` SET `email`='$email' WHERE `user_id` = '$current_user'";
        $f = "UPDATE `customer` SET `fname`='$fname' WHERE `user_id` = '$current_user'";
        $l = "UPDATE `customer` SET `lname`='$lname' WHERE `user_id` = '$current_user'";
        $p = "UPDATE `customer` SET `phone_num`='$phone_num' WHERE `user_id` = '$current_user'";
        $bd = "UPDATE `customer` SET `bday`='$bday' WHERE `user_id` = '$current_user'";
        $bm = "UPDATE `customer` SET `bmonth`='$bmonth' WHERE `user_id` = '$current_user'";
        $by = "UPDATE `customer` SET `byear`='$byear' WHERE `user_id` = '$current_user'";
        $s = "UPDATE `customer` SET `sex`='$sex' WHERE `user_id` = '$current_user'";

        if($result){
            if(!empty($_POST['fname'])){
                mysqli_query($conn,$f);
            }
            echo "<script type='text/javascript'>alert('User info updated successful.');
                window.location='index.php';
                </script>";
        }

        if($result){
            if(!empty($_POST['lname'])){
                mysqli_query($conn,$l);
            }
            echo "<script type='text/javascript'>alert('User info updated successful.');
                window.location='index.php';
                </script>";
        }

        if($result){
            if(!empty($_POST['phone_num'])){
                mysqli_query($conn,$p);
            }
            echo "<script type='text/javascript'>alert('User info updated successful.');
                window.location='index.php';
                </script>";
        }

        if($result){
            if(!empty($_POST['bday'])){
                mysqli_query($conn,$bd);
            }
            echo "<script type='text/javascript'>alert('User info updated successful.');
                window.location='index.php';
                </script>";
        }

        if($result){
            if(!empty($_POST['bmonth'])){
                mysqli_query($conn,$bm);
            }
            echo "<script type='text/javascript'>alert('User info updated successful.');
                window.location='index.php';
                </script>";
        }

        if($result){
            if(!empty($_POST['byear'])){
                mysqli_query($conn,$by);
            }
            echo "<script type='text/javascript'>alert('User info updated successful.');
                window.location='index.php';
                </script>";
        }

        if($result){
            if(!empty($_POST['sex'])){
                mysqli_query($conn,$s);
            }
            echo "<script type='text/javascript'>alert('User info updated successful.');
                window.location='index.php';
                </script>";
        }

        if($result){
            if((isset($_FILES['acc_image']))) {

                $img_name = $_FILES['acc_image']['name'];
                $img_size = $_FILES['acc_image']['size'];
                $tmp_name = $_FILES['acc_image']['tmp_name'];
                $error = $_FILES['acc_image']['error'];
        
                if ($error === 0) {
                    if ($img_size > 1250000){
                        header("Location: index.php?error=$em");
                        echo "<script type='text/javascript'>alert('Sorry, your file is too large.');
                            window.location='index.php';
                            </script>";
                    }else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
        
                        $allowed_exs = array("jpg", "jpeg", "png"); 
        
                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("IMG-", true).$current_user;
                            $img_upload_path = 'uploads/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);
                        
                            $reg = "UPDATE `customer` SET `img_acc`='$new_img_name' WHERE `user_id` = '$current_user'";

                            mysqli_query($conn,$reg);
                            header('location: index.php');
                        }else {
                            echo "<script type='text/javascript'>alert('You can't upload files of this type.');
                            window.location='index.php';
                            </script>";
                        }
                    }
                }else{
                    echo "<script type='text/javascript'>alert('Unknown error occurred!.');
                        window.location='index.php';
                        </script>";
                }
        
            }else {
                header("location: index.php");
            }
        }
    }
?>