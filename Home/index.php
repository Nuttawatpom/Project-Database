<?php
    session_start();
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="shortcut icon" href="../img/Logo.png">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"></link>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Using-Fonts-->
</head>
<body>
    <!---navigation----------->
    <nav>
        <!--social-link-and-contact----->
        <div class="social-call">
            <!--social-links--------->
            <div class="social">
                <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="" class="social"><i class="fab fa-twitter"></i></a>
                <a href="" class="social"><i class="fab fa-google-plus-g"></i></a>
            </div>
            <!--contract---------->
            <div class="contact">
                <strong>Contact: EzShopContact@hotmail.com</strong>
            </div>
        </div>
        <!--manu-bar--------------->
        <div class="navigation">
            <!--logo------------->
            <a href="../Home/index.php" class="logo">
                <img src="../img/Logo.png" height="100" width="100">
            </a>
            <!--Menu-Icon------------>
            <div class="toggle"></div>
            <!--menu------->
            <ul class="menu">
                <li><a href="../Home/index.php"><b>หน้าหลัก</b></a></li>
                <li><a href="../Home/index.php"><b>ร้านค้า</b></a>
                <!--sale-lable-->
                    <span class="sale-lable">NEW!</span>
                </li>
                <li><a href="../Chat/Chat.php"><b>ติดต่อเรา</b></a></li>
                <li>
                    <input type="text"placeholder="ค้นหาสินค้า"></li>
                <li>
            </ul>
            <!---right-menu------->
            <div class="right-menu">
                <!---mail-box----->
                <a href="../mailbox/mailbox.html" class="mail-box">    
                    <i class="fa fa-envelope">
                    </i>
                </a>
                <!--user----->
                <div class="dropdown">
                    <a href="" class="address">
                        <i class="fas fa-address-book"></i>
                    </a>
                    <div class="dropdown-content">
                        <a href="../account/index.php">ข้อมูลส่วนตัว</a>
                        <form action='../db_connect/logout.php' method='POST'>
                            <a href="../login/index.php">Logout</a>
                        </form>
                    </div>
                </div>
                <!--cart-icon----->
                <a href="../sumorder/sumproduct.php" class="shopping-cart">   
                    <i class="fas fa-shopping-cart" id="cart-icon">
                    <!--number-of-product-in-cart-->
                    <span class="num-cart-product">
                    <?php
                        $current_user = $_SESSION['user_id'];
                        $sql = "SELECT * FROM cart WHERE u_id = '$current_user'";
                        $result = $conn->query($sql);
                        $row = mysqli_num_rows($result);
                        echo $row;
                        ?>
                        </span>
                    </i>
                </a>
            </div>
        </div>
    </nav>
    <!--Full-Slider------------------------>
    <div class="full-slider-box f-slider-1" >
        <!--slider-text-container------------->
        <div class="slider-text-container">
            
            <div class="f-slider-text">
                <span>Limited offer</span>
                <strong>ลด 30% <br/>หาก<font> ใส่โค้ดโปรโมชั่น</font></strong>
                <a href="javascript:void(0);" class="f-slider-btn">ซื้อตอนนี้เลย</a>
            </div>
        </div>
    </div>

    <!--New-Arrival------------------>
    <section class="new-arrival">
        <!--heading------------->
        <div class="arrival-heading">
            <strong>สินค้ามาใหม่!</strong>
            <p>สินค้าที่ดีที่สุดสำหรับคุณ</p>
        </div>

        <!--Product-container---------->
        <div class="product-container">
            <div class="cart">
                <h2 class="cart-title">Your Cart</h2>
                <!--Content--------->
                <div class="cart-content">

                    <div class="cart-box">
                        <img src="../img/item-2.png" alt="" class="cart-img"/>
                        <div class="detail-box">
                            <div class="cart-product-title">SkateBoard</div>
                            <div class="cart-price">5700 บาท</div>
                            <input type="number" value="1" class="cart-quantity">
                        </div>
                        <!--Remove-cart----------->
                        <i class="fa-solid fa-trash cart-remove"></i>
                    </div>
                </div>
                <!--Total------------->
                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price">0 บาท</div>
                </div>
                <!--Buy-Botton-->
                <button type="button" class="btn-buy">Buy Now</button>
                <!-- Cart Close -->
                <i class="fa-solid fa-x" id="close-cart"></i>
            </div>
            <!--product-box-1---->
                <?php
                            $current_user = $_SESSION['user_id'];

                            
                            $check = "SELECT * FROM product";
                            $user = mysqli_query($conn,$check);

                            if($user){
                                while($row = $user->fetch_assoc()){
                                    ?>
                                    <div class="product-box">  
                                        <div class="product-img">
                                            <img src="../Product_reg/uploads/<?php echo $row['img_url']; ?>" width='50px' height='50px' 
                                            alt="" style='border-radius: 5px'/></td>
                                        </div>
                                        <div class="product-details" style="text-align:center;font-size:20px;">
                                            <?php echo $row["product_name"]; ?> </td><br>
                                            <?php echo $row["product_price"]; ?> </td>
                                            <?php echo "บาท" ?> </td>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
        </div>

    </section>

            <!--New-Arrival------------------>
        <section class="new-arrival">
            <!--heading------------->
            <div class="arrival-heading">
                <strong>สินค้าสุดพิเศษ</strong>
                <p>เหมาะสำหรับคุณสุดๆ</p>
            </div>

            <!--Product-container---------->
            <div class="product-container">
                <!--product-box-1---->
                <div class="product-box">
                    <!--image---->
                    <div class="product-img">
                        <!--add-cart-------->
                        <a href="#" class="add-cart">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <img src="../img/item-1.png" />
                    </div>
                    <!--details---->
                    <div class="product-details">
                        <a href="#" class="p-name">iPhone 14 Pro Max</a>
                        <span class="p-price">50,000 บาท</span>
                    </div>
                </div>
                <div class="product-box">
                    <!--image---->
                    <div class="product-img">
                        <!--add-cart-------->
                        <a href="#" class="add-cart">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <img src="../img/item-2.png" />
                    </div>
                    <!--details---->
                    <div class="product-details">
                        <a href="#" class="p-name">Skateboard</a>
                        <span class="p-price">4,900 บาท</span>
                    </div>
                </div>
                <div class="product-box">
                    <!--image---->
                    <div class="product-img">
                        <!--add-cart-------->
                        <a href="#" class="add-cart">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <img src="../img/item-3.png" />
                    </div>
                    <!--details---->
                    <div class="product-details">
                        <a href="#" class="p-name">Helmet</a>
                        <span class="p-price">590 บาท</span>
                    </div>
                </div>
                <div class="product-box">
                    <!--image---->
                    <div class="product-img">
                        <!--add-cart-------->
                        <a href="#" class="add-cart">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <img src="../img/item-4.png" />
                    </div>
                    <!--details---->
                    <div class="product-details">
                        <a href="#" class="p-name">T-Shirt</a>
                        <span class="p-price">199 บาท</span>
                    </div>
                </div>
            </div>
        </section>
    <!--banner------------------->
    <div class="banner-box f-slider-2" >
        <!--slider-text-container------------->
        <div class="banner-text-container">
            
            <div class="banner-text">
                <span>Limited offer</span>
                <strong>ลด 30%<br/>หาก<font>ใส่โค้ดโปรโมชั่น</font></strong>
                <a href="javascript:void(0);" class="banner-btn">ซื้อตอนนี้เลย</a>
            </div>
        </div>
    </div>

    <!--service----------->
    <section class="service">
        <!--service-box-1--------->
        <div class="services-box">
            <i class="fas fa-shipping-fast"></i>
            <span>จัดส่งฟรี</span>
            <p>จัดส่งฟรีทั่วประเทศ</p>
        </div>
        <!--service-box-2--------->
        <div class="services-box">
            <i class="fas fa-headphones-alt"></i>
            <span>Support 24/7</span>
            <p>ติดต่อสอบถามได้ 24 ชั่วโมง</p>
        </div>
        <!--service-box-3--------->
        <div class="services-box">
            <i class="fas fa-sync"></i>
            <span>ยินดีคืนเงิน</span>
            <p>สามารถขอคืนสินค้าภายใน 30 วัน</p>
        </div>
        <div class="chat">
            <i class="fa-regular fa-comment"></i>
        </div>
    </section>
    
    

    <footer>
        <p>
            ขอบคุณ <i class="fa fa-heart"></i>
            
        </p>
    </footer>


    <!--jQuery------>
    <script src="../js/jQuery.js"></script>
    <!--script---->
    <script type="text/javascript">
        /*------------alert----------*/
        function Add_alert(){
            alert("ทำการเพิ่มสินค้าเรียบร้อยแล้ว");
        }

        /*For-fix-menu-when-scroll---------------*/
        $(window).scroll(function(){
            if($(document).scrollTop() > 50){
                $('.navigation').addClass('fix-nav')
            }
            else{
                $('.navigation').removeClass('fix-nav')
            }
        })
        /*For-responsive-menu*/
        $(document).ready(function(){
            $('.toggle').click(function(){
                $('.toggle').toggleClass('active')
                $('.navigation').toggleClass('active')
            })
        })
           
    </script>
    <script src="../Home/main.js"></script>

</body>
</html>