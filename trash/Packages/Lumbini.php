<!DOCTYPE html>
<html>
<head>
	<title>Lumbini</title>

<style>
		.gallery
{
	text-align: center;
  padding: 100px 0;
  background: #fff;
}
.gallery p
{
	text-align: left;
	font-size: 20px;
}
.gallery-box img
{
  width: 30%;
  border-radius: 10px;
  cursor: pointer;
  transition: 1s;
}
.gallery-box img:hover
{
  transform: scale(1.1);
}

.gallery-box
{
  position: relative;
  margin-bottom: 30px;
}

.gallery p
{
	padding: 45px;
}
.book-btn
{
	width: 100px;
	padding-top: 8px 0;
	outline: none !important;
	border: 5px solid #800080;
	border-radius: 50px;
	background: transparent;
	float: center;
	margin-top: 25px;
}
</style>



</head>
<body>
<section class="gallery">
		<h1>Lumbini</h1>
		<p>Lumbini is a Buddhist pilgrimage site in the Rupandehi District of Province No. 5 in Nepal. It is the place where, according to Buddhist tradition, Queen Mahamayadevi gave birth to Siddhartha Gautama in 563 BCE. Gautama, who achieved Enlightenment some time around 528 BCE, became the Buddha and founded Buddhism.</p>
		<div class="container">
			
			<div class="gallery-box">
				<img src="Lumbini/lumbini1.jpg">
				<img src="Lumbini/lumbini2.jpg">
				<img src="Lumbini/lumbini3.jpg">
				<img src="Lumbini/lumbini4.jpg">
				<img src="Lumbini/lumbini5.jpg">
			</div>			
		</div>	
		<button onclick="location.href='../Booking.php'" type="button" class="book-btn">Book Now</button>
</section>
</body>
</html>