<?php
	require_once "./includes/dbh.inc.php";
	session_start();
	if(isset($_SESSION['usersId'])){
		echo "Welcome '{$_SESSION['usersId']}'";
	}
?>
<!DOCTYPE html>
<html>
<head>
<style>
input[value="Register A Vehicle"], input[value="Transfer A Title"], input[value="Apply For A New Title"]{
	background-color: #0033cc;
	border: none;
	color: white;
	width: 35ex;
	height: 10ex;
}
header {
  background-color: #0082ff;
  padding: 20px;
  text-align: center;
  font-size: 20px;
  color: white;
  
}
a:link {
  color: white;
  background-color: transparent;
}
a:visited {
  color: white;
  background-color: transparent;
}

* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}


</style>

<img src="/img/HeadLogo.jpg" alt="capstone department of revenue" width="350" height="160">
<header>
<a href="homepage.php">HOME</a> &emsp; &emsp;
<a href="about.html">ABOUT</a> &emsp; &emsp;
<a href="news.html">NEWS</a> &emsp; &emsp;
<a href="coontact.html">CONTACT</a>
</header> 
</head>
<body>
<script src="slide.html"></script>

<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="/img/slide1.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="/img/slide2.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="/img/slide3.jpg" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

<h2>Welcome</h2>
<?php echo "Welcome, ".$_SESSION['usersId']."!";?>
<center><form action="includes/login.php">
<input type="button" value="Register A Vehicle" onclick="location='registration_vehicle_form.php'" />
<input type="button" value="Transfer A Title" onclick="location='transfertitle.php'" />
<input type="button" value="Apply For A New Title" onclick="location='newtitle.php'" />
</form></center>

<?php
	$sql = "SELECT * FROM vehicle;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	/*if ($resultCheck > 0) {
		while($row = mysqli_fetch_assoc($result)){
			echo $row['vin'] ." ". $row['make'] ." ". $row['model'] ." ". $row['year'] ." ". $row['color'] ." ". $row['licenseplate'] ." ". $row['stateofregistration'] ." ". "<br>";
		}
	}*/
?>
</body>
</html>