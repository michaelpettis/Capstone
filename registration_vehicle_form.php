<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<h1>Register Vehicle</h1>

<?php
require "./includes/dbconnect.php";

$vin = "";
$make = "";
$model = "";
$modelyear = "";
$mileage = "";
$newused = "";
$new = "";
$used = "";
$color = "";
$trim = "";
$license_plate = "";
$vehicle_clasification = "";
$check_insurance = "";

$flag = false;
$lpErr = "";

function clean($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = strtoupper($data);
	$data = implode("",explode("\\",$data));
	return $data;
}

//error handling for License plate
function validateLP($license_plate){
	$count = strlen($license_plate);
	$tw = "6";
	if($count == $tw){
		$flag = false;
	}else{
		$flag = true;
		$lpErr = "Invalid format, license plate is 6 digits";
	}
}

if(isset($_POST['register'])){
	$vin = clean($_POST['vin']);
	$make = clean($_POST['make']);
	$model = clean($_POST['model']);
	$modelyear = clean($_POST['modelyear']);
	$mileage = clean($_POST['mileage']);
	$newused = clean($_POST['newused']);
	$color = clean($_POST['color']);
	$trim = clean($_POST['trim']);
	$license_plate = clean($_POST['license_plate']);
	$vehicle_clasification = clean($_POST['vehicle_clasification']);
	$check_insurance = clean($_POST['check_insurance']);
	
	//error handlings are coming here 
	
	
	if($flag == false){
		//insert data
		$sql1 = "INSERT INTO RegisterVehicle SET vin = '$vin', make = '$make', model = '$model', trim = '$trim', modelyear = '$modelyear', 
		mileage = '$mileage', newused = '$newused', color = '$color', license_plate = '$license_plate', 
		vehicle_clasification = '$vehicle_clasification', check_insurance = '$check_insurance';";
	
		if (mysqli_query($link, $sql1)){
			print <<<END
				<h2> Your information has been submitted, thank you.</h2>
				<p> <button onclick = "document.location='login.inc.php'">Return to login page</button></p>
			END;
		}else {
			echo "Error: " . $sql1 . "<br>" . mysqli_error($link);
		}
		
	}elseif($flag == true){
		print 	<<<END
	
			<div align="left" style="width:600px;">
			<form name = "Register Vehicle" action = "registration_vehicle_form.php" method = "post">
			<p>
				VIN: <input type="text" name="vin" value="$vin" required/>
			</p>
			<p>
				Make: <input type="text" name="make" value="$make" required/>
			</p>
			<p>
				Model: <input type="text" name="model" value="$model" required/>
			</p>
			<p>
				Trim: <input type="text" name="trim" value="$trim" required/>
			</p>
			<p>
				Model Year: <input type="number" name="modelyear" value="$modelyear" required/>
			</p>
			<p>
				Mileage: <input type="number" name="mileage" value="$mileage" required/>
			</p>
			<p>
				New or Used:
				<input type="radio" name="newused" value="new"/><label for="used">New</label> 
				<input type="radio" name="newused" value="used"/><label for="">Used</label>
			</p>
			<p>
				Color: <select id="color" name="color" required/>
					<option value="black">black</option>
					<option value="navy">navy</option>
					<option value="gray">gray</option>
					<option value="white">white</option>
					<option value="brown">brown</option>
					<option value="red">red</option>
					<option value="blue">blue</option>
					<option value="green">green</option>
					<option value="yellow">yellow</option>
					<option value="orange">orange</option>
					<option value="pink">pink</option>
					<option value="purple">purple</option>
					<option value="others">others</option>
				</select>	
			</p>
			<p>
				License Plate: <input type="text" name="license_plate" value="$license_plate" required/> $lpErr
			</p>
			<p>
				Vehicle Classification: <select id="vc" name="vehicle_clasification" required/>
					<option value="1:motorcycle">1:motorcycle</option>
					<option value="2:passenger car">2:passenger car</option>
					<option value="3:pick up, other two-axle fourtire single unit vehicles">3:pick up, other two-axle fourtire single unit vehicles</option>
					<option value="4:two and three axle bus">4:two and three axle bus</option>
					<option value="5:two axle, six tire, single unit truck">5:two axle, six tire, single unit truck</option>
					<option value="6:three axle single unit truck">6:three axle single unit truck</option>
					<option value="7:four or more axle single unit truck">7:four or more axle single unit truck</option>
					<option value="8:four or less axle single trailer truck">8:four or less axle single trailer truck</option>
					<option value="9:five axle single trailer truck">9:five axle single trailer truck</option>
					<option value="10:six or more axle single trailer truck">10:six or more axle single trailer truck</option>
					<option value="11:five or fewer axle multi trailer truck">11:five or fewer axle multi trailer truck</option>
					<option value="12:six axle multi trailer truck">12:six axle multi trailer truck</option>
					<option value="13:seven or more axle multi trailer truck">13:seven or more axle multi trailer truck</option>
					<option value="14:unclassfied vehicle">14:unclassfied vehicle</option>
				</select>
			</p>
			<p>
				Policy Number(Insurance): <input type="text" name="check_insurance" value="$check_insurance" required/>
			</p>
			<p>
				<input type="reset" name="clear" value="Clear"/.>
				&nbsp; &nbsp;
				<input type="submit" name="register" value="Register"/>
			</p>
			</form>
			</div>
			</body>
			</html>
		END;
	}
}else{ 
	print 	<<<END
	
			<div align="left" style="width:600px;">
			<form name = "Register Vehicle" action = "registration_vehicle_form.php" method = "post">
			<p>
				VIN: <input type="text" name="vin" value="$vin" required/>
			</p>
			<p>
				Make: <input type="text" name="make" value="$make" required/>
			</p>
			<p>
				Model: <input type="text" name="model" value="$model" required/>
			</p>
			<p>
				Trim: <input type="text" name="trim" value="$trim" required/>
			</p>
			<p>
				Model Year: <input type="number" name="modelyear" value="$modelyear" required/>
			</p>
			<p>
				Mileage: <input type="number" name="mileage" value="$mileage" required/>
			</p>
			<p>
				New or Used:
				<input type="radio" name="newused" value="new"/><label for="new">New</label> 
				<input type="radio" name="newused" value="used"/><label for="used">Used</label>
			</p>
			<p>
				Color: <select id="color" name="color" required/>
					<option value="black">black</option>
					<option value="navy">navy</option>
					<option value="gray">gray</option>
					<option value="white">white</option>
					<option value="brown">brown</option>
					<option value="red">red</option>
					<option value="blue">blue</option>
					<option value="green">green</option>
					<option value="yellow">yellow</option>
					<option value="orange">orange</option>
					<option value="pink">pink</option>
					<option value="purple">purple</option>
					<option value="others">others</option>
				</select>	
			</p>
			<p>
				License Plate: <input type="text" name="license_plate" value="$license_plate" required/>
			</p>
			<p>
				Vehicle Classification: <select id="vc" name="vehicle_clasification" required/>
					<option value="1:motorcycle">1:motorcycle</option>
					<option value="2:passenger car">2:passenger car</option>
					<option value="3:pick up, other two-axle fourtire single unit vehicles">3:pick up, other two-axle fourtire single unit vehicles</option>
					<option value="4:two and three axle bus">4:two and three axle bus</option>
					<option value="5:two axle, six tire, single unit truck">5:two axle, six tire, single unit truck</option>
					<option value="6:three axle single unit truck">6:three axle single unit truck</option>
					<option value="7:four or more axle single unit truck">7:four or more axle single unit truck</option>
					<option value="8:four or less axle single trailer truck">8:four or less axle single trailer truck</option>
					<option value="9:five axle single trailer truck">9:five axle single trailer truck</option>
					<option value="10:six or more axle single trailer truck">10:six or more axle single trailer truck</option>
					<option value="11:five or fewer axle multi trailer truck">11:five or fewer axle multi trailer truck</option>
					<option value="12:six axle multi trailer truck">12:six axle multi trailer truck</option>
					<option value="13:seven or more axle multi trailer truck">13:seven or more axle multi trailer truck</option>
					<option value="14:unclassfied vehicle">14:unclassfied vehicle</option>
				</select>
			</p>
			<p>
				Policy Number(Insurance): <input type="text" name="check_insurance" value="$check_insurance" required/>
			</p>
			<p>
				<input type="reset" name="clear" value="Clear"/.>
				&nbsp; &nbsp;
				<input type="submit" name="register" value="Register"/>
			</p>
			</form>
			</div>
			</body>
			</html>
		END;
}
?> 


	
</body>
</html>