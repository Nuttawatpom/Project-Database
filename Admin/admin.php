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
    <title>Admin</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="shortcut icon" href="../img/Logo.png">
    <link rel="stylesheet" href="./admin.css">
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
            <a class="logo">
                <img src="../img/Logo.png" height="100" width="100">
            </a>
            <!--Menu-Icon------------>
            <div class="toggle"></div>
            <!--menu------->
            <ul class="menu">
                <li><a href="../admin/home.php"><b>หน้าหลัก</b></a></li>
                <li><a href="../admin/manage.php"><b>จัดการคำสั่งซื้อ</b></a>
                </li>
                <li><a href="../admin/admin.php"><b>กล่องข้อความ</b></a></li>
            </ul>
            <!---right-menu------->
            <div class="right-menu">
                <div class="dropdown">
                    <a href="" class="address">
                        <i class="fas fa-address-book"></i>
                    </a>
                    <div class="dropdown-content" >
                        <form action='../db_connect/logout.php' method='POST'>
                            <a href="../login/index.php">Logout</a>
                        </form>
                    </div>
                </div>
                ADMIN ACCOUNT
            </div>
        </div>
    </nav>
    
    <p style="font-size: 26px; margin-top: 70px; text-align: center; font-family: ekkamai new; font-weight: bold;">กล่องข้อความปัญหาจากผู้ใช้งาน</p>
    <table class="content-table">
        <thead>
          <tr>
            <th>ลำดับ</th>
            <th>User ID</th>
            <th>ชื่อผู้แจ้งปัญหา</th>
            <th>เบอร์โทรติดต่อ</th>
            <th>อีเมลล์</th>
            <th>ปัญหา</th>
          </tr>
        </thead>
        <tbody>
            <?php
            include('connect.php');

            $current_user = $_SESSION['user_id'];
            $u = "SELECT * FROM contract WHERE u_id = '$current_user'";
            $user = mysqli_query($conn,$u);

            $sql = "SELECT * FROM contract";
            $result = mysqli_query($conn,$sql);

            if($user){
                while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row["contract_id"]; ?> </td>
                    <td><?php echo $row["u_id"]; ?></td>
                    <td><?php echo $row["c_name"]; ?></td>
                    <td><?php echo $row["c_phone"]; ?></td>
                    <td><?php echo $row["c_email"]; ?></td>
                    <td><span><?php echo $row["topic"]; ?></span><br>
                        <a href="#" id="open" onclick = "show_modal(id)">รายละเอียด</a>
                </tr>
                <?php
                }
            }
        ?>
        </tbody>
    </table>

    <div class="modal-container" id="modal_container">
        <div class="modal">
        <?php
            include('connect.php');

            $current_user = $_SESSION['user_id'];
            $u = "SELECT * FROM contract";
            $user = mysqli_query($conn,$u);

            $sql = "SELECT * FROM contract";
            $result = mysqli_query($conn,$sql);

            if($user){
                while($row = $result->fetch_assoc()){
                ?>
                    <h1><?php echo $row["topic"]; ?> </h1></td>
                    <p><?php echo $row["detail"]; ?></p>
                <?php
                }
            }
        ?>
            <button id="close">
                ปิด
            </button>
        </div>
    </div>


    <!--jQuery------>
    <script src="../js/jQuery.js"></script>
    <!--script---->
    <script type="text/javascript">
        function show_modal(id){
                /*--------------pop-up-------------------*/
            const open = document.getElementById(id)
            const modal_container = document.getElementById('modal_container')
            const close = document.getElementById('close')

            open.addEventListener('click', () => {
                modal_container.classList.add('show');
            });

            close.addEventListener('click', () => {
                modal_container.classList.remove('show')
            })
        }
        /*--------------pop-up-------------------*/
        const open = document.getElementById('open')
        const modal_container = document.getElementById('modal_container')
        const close = document.getElementById('close')

        open.addEventListener('click', () => {
            modal_container.classList.add('show');
        });

        close.addEventListener('click', () => {
            modal_container.classList.remove('show')
        })

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