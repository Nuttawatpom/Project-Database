<?php 
    session_start();
    include "connect.php";

    if((isset($_FILES['product_image'])) && (isset($_POST['reg_product']))) {
        $img_name = $_FILES['product_image']['name'];
        $img_size = $_FILES['product_image']['size'];
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $error = $_FILES['product_image']['error'];
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $product_price = $_POST['product_price'];
        $color_size = $_POST['color_size'];
        $category = $_POST['category'];
        $serial = $_POST['serial'];
        $current_user = $_SESSION['user_id'];

        $s = " select * from product where product_name = '$product_name'";
        $result = mysqli_query($conn,$s);
        $num = mysqli_num_rows($result);

        if ($error === 0) {
            if ($img_size > 1250000) {
                echo "<script type='text/javascript'>alert('Sorry, your file is too large.');
                    window.location='index.php';
                    </script>";
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png"); 

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    if($num > 0){
                        echo "<script type='text/javascript'>alert('This product has already registered.');
                            window.location='index.php';
                            </script>";
                    }else{
                        $reg = "INSERT INTO product(u_id,product_name,color_size,quantity,product_price,img_url,category,serial) 
                        VALUES('$current_user','$product_name','$color_size','$quantity','$product_price','$new_img_name','$category','$serial')";
                        mysqli_query($conn,$reg);
                        $pro = "SELECT * FROM product";
                        $pro2 = mysqli_query($conn,$pro);
                        $pro3 = mysqli_num_rows($pro2);
                        $prod_id = "PD".$pro3;
                        $reg2 = "UPDATE product SET product_id='$prod_id' WHERE product_name='$product_name'";
                        mysqli_query($conn,$reg2);
                        echo "<script type='text/javascript'>alert('Product $product_name add succesful.');
                            window.location='index.php';
                            </script>";
                    }
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
        header("Location: index.php");
    }
?>