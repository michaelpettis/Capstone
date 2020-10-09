<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<h1>Register Vehicle</h1>

<?php
$VIN = "";
$model = "";
$modelYear = "";
$milage = "";
$new = "";
$used = "";
$colors = "";
$trim = "";
$licensePlate = "";
$vc = "";
$cInsurance = "";

function clean($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = strtoupper($data);
	$data = implode("",explode("\\",$data));
	return $data;
}

if(isset($POST['Register'])){
	$VIN = clean($_POST['VIN']);
	$Model = clean($_POST['Model']);
	$ModelYear = clean($_POST['ModelYear']);
	$Milage = clean($_POST['Milage']);
	$NewUsed = clean($_POST['NewUsed']);
	$Color = clean($_POST['Color']);
	$Trim = clean($_POST['Trim']);
	$LicensePlate = clean($_POST['LicensePlate']);
	$VehicleClasiffication = clean($_POST['VehicleClasiffication']);
	$CheckInsurance = clean($_POST['CheckInsurance']);

	if($flag == false){
		print 'Your information has been submitted, thank you.';
	}elseif($flag == true){
		print 	<<<END
	
			<div align="left" style="width:364px;">
			<form name = "Register Vehicle" action = "registration_vehicle_form.php" method = "post">
			<p>
				VIN: <input type="text" name="VIN" value="$VIN" required/>
			</p>
			<p>
				Model: <input type="text" name="model" value="$model" required/>
			</p>
			<p>
				Model Year: <input type="number" name="modelYear" value="$modelYear" required/>
			</p>
			<p>
				Milage: <input type="number" name="milage" value="$milage" required/>
			</p>
			<p>
				New or Used:<input type="radio" id="new" name="NewUsed" value="$new"/><label for="new">New</label> <input type="radio" id="used" name="NewUsed" value="$used"/><label for="used">Used</label>
				
			</p>
			<p>
				Color: <select id="colors" name="colors" required/>
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
					<option value="other">other</option>
				</select>
				other colors <input type="text" name="colors">	

			</p>
			<p>
				Trim: <input type="text" name="trim" value="$trim" required/>
			</p>
			<p>
				License Plate: <input type="text" name="license plate" value="$licensePlate" required/>
			</p>
			<p>
				Vehicle Classification: <input type="text" name="vehicle classification" value="$vc" required/>
			</p>
			<p>
				Check Insurance: <input type="text" name="check insurance" value="$cInsurance" required/>
			</p>
			<p>
				<input type="reset" name="clear" value="Clear"/.>
				&nbsp; &nbsp;
				<input type="submit" name="Register" value="Register"/>
			</p>
			</form>
			</div>
			</body>
			</html>
	
		END;
	}
}else{ 
	print 	<<<END
	
			<div align="left" style="width:364px;">
			<form name = "Register Vehicle" action = "registration_vehicle_form.php" method = "post">
			<p>
				VIN: <input type="text" name="VIN" value="$VIN" required/>
			</p>
			<p>
				Model: <input type="text" name="model" value="$model" required/>
			</p>
			<p>
				Model Year: <input type="number" name="modelYear" value="$modelYear" required/>
			</p>
			<p>
				Milage: <input type="number" name="milage" value="$milage" required/>
			</p>
			<p>
				New or Used:<input type="radio" id="new" name="NewUsed" value="$new"/><label for="new">New</label> <input type="radio" id="used" name="NewUsed" value="$used"/><label for="used">Used</label>
				
			</p>
			<p>
				Color: <select id="colors" name="colors" required/>
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
					<option value="other">other</option>
				</select>
				other colors <input type="text" name="colors">	

			</p>
			<p>
				Trim: <input type="text" name="trim" value="$trim" required/>
			</p>
			<p>
				License Plate: <input type="text" name="license plate" value="$licensePlate" required/>
			</p>
			<p>
				Vehicle Classification: <input type="text" name="vehicle classification" value="$vc" required/>
			</p>
			<p>
				Check Insurance: <input type="text" name="check insurance" value="$cInsurance" required/>
			</p>
			<p>
				<input type="reset" name="clear" value="Clear"/.>
				&nbsp; &nbsp;
				<input type="submit" name="Register" value="Register"/>
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