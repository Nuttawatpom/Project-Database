<?php
    include('connect.php');

    $p = "SELECT * FROM product WHERE product_id = '$cproduct_id'";
    $prod = mysqli_query($conn,$p);

    if($user){
        while($row = $prod->fetch_assoc()){
        ?>
        <img src="../Product_reg/uploads/<?php echo $row['p_img']; ?>" width='100px' height='100px' alt="" style='float:left;'/></td>
        <tr>
            <td><?php echo $row["product_name"]; ?> </td>
            <td><?php echo $row["product price"]; ?></td>
            <td><?php echo $row["quantity"]; ?></td>
            <td><?php echo $row["color_size"]; ?></td>
        </tr>
        <?php
        }
    }
?>
