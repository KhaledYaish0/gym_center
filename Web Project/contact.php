<?php   
		if(isset($_POST["sendMessage"])){
			$connection=@new mysqli("localhost", "root","","gymcenter");

			$first = $connection->real_escape_string($_POST["first_name"]); 			//to prevent sql injection
			$last = $connection->real_escape_string($_POST["last_name"]);
			$email = $connection->real_escape_string($_POST["email"]);
            $message = $connection->real_escape_string($_POST["message"]);
            
            $query="INSERT INTO `contact` (`mail`, `first`, `last`, `message`) VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[email]', '$_POST[message]')";
			$connection->query($query);
			$connection->close();

			header('location:home.html');
		}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASE</title>
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="creators.css">
    <link rel="icon" type="image/png" sizes="16x16" href="images/basee.png">
    <style>
        #header{
        display: flex;
        /* position: sticky;
        top: 0; */
        /* align-items: center; */
        justify-content: space-between;
        /* padding: 20px 80px; */
        background: black;
        }
        #header div{
            display: flex;
        }
        #header img{
            padding: 10px 0 10px 0;
            width: 100px;
            height: 100px;
        }
        #navbar{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #navbar li{
            list-style: none;
            padding: 0 20px;
        }
        #navbar li a{
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            color: white;
            text-align: left
        }
        #navbar li a:hover{
            color: #ffc43a;
            transition: 0.3s ease;
        }
        #navbar li a.active{
            color: #574f8a;
        }

        #navbar2{
            padding-top: 40px;
            padding-left: 90px;
            align-items: right;
            justify-content: right;
        }
        #navbar2 li{
            list-style: none;
            padding: 0 20px;
        }
        #navbar2 li a{
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            color: white;
            text-align: right;
        }
        #navbar2 li a:hover{
            color: #ffc43a;
            transition: 0.3s ease;
        }
        #navbar2 li a.active{
            color: #574f8a;
        }
    </style>
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
                <li><a class="active" href="contact.html">CONTACT US</a></li>
            </ul>
            <ul id="navbar2">
                <li><a href="signup.php"><span></span> Sign Up</a></li>
            </ul>
        </div>

    </section>

    <main>
        <div class="title">Contact us</div>
        <div class="title-info">We'll get back to you soon!</div>

        <form method="post" class="form">
            <div class="input-group">
                <input type="text" name="first_name" id="first-name" placeholder="First name" required>
                <label for="first-name">First name</label>
            </div>
            
            <div class="input-group">
                <input type="text" name="last_name" id="last-name" placeholder="Last Name" required>
                <label for="last-name">Last name</label>
            </div>

            <div class="input-group">
                <input type="email" name="email" id="email" placeholder="e-mail" required>
                <label for="e-mail">e-mail</label>
            </div>

            <div class="textarea-group">
                <textarea name="message" id="message" rows="5" placeholder="Message"></textarea required>
                <label for="message">Message</label>
            </div>

            <div class="button-div">
                <button name="sendMessage" type="submit">Send</button>
            </div>
        </form>
    </main>
</body>
</html>