<!DOCTYPE html>
<html>
<head>
	<title>Arduino Esp32</title>
	<style>
		body {
			background-color: #cfe0ff;
			margin: 0;
			padding: 0;
		}
		#banner {
			background-color: #4c6aff;
			color: white;
			text-align: center;
			padding: 15px;
			border: none;
  font-family: Verdana, sans-serif;
		}
		#content {
			margin-top: 300px;
			text-align: center;
			margin-left: 25%;
			font-size: 36px;
			font-weight: bold;
		}
		#input_text {
			margin-top: 20px;
			margin-left: 1%;
			width: 250px;
			height: 30px;
			border-radius: 15px;
			border: none;
			padding: 5px;
			background-color: #f5f5f5;
			box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
			font-family: sans-serif;
			font-size: 18px;
			color: #666;
			outline: none;
		}

		#input_text:focus {
			box-shadow: 2px 2px 5px rgba(76, 106, 255, 0.5);
		}
		#submit_button {
			margin-top: 10px;
			margin-left: 1%;
			padding: 8px 16px;
			background-color: #4c6aff;
			color: white;
			border: none;
			border-radius: 20px;
			font-size: 18px;
			cursor: pointer;
			box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
		}
		#submit_button:hover {
			background-color: #3d53a3;
		}
		#status_image {
			margin-right: 10%;
			margin-top: -100px;
			float: left;
		}

		h1 {
			margin: 0;
			font-size: 48px;
		}
	</style>
</head>
<body>
	<div id="banner">
		<h1>OBJLED</h1>
	</div>
	<div id="content">



<?php
		
			$servername = "localhost";
			$username = "";
			$password = "";
			$dbname = "oggetti";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			if (isset($_GET["input_text"])) {
				$input_text = $_GET["input_text"];

				// Query to get the last inserted name
				$sql = "SELECT nome FROM nomi ORDER BY id DESC LIMIT 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$last_name = $row["nome"];

					if ($input_text == $last_name) {
						echo "<img src='http://localhost/foto/spunta.png' id='status_image' class='status_image' width='360' height='360'>";
						    echo "<audio autoplay><source src='http://localhost/audio/corretto.mp3' type='audio/mpeg'></audio>";
						    echo "<p class='status_text' style='color: green;'>Oggetto corretto!</p>";

		


					} else {
						echo "<img src='http://localhost/foto/xrossa.png' id='status_image' class='status_image' width='360' height='360'>";
						 echo "<audio autoplay><source src='http://localhost/audio/sbagliato.mp3' type='audio/mpeg'></audio>";
						    echo "<p class='status_text' style='color: red;'>Oggetto sbagliato, riprova!</p>";




					}
				}
			}

			$conn->close();
			

		?>
		<form>
			<label for="input_text">Come si chiama l'oggetto?</label><br>
			<input type="text" id="input_text" name="input_text" class="text_input"><br>
			<input type="submit" value="Invia" id="submit_button">
		</form>
	</div>
</body>
</html>
