<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Send Booking Request</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<style>
	* {
		box-sizing: border-box;
		font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
		font-size: 16px;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}

	body {
		background-color: rgb(50, 146, 184);
		margin: 0;
		overflow-y: scroll;
	}

	.UserSignUp {
		width: 400px;
		background-color: #ffffff;
		box-shadow: 20px rgba(88, 88, 102, 0.3);
		margin: 100px auto;
		border-radius: 50px;
		border: 10px;
		font-size: 10px;
		height: 62vh;
		position: relative;
		top: 10px;
	}

	.UserSignUp h1 {
		text-align: center;
		color: rgb(9, 52, 69);
		font-size: 24px;
		padding: 20px 0 20px 0;
		border-bottom: 1px solid #dee0e4;
	}

	.UserSignUp form {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		padding-top: 20px;
		border-radius: 60px;
	}

	.UserSignUp .uname {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 50px;
		height: 50px;
		background-color: rgb(9, 52, 69);
		color: #ffffff;
		border-radius: 40px;
		position: relative;
		right: 7px;
	}

	.UserSignUp .location {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 50px;
		height: 50px;
		background-color: rgb(9, 52, 69);
		color: #ffffff;
		border-radius: 40px;
		position: relative;
		right: 7px;
	}

	.UserSignUp .mail {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 50px;
		height: 50px;
		background-color: rgb(9, 52, 69);
		color: #ffffff;
		border-radius: 40px;
		position: relative;
		right: 7px;
	}

	.UserSignUp .pass {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 50px;
		height: 50px;
		background-color: rgb(9, 52, 69);
		color: #ffffff;
		border-radius: 40px;
	}

	.UserSignUp .cpass {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 50px;
		height: 50px;
		background-color: rgb(9, 52, 69);
		color: #ffffff;
		border-radius: 40px;
	}

	.UserSignUp form input[type="text"],
	.UserSignUp form input[type="email"] {
		width: 310px;
		height: 50px;
		border: 3px solid rgb(9, 52, 69);
		margin-bottom: 20px;
		padding: 0 15px;
		border-radius: 60px;
	}

	.UserSignUp form input[type="date"] {
		width: 310px;
		height: 50px;
		border: 3px solid rgb(9, 52, 69);
		margin-bottom: 20px;
		padding: 0 15px;
		border-radius: 60px;
		position: relative;
		bottom: 30px;
	}

	.UserSignUp .opt {
		width: 310px;
		height: 50px;
		border: 3px solid rgb(9, 52, 69);
		margin-bottom: 20px;
		padding: 0 15px;
		border-radius: 60px;
		position: relative;
		bottom: 30px;
	}

	.UserSignUp form input[type="submit"] {
		width: 100%;
		padding: 15px;
		margin-top: 20px;
		background-color: rgb(9, 52, 69);
		border: 0;
		cursor: pointer;
		font-weight: bold;
		color: #ffffff;
		transition: background-color 0.2s;
		position: relative;
		bottom: 50px;
	}

	.UserSignUp form input[type="submit"]:hover {
		background-color: rgb(17, 79, 104);
		transition: background-color 0.2s;
	}

	input[type="text"],
	input[type="email"],
	input[type="password"] {
		position: relative;
		bottom: 30px;
	}

	label {
		position: relative;
		bottom: 30px;
	}

	.back {
		display: inline-block;
		padding: 15px;
		margin-top: 20px;
		background-color: rgb(9, 52, 69);
		border: 0;
		cursor: pointer;
		font-weight: bold;
		color: #ffffff;
		transition: background-color 0.2s;
		position: relative;
		bottom: 50px;
		width: 100%;
		text-align: center;
	}

	.back:hover {
		background-color: rgb(17, 79, 104);
		transition: background-color 0.2s;
	}

	a.back:visited {
		color: #ffffff;
	}
</style>

<body>
	<?php

	require 'dbConfig.php';
	$sno = $_GET['docid'];

	?>

	<div class="UserSignUp">
		<h1>Send Booking Request</h1>
		<form action="sendbookrequest.php<?php echo '?docid=' . $sno; ?>" method="post" autocomplete="on">

			<label for="email" class="mail">
				<i class="fas fa-envelope"></i>
			</label>
			<input type="email" name="tomail" placeholder="Doctor's Email" id="email" required>

			<label for="email" class="mail">
				<i class="fas fa-calendar"></i>
			</label>
			<input type="date" name="date" placeholder="date" id="date" required>


			<label for="email" class="mail"> <i class="fas fa-hourglass"></i></label>

			<select class="opt" name="time" id="apoint" value="Select Time">
				<option class="opt" value="volvo">Select Time</option>
				<option value="9AM to 10AM">9AM to 10AM</option>
				<option value="10AM to 11PM">10AM to 11AM</option>
				<option value="11AM to 12PM">11AM to 12PM</option>
				<option value="12PM to 1PM">12PM to 1PM</option>
				<option value="1PM to 2PM">1PM to 2PM</option>
				<option value="2PM to 3PM">2PM to 3PM</option>
				<option value="3PM to 4PM">3PM to 4PM</option>
				<option value="4PM to 5PM">4PM to 5PM</option>

			</select>


			<input type="submit" name="signup" value="Send Request" />
			<a class="back" href="hppatient.php">Back</a>

		</form>
	</div>




</body>

</html>