<section class="transfertitle-form">
<title>Title Transfer Application</title>
	<h2 style = "text-align:left">Title Trasfer Application </h2>
	<h2 style = "text-align:left">Please provide the following information</h2>
	<div class="transfertitle-form-form">
		<form action="includes/transfertitle.inc.php" method="post">
			<p>
				<input type="text" name="sellerFName" placeholder="Seller's Full Name">
			</p>
			<p>
				 <input type="text" name="sellerAddr" placeholder="Seller's Address">
			</p>
			<p>
				<input type="text" name="sellerCity" placeholder="Seller's City">
			</p>
			<p>
				<input type="text" name="sellerSt" placeholder="Seller's State">
			</p>
			<p>	
				<input type="text" name="sellerZip" placeholder="Seller's Zip">
			</p>
			
			<br><br>
			
			<p>
				<input type="text" name="buyerFName" placeholder="Buyer's Full Name">
			</p>
			<p>
				<input type="text" name="buyerAddr" placeholder="Buyer's Address">
			</p>
			<p>
				<input type="text" name="buyerCity" placeholder="Buyer's City">
			</p>
			<p>	
				<input type="text" name="buyerSt" placeholder="Buyer's State">
			</p>
			<p>
				<input type="text" name="buyerZip" placeholder="Buyer's Zip">
			</p>
			
			<br><br>
			
			<p>
				<input type="text" name="dateOfSale" placeholder="Date of Sale">
			</p>
			<p>	
				<input type="text" name="amtOfSale" placeholder="Amount of Sale">
			</p>
			<p>
				<input type="text" name="mileage" placeholder="Mileage (at time of sale)">
			</p>
			<p>
				<input type="text" name="make" placeholder="Make">
			</p>
			<p>	
				<input type="text" name="model" placeholder="Model">
			</p>
			<p>
				<input type="text" name="year" placeholder="Year">
			</p>
			<p>
				<input type="text" name="color" placeholder="Color">
			</p>
			<p>
				<input type="text" name="vehicle_classification" placeholder="Vehicle Classification">
			</p>
			
			<p>
				<input type="text" name="vin" placeholder="VIN">
			</p>			
				<button type="submit" name="submit">Transfer Title</button>
		</form>
	</div>
	<?php
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "emptyinput") {
			echo "<p>Fill in all fields!</p>";
		}
		else if ($_GET["error"] == "stmtfailed") {
			echo "<p>Something went wrong!</p>";
		}
		else if ($_GET["error"] == "none") {
			echo "<p>You have signed up!</p>";
		}
    }
  ?>
</section>
