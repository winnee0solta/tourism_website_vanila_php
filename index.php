<html>

<head>
	<title>Travels and tours</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="veiwport" content="width=devide-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<style>
		.gallery-box h4 {
			width: 200px;
			display: block;
			color: #fff;
			text-shadow: -2px 2px 2px #000;
			font-weight: 600;
			font-size: 20px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-20%, -50%);
		}
	</style>

</head>

<body>
	<section class="header">
		<div class="container">
			<img src="images/logo.png">
		</div>

		<h1>Travel with us</h1>
		<p>Hello and welcome</p>
		<form action="" method="GET">
			<div class="input-group">
				<input name="search" type="text" class="form-control" placeholder="Search">
				<div class="input-group-append">
					<button type="submit" class="input-group-text btn">Search</button>
				</div>
			</div>
		</form>
	</section>
	<section class="features py-4">
		<div class="title font-weight-bold text-center h1 my-3">Destinations</div>
		<div class="container">
			<div class="row">
				<?php
				include 'model/connection.php';
				//check for search terms
				if (isset($_GET['search'])) {

					$search_term = $_GET['search'];
					if ($search_term == '') {
						$sql = "SELECT * FROM packages";
					} else {
						$sql = "SELECT * FROM packages WHERE name LIKE '%$search_term%' OR location LIKE '%$search_term%'";
					}
				} else {
					$sql = "SELECT * FROM packages";
				}
				$result = $conn->query($sql);
				while ($row = mysqli_fetch_assoc($result)) {
					$smallstr = substr($row['desc'], 0, 120);
					echo '
						<div class="col-12 col-md-4 mt-2">
						<div class="feature-box">
							<div class="feature-img" style="background: url(images/' . $row['image'] . ')">
								<div class="price">
									<p>Rs ' . $row['price'] . '</p>
								</div>

							</div>
							<div class="feature-details">
								<a href="./package.php?id=' . $row['id'] . '">
									<h4>' . $row['name'] . '</h4>
								</a>
								<p> 
								' . $smallstr . ' 
								</p>
								<div>
									<span><i class="fa fa-map-marker"></i> ' . $row['location'] . '</span>
									<span><i class="fa fa-sun-o"></i> ' . $row['days'] . ' days</span>
									<span><i class="fa fa-moon-o"></i> ' . $row['nights'] . ' nights</span>
								</div>
							</div>
						</div>
					</div>
				
					';
				}
				?>
			</div>
		</div>
	</section>
	<section class="gallery">
		<h1>Travelling Gallery</h1>
		<div class="container">
			<div class="row">

				<?php
				include 'model/connection.php';
				$sql = "SELECT * FROM gallery";
				$result = $conn->query($sql);
				while ($row = mysqli_fetch_assoc($result)) {
					//image
					$sql2 = "SELECT * FROM photos WHERE gallery_id='" . $row['id'] . "'  LIMIT 1";
					$result2 = $conn->query($sql2);
					$photo = mysqli_fetch_assoc($result2);

					echo '
					<div class="col-md-3">
						<div class="gallery-box"  data-toggle="modal" data-target="#galleryModal-' . $row['id'] . '"> 
							<a href="#">
							<img src="./images/gallery/' . $photo['image'] . '" style="height:200px;">
								<h4>' . $row['name'] . '</h4>
							</a>
						</div>
					</div> 
				
					';
					$image_lists = '';
					$sql3 = "SELECT * FROM photos WHERE gallery_id='" . $row['id'] . "' ";
					$result3 = $conn->query($sql3);
					while ($row2 = mysqli_fetch_assoc($result3)) {
						$image_lists = $image_lists . '<img src="./images/gallery/' . $row2['image'] . '"  class="img-fluid mt-2" style="height:200px;">';
					}

					echo '
					<div class="modal fade" id="galleryModal-' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">' . $row['name'] . '</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
									' . $image_lists . '
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
						</div>
						</div>
					</div>
					</div>
					';
				}
				?>

			</div>
		</div>
	</section>
	<!-- <section class="banner">
		<div class="banner-highlights">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h2>Get 30% off on top destination</h2>
						<p>Book your package before 28th Feburary and get 30% flat discount.</p>
					</div>
					<div class="col-md-4">
						 
						<button onclick="location.href='Booking.php'" type="button" class="book-btn">Book Now</button>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<section class="footer py-3">
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-3">
					<img src="images/logo.png" class="footer-logo img-fluid">
					<p class="pt-1 text-justify">Daevak Tours and Travels. A website that provides you with every suitable packages with thrilling prices.</p>
				</div>
				<div class="col-md-3">
					<h5 class="text-capitalize font-weight-bold">Contact</h5>
					<div>
						<i class="fa fa-phone-square"></i>9800000000
					</div>
					<div>
						<i class="fa fa-envelope"></i>toursntravels@gmail.com
					</div>
					<div>
						<i class="fa fa-home"></i>Kalanki, Kathmandu
					</div>
				</div>
				<div class="col-md-3">
					<h5 class="text-capitalize font-weight-bold">Follow Us On</h5>
					<div>
						<i class="fa fa-facebook-official"></i>Facebook/Toursntravels
					</div>
					<div>
						<i class="fa fa-youtube-play"></i>YouTube/Toursntravels
					</div>
				</div>
				<div>
					<button data-toggle="modal" data-target="#queriemodal" type="button" class="book-btn">Queries</button>
					<div class="modal fade" id="queriemodal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content bg-dark">
								<div class="modal-header">
									<h5 class="modal-title">Queries</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="./model/addquerie.php" method="POST">
										<div class="form-group">
											<label>Full Name</label>
											<input name="name" type="text" class="form-control" placeholder="Enter Full Name" required>
										</div>
										<div class="form-group">
											<label>Contact No</label>
											<input name="phone" type="text" class="form-control" placeholder="Enter Contact No" required>
										</div>
										<div class="form-group">
											<label>Email</label>
											<input name="email" type="email" class="form-control" placeholder="Enter Email" required>
										</div>
										<div class="form-group">
											<label>Query </label>
											<textarea name="querie" class="form-control"></textarea>
										</div>
										<button type="submit" class="btn btn-danger ">Send</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>

					<button data-toggle="modal" data-target="#vehiclerentalModal" type="button" class="book-btn">Vehicle Rental</button>
					<div class="modal fade" id="vehiclerentalModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content bg-dark">
								<div class="modal-header">
									<h5 class="modal-title">Vehicle Rental</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="./model/vehiclerental.php" method="POST">
										<div class="form-group">
											<label>Full Name</label>
											<input name="name" type="text" class="form-control" placeholder="Enter Full Name" required>
										</div>
										<div class="form-group">
											<label>Contact No</label>
											<input name="phone" type="text" class="form-control" placeholder="Enter Contact No" required>
										</div>
										<div class="form-group">
											<label>Address</label>
											<input name="address" type="text" class="form-control" placeholder="Enter Address" required>
										</div>
										<div class="form-group">
											<label>Email</label>
											<input name="email" type="email" class="form-control" placeholder="Enter Email" required>
										</div>
										<div class="form-group">
											<label>Reservation From</label>
											<input name="reservation_from" type="date" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Reservation To</label>
											<input name="reservation_to" type="date" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Note (Optional)</label>
											<textarea name="note" class="form-control"></textarea>
										</div>
										<button type="submit" class="btn btn-danger ">BOOK</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
			<hr class="mt-3">
		</div>
		<div class="container text-center">
			<h5 class="font-weight-light">&copy; 2020 Copyright Reserved <br> Travels and Tours</h5>
		</div>
	</section>


</body>

</html>