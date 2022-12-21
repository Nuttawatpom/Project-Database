<?php
    session_start();
    include('connect.php');
    
    if(isset($_POST['send_prob'])){
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_phone = $_POST['c_phone'];
        $topic = $_POST['topic'];
        $detail = $_POST['detail'];
        $current_user = $_SESSION['user_id'];
            
        $reg = "insert into contract(u_id,c_name,c_email,c_phone,topic,detail) values ('$current_user','$c_name','$c_email','$c_phone','$topic','$detail')";
        mysqli_query($conn,$reg);
        $ct1 = "SELECT * FROM contract";
        $ct2 = mysqli_query($conn,$ct1);
        $row = mysqli_num_rows($ct2);
        $ct_id = "CA".$row;
        $uid = "UPDATE contract SET contract_id = '$ct_id' WHERE u_id = '$current_user'";
        mysqli_query($conn,$uid);
        echo "<script type='text/javascript'>alert('Your report has been sent.');
            window.location='chat.php';
            </script>";
    }
?>
