<?php
    session_start();
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>เข้าสู่ระบบเพื่อช้อปออนไลน์</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="shortcut icon" href="../img/Logo.png">
  <link rel="stylesheet" href="./style.css">
  <script defer src="script.js"></script>

</head>
<body>
	
<!-- partial:index.partial.php -->
<h2>เข้าสู่ระบบ</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="register.php" method="POST">
			<h1>สมัครสมาชิกสำหรับผู้ใช้ใหม่</h1>
			<input type="text" placeholder="Username (6-12 ตัวอักษร)" id="username" name="username" required/>
			<input type="email" placeholder="Email" id="email" name="email" required/>
			<input type="password" placeholder="Password (8-16 ตัวอักษร)" id="password" name="password" required/>
			<input type="text" placeholder="ชื่อ" id="fname" name="fname" required/>
			<input type="text" placeholder="นามสกุล" id="lname" name="lname" required/>			
			<button type="submit" name="reg_user">ลงทะเบียน</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="login.php" method="POST">
			<img src="../img/Logo.png" alt="EzShop" width="150" height="150">
			<h1>เข้าสู่ระบบ</h1>
			<input type="text" placeholder="Username" id="username" name="username" minlength="6" maxlength="12" size="12" required/>
			<input type="password" placeholder="Password (8-16 ตัวอักษร)" id="password" name="password" minlength="8" maxlength="16" size="12" required/>
			<a href="">ลืมรหัสผ่าน?</a>
			<!--<a href="/Home/index.php"><input type =button value="เข้าสู่ระบบ"></a>-->
			<button type = "submit" name="login_user">เข้าสู่ระบบ</button><br>
			<button type = "submit" name="login_admin">เข้าสู่ระบบ (แอดมิน)</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>ยินดีต้อนรับ!</h1>
				<p>หากต้องการเข้าสู่เว็บไซต์ โปรดเข้าสู่ระบบเพื่อใช้งาน</p>
				
				<button class="ghost" id="signIn">เข้าสู่ระบบ</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>สวัสดี!</h1>
				<p>เราคือแหล่งช้อปปิ้งออนไลน์ที่ดีที่สุดสำหรับคุณ</p>
				<button class="ghost" id="signUp">ลงทะเบียน</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		ยินดีต้อนรับ <i class="fa fa-heart"></i>
		
		สู่เว็บไซต์ซื้อของออนไลน์ที่ดีที่สุด!
	</p>
</footer>
<!-- partial -->

  <script  src="./script.js"></script>

</body>
</html>
