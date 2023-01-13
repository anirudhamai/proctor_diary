<html>
  <head>
    <meta charset="utf-8">
    <title>Form</title>
    <style>
        *{
	padding: 0;
	margin: 0;
}
body{
  background: url(http://wrbbradio.org/wp-content/uploads/2016/10/grey-background-07.jpg) no-repeat center fixed;
  background-size: cover;
}
.container{
	background: #2d3e3f;
	width: 350px;
	height: 480px;
	padding-bottom: 20px;
	position: absolute;
	top:50%;
	left: 50%;
	transform: translate(-50%, -50%);
	margin: auto;
  padding: 70px 50px 20px 50px;
}
.fl{
	float: left;
  width: 110px;
  line-height: 35px;
}
.fontLabel{
  color: white;
}
.fr{
	float: right;
}
.clr{
	clear: both;
}
.box{
	width: 360px;
	height: 35px;
	margin-top: 10px;
	font-family: verdana;
	font-size: 12px;
}
.textBox{
	height: 35px;
	width: 190px;
	border: none;
  padding-left: 20px;
}
.new{
  float: left;
}
.iconBox{
	height: 35px;
	width: 40px;
	line-height: 38px;
	text-align: center;
  background: #ff6600;
}
.submit{
	float: right;
	border: none;
	color: white;
	width: 110px;
	height: 35px;
	background: #ff6600;
	text-transform: uppercase;
  cursor: pointer;
}
 .buttons
 {
    position: relative;
    top: 50px;
 }
 .extra
 {
    font-size: 12px;
 }
 </style>
  </head>
  <body>
  <?php 
    session_start();
    if(isset($_SESSION['error'])){
    ?>
    <div class="alert"><h3> <?php
    echo $_SESSION['error'];
    ?></h3></div>  <?php
    unset($_SESSION['error']);
    } 
    ?></h3>
    <!-- Body of Form starts -->
  	<div class="container">
      <form action="diarysubmit.php" method="POST" autocomplete="on">
        <!--First name-->
    		<div class="box">
          <label for="dob" class="fl fontLabel">Date of birth: </label>
    			<div class="fr">
    				<input type="date" name="dob" placeholder="D.O.B"class="textBox" autofocus="on" required>
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--First name-->
        <!--Second name-->
    		<div class="box">
          <label for="road" class="fl fontLabel"> Street number: </label>
			<div class="fr">
    				<input type="text" required name="road" placeholder="Street" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Second name-->
    		<!---Phone No.------>
    		<div class="box">
          <label for="phone" class="fl fontLabel"> Phone number: </label>
    		<div class="fr">
    					<input type="text" required name="phone" maxlength="10" placeholder="Phone No." class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---Phone No.---->
    		<!---Email ID---->
    		<div class="box">
          <label for="city" class="fl fontLabel"> City: </label>
    			
    			<div class="fr">
    					<input type="text" required name="city" placeholder="City" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!--Email ID----->
           <center> <h3 style="color: white; font-family: verdana; text-decoration: underline; margin:8px">Parents info</h3></center>
    		<!---parent------>
    		<div class="box">
          <label for="parent" class="fl fontLabel"> Name: </label>
    			
    			<div class="fr">
    					<input type="text" required name="parent" placeholder="Parent's name" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<!---parent---->
            <!--Parent occupation-->
            <div class="box">
          <label for="occ" class="fl fontLabel">  occupation: </label>
    			
    			<div class="fr">
    					<input type="text" required name="occ" placeholder="Parent's occupation" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
            <!--Parent occupation-->
            <!--Parent phone number-->
            <div class="box">
          <label for="phonep" class="fl fontLabel"> Phone number: </label>
    			
    			<div class="fr">
    					<input type="text" required name="phonep" maxlength="10" placeholder=" Parent's phone No." class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
            <!--Parent phone number-->
    		
    		<!---Submit Button------>
    		<div class="box" style="background: #2d3e3f">
    				<input type="Submit" name="diar" class="submit" value="SUBMIT">
    		</div>
      </form>
      <div class="buttons">
      <a href="addcourse.php"><button class="submit extra" style=" float: left;height: 45px;">Add course details</button></a>    
      <a href="add.php"><button class="submit extra" style=" float: right ; height: 48px;">Add internship details </button></a>
        </div>
  </div>
  </body>
</html>