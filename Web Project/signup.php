<?php
	if (isset($_POST["signUpButton"])) {
		if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pass"])){
			$connection=@new mysqli("localhost", "root","","gymcenter");

			$name = $connection->real_escape_string($_POST["name"]); 			//to prevent sql injection
			$email = $connection->real_escape_string($_POST["email"]);
			$password = sha1($connection->real_escape_string($_POST["pass"]));


			$query="INSERT INTO `members` (`name`, `email`, `password`) VALUES ('$_POST[name]', '$_POST[email]', SHA1('$_POST[pass]'))";
			$connection->query($query);
			$connection->close();

			header('location:home.html');
		}
	}
	elseif(isset($_POST["signInButton"])){
		if(isset($_POST["pass"]) && isset($_POST["email"])){
			$pass=$_POST["pass"];
			$email=$_POST["email"];
	
			$connection= @new mysqli("localhost", "root","","gymcenter");
			$query="SELECT * FROM `members`";
			$result=$connection->query($query);
	
			for($i=0;$i<$result->num_rows;$i++){
				$row=$result->fetch_array();
				if(($email)==$row['email'] && sha1($pass)==$row['password']){
					?>
					<script>
						alert("Logged In Successfully");
						window.location.href = 'home.html';
					</script>
					<?php
				}
			}
			?>
			<script>
				alert("Invalid Username or Password!");
			</script>
			<?php
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>BASE</title>
  		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<link rel="icon" type="image/png" sizes="16x16" href="images/basee.png">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
	</head>
	
	<body>
		<section id="header">
			<a href="home.html"><img src="images/base.png" class="logo" alt=""></a>
			<div>
				<ul id="navbar">
					<li><a href="home.html">HOME</a></li>
					<li><a href="plans.html">PLANS</a></li>
					<li><a href="trainers.html">TRAINERS</a></li>
					<li><a href="classes.html">CLASSES</a></li>
					<li><a href="shop.html">SHOP</a></li>
					<li><a href="recovery.html">RECOVERY CENTER</a></li>
					<li><a href="contact.php">CONTACT US</a></li>
				</ul>
				<ul id="navbar2">
					<li><a class="active" href="signup.php"><span></span> Sign Up</a></li>
				</ul>
			</div>
		</section>

		<section id="background-image">
			<div class="form-box">
				<h1 id="title">Sign Up</h1>
				<form action="signup.php" method="post">
					<div class="input-group">
						<div class="input-field" id="nameField">
							<i class="fa-solid fa-user"></i>
							<input type="text" placeholder="Name" id="name" name="name" required autocomplete="off">
						</div>
						<div class="input-field">
							<i class="fa-solid fa-envelope"></i>
							<input type="email" placeholder="Email" name="email" required autocomplete="off">
						</div>
						<div class="input-field">
							<i class="fa-solid fa-lock"></i>
							<input type="password" placeholder="Password" name="pass" required autocomplete="off">
						</div>
					</div>
					<div class="button-field">
						<button type="submit" name="signUpButton" id="signUpButton">Sign Up</button>
						<button type="submit" name="signInButton" id="signInButton" class="disable">Sign In</button>
					</div>
				</form>
			</div>

		</section>
		
		
		<script>
			let signUpButton=document.getElementById("signUpButton");
			let signInButton=document.getElementById("signInButton");
			let nameField=document.getElementById("nameField");
			let title=document.getElementById("title");

			signInButton.onclick=function(){
				nameField.style.maxHeight="0";
				title.innerHTML="Sign In";
				signUpButton.classList.add("disable");
				signInButton.classList.remove("disable");
				document.getElementById("name").removeAttribute("required");
			}
			signUpButton.onclick=function(){
				nameField.style.maxHeight="60px";
				title.innerHTML="Sign Up";
				signUpButton.classList.remove("disable");
				signInButton.classList.add("disable");
			}
			
		</script>

</body>
</html>