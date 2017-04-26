<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>Place for Sounds - Contact me</title>
  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    
<body id="home" data-spy="scroll" data-target=".navbar" data-offset="50">
   
    <?php
		if (isset($_POST['submit'])) {
		$error = "";
 
		if (!empty($_POST['name'])) {
		$name = $_POST['name'];
		} else {
		$error .= "You didn't type in your name. <br />";
		}
 
		if (!empty($_POST['email'])) {
		$email = $_POST['email'];
		  if (!preg_match("/^[_a-z0-9]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)){ 
		  $error .= "The e-mail address you entered is not valid. <br/>";
		  }
		} else {
		$error .= "You didn't type in an e-mail address. <br />";
		}
 
		if (!empty($_POST['message'])) {
		$message = $_POST['message'];
		} else {
		$error .= "You didn't type in a message. <br />";
		}
 
		if(($_POST['code']) == $_SESSION['code']) { 
		$code = $_POST['code'];
		} else { 
		$error .= "The captcha code you entered does not match. Please try again. <br />";    
		}
 
		if (empty($error)) {
		$from = 'From: ' . $name . ' <' . $email . '>';
		$to = "my@email.com";
		$subject = "New contact form message";
		$content = $name . " has sent you a message: \n" . $message;
		$success = "<h3>Thank you! Your message has been sent!</h3>";
		mail($to,$subject,$content,$from);
		}
		}
		?>
    
 <!---------NAVIGATION BAR----------->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Place for Sounds</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home">HOME</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#gear">GEAR</a></li>
        <li><a href="#music">MUSIC</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">PROJECTS
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Ongoing</a></li>
            <li><a href="#">Finished</a></li>
          </ul>
        </li>
          <li><a href="#music">CONTACT</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>    
  <!---------NAVIGATION BAR----------->
     <!---------NAVIGATION BAR----------->
     <!---------NAVIGATION BAR----------->
    <br><br>
    <div id="top" class="container-fluid bg-2">
        <h1>P L A C E</h1>
        <h1>F O R </h1>
        <h1>S O U N D S</h1>
        <h2>Chris Badenoch's Personal Music Site</h2>
    </div>

       
 <!------CONTACT ME FORM ---->
    <div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
        <?php
			if (!empty($error)) {
			echo '<p class="error"><strong>Your message was NOT sent<br/> The following error(s) returned:</strong><br/>' . $error . '</p>';
			} elseif (!empty($success)) {
			echo $success;
			}
		?>
        			<form action="contact.php" method="post">
			
				<label>Name:</label>
				<input type="text" name="name" value="<?php if ($_POST['name']) { echo $_POST['name']; } ?>" />
	
				<label>Email:</label>
				<input type="text" name="email" value="<?php if ($_POST['email']) { echo $_POST['email']; } ?>" />
				
				<label>Message:</label><br />
				<textarea name="message" rows="20" cols="20"><?php if ($_POST['message']) { echo $_POST['message']; } ?></textarea>
				
				<label><img src="captcha.php"></label>
				<input type="text" name="code"> <br /> 
 
				<input type="submit" class="submit" name="submit" value="Send message" />
				
			</form>
  <p class="text-center"><em>For general enquiries</em></p>
  <div class="row test">
    <div class="col-md-4">
      <p>Fan? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Totnes, Devon</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +44 7530 701808</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: chrisbadenoch@hotmail.co.uk</p> 
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div> 
    </div>
  </div>      
</div>

<!----------FOOTER----------------->
    <footer class="text-center">
  <a class="up-arrow" href="#home" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
        <p>©Copyright 2017 Place for Sounds. All rights reserved. Site designed by <a href="https://www.facebook.com/jacky.cheung.733">Jacky Cheung</a></p>
        <iframe allowtransparency="true" scrolling="no" frameborder="no" src="https://w.soundcloud.com/icon/?url=http%3A%2F%2Fsoundcloud.com%2Fcbadenoch&color=black_white&size=32" style="width: 32px; height: 32px;"></iframe>
</footer>

<script>
$(document).ready(function(){
    // Initialize Tooltip
    $('[data-toggle="tooltip"]').tooltip(); 
})
</script>
  
<!------------SCROLLING SCRIPT-------->
    <script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#home']").on('click', function(event) {

  // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 750, function(){

      // Add hash (#) to URL when    done scrolling (default click behavior)
      window.location.hash = hash;
      });
    } // End if 
  });
})
</script>

</body>
</html>