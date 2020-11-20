<?php
session_start();
if (empty($_POST['captcha_code'])){
$fname = $lname = $addr = $city = $st = $zip = $ph = $vin = "";

    print <<<END
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>New Title Application</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<h2 style = "text-align:left">New Title Application </h2>
	<h2 style = "text-align:left">Please provide the following information</h2>
	<div align="left" style="width:600px;">
		<form name = "dmv" action = "newtitle.php" method = "post">
			<p>
				First Name: <input type="text" name="fname" value = "$fname" required/>
			</p>
			<p>
				Last Name: <input type="text" name="lname" value = "$lname" required/>
			</p>
			<p>
				Address Line 1: <input type="text" name="addr" value = "$addr" required/>
			</p>
			<p>
		
				City: <input type="text" name="city" value = "$city" required/>
			</p>
			<p>
				State: <input type="text" name="st" value = "$st" required/>
			</p>
			<p>
				Zip Code: <input type="text" name="zip" value = "$zip" required/>
			</p>
			<p>
				VIN: <input type="text" name="vin" value = "$vin" required/>
			</p>
			<p>
				 Phone:<input type="text" name="ph" value = "$ph" required/>
			</p>
			<p>
				<input type="reset" name="reset" value="clear"/.>
				&nbsp; &nbsp;
			</p>
	</div>
		


END;
print <<< EOT2
<img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image" />
<br>Enter above code: <input type="text" name="captcha_code" size="10" maxlength="6" /><br>
<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Try A Different Image ]</a>
<br><br><input type="submit" value="Apply" name="submitbtn">
</form>
</body>
</html>
EOT2;
}
else {


	if(isset($_POST['submit']))
	{
		$_SESSION['fname'] = $_POST['fname'];
		$_SESSION['lname'] = $_POST['lname'];
		$_SESSION['addr'] = $_POST['addr'];
		$_SESSION['city'] = $_POST['city'];
		$_SESSION['st'] = $_POST['st'];
		$_SESSION['zip'] = $_POST['zip'];
		$_SESSION['vin'] = $_POST['vin'];
		$_SESSION['ph'] = $_POST['ph'];
	
	
	}
	include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';

	$securimage = new Securimage();
	if ($securimage->check($_POST['captcha_code']) == false) {
		print "Sorry, incorrect code!";
		print '<form name="return" action="newtitle.php" method="POST">';
		print '<input type="submit" name="subbtn" value="Try Again">';
		print "</form>";	
	}else{
		
		function clean($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = strtoupper($data);
			$data = implode("",explode("\\",$data));
			return $data;
		}
		$fname = clean($_POST["fname"]);
		$lname = clean($_POST["lname"]);
		$addr = clean($_POST["addr"]);
		$city = clean($_POST["city"]);
		$st = clean($_POST["st"]);
		$zip = clean($_POST["zip"]);
		$vin = clean($_POST["vin"]);
		$ph = clean($_POST["ph"]);
		
		
		//require "C:\\XAMPP\includes\dbconnect7.php";
		require_once "./includes/dbh.inc.php";
		
		$sql = "INSERT INTO newtitle SET fname = '".$fname."', lname = '".$lname."', addr = '".$addr."', city = '".$city."', st = '".$st."', zip = '".$zip."', vin = '".$vin."', ph = '".$ph."'";

		mysqli_query($conn,$sql);

		session_unset();
		
		echo "Title application has been submitted";
		
		print <<<END
		<p>
			<a href="vehicleregistration.php">Return to Login</a>
		</p>
		END;	
	}

}

//end of form************************************ 	
?>