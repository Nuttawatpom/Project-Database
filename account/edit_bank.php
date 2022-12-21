<?php
    session_start();
    include('connect.php');
    
    if(isset($_POST['edit_bank'])){
        $n_bank_name = $_POST['n_bank_name'];
        $n_acc_name = $_POST['n_acc_name'];
        $n_bank_acc = $_POST['n_bank_acc'];
        $current_user = $_SESSION['user_id'];

        $sql = "SELECT * FROM customer WHERE user_id = '$current_user'";
        $userFound = mysqli_query($conn,$sql);

        if($userFound){
            if(mysqli_num_rows($userFound) > 0){
                if(!empty($n_bank_name) && !empty($n_bank_acc) && !empty($n_acc_name)){
                    $reg = "UPDATE customer SET bank_name='$n_bank_name', acc_name='$n_acc_name', bank_acc='$n_bank_acc' WHERE user_id = '$current_user'";
                    mysqli_query($conn,$reg);
                    echo "<script type='text/javascript'>alert('Your banking detail has been updated.');
                    window.location='bankacc.php';
                    </script>";
                }else{
                    header('location: bankacc.php');
                }
            }
        }
    }
?>
