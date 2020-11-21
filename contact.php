<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Project6 | Contact Us</title>
	<!-- Bootstrap core CSS -->
	<link href="styles/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="styles/contact.css">
</head>

<body>

	<div class="container contact">
		<div class="row">
			<div class="col-md-3">
				<div class="contact-info">
					<h2>Contact Us</h2>
					<h4>We would love to hear from you</h4>
				</div>
			</div>
			<div class="col-md-9">
				<div class="contact-form">
					<div class="form-group">
						<label class="control-label col-sm-2" for="fname">First Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="fname" placeholder="Enter First Name"
								name="fname">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="lname">Last Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="lname" placeholder="Enter Last Name"
								name="lname">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="comment">Comment:</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" id="comment"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include("footer.php")?>
</body>

</html>