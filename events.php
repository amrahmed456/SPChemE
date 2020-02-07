<?php
	$page_title = 'SPChemE Events';
	require_once 'includes/head.inc.php';
?>
		<link rel="stylesheet" href="css/owl.carousel.min.css" />
		<link rel="stylesheet" href="css/owl.theme.default.min.css" />
		<link rel="stylesheet" href="css/events.css" />
<?php
	require_once 'includes/navbar.inc.php';
?>
	<!-- start main sction -->
	
	<div class="main padd position-relative d-flex align-items-center">
		<div class="overlay position-absolute"></div>
		<div class="container position-relative">
			<div class="text-center padd">
				<img src="imgs/logo.png" class="img-fluid mb-4 top-logo"/>
				<h1 class="font">DON'T MISS SPChemE UPCOMING EVENTS</h1>
				<p>subscribe to get latest events updates</p>
				
				
				<div class="email_subscribe position-relative">
					<input type="text" class="subscir-form-email form-control" placeholder="Type Your Email Address..." />
					<div class="position-absolute sub sub-button">
						<span class="submit-subscribe">SUBSCRIBE</span>
					</div>
				</div>
				
				
				
			</div>
		</div>
	</div>
	
	<!-- end main sction -->
	<!-- start statistics section -->
	<div class="statis mb-4">
		<div class="container">
			<div class="real row">
				<div class="col-12 col-md-6 col-lg-3">
					<div class="my-stat">
						<div class="row">
							<div class="col-4" style="padding-right: 0px;">
								<img src="imgs/icons8-statistics-64.png" class="img-fluid" />
							</div>
							<div class="col-8 talk">
								<div>
									<p class="font head-stat">real statistics</p>
									<p>+2500 events</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-lg-3">
					<div class="my-stat">
						<div class="row">
							<div class="col-4" style="padding-right: 0px;">
								<img src="imgs/icons8-microphone-64.png" class="img-fluid" />
							</div>
							<div class="col-8 talk">
								<div>
									<p class="font head-stat">real statistics</p>
									<p>+2500 speaker</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-lg-3">
					<div class="my-stat">
						<div class="row">
							<div class="col-4" style="padding-right: 0px;">
								<img src="imgs/icons8-slack-64.png" class="img-fluid" />
							</div>
							<div class="col-8 talk">
								<div>
									<p class="font head-stat">real statistics</p>
									<p>+250 upcoming</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-lg-3">
					<div class="my-stat">
						<div class="row">
							<div class="col-4" style="padding-right: 0px;">
								<img src="imgs/icons8-event-64.png" class="img-fluid" />
							</div>
							<div class="col-8 talk">
								<div>
									<p class="font head-stat">real statistics</p>
									<p>+2500 events</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- end statistics section -->
	
	<!--start events section -->
	<?php
		require_once 'db_connection.php';
		$stmt = $db->prepare("SELECT DISTINCT category FROM events");
		$stmt->execute();
		$rows = $stmt->fetchAll();
		if($stmt->rowCount() > 0){
			
	?>
	<div class="prev-events padd">
		<div class="container">
			
			<h1 class="font text-center">Explore <span class="styled-font">More Events</span></h1>
			<p class="lead small text-center">you can explore more events by category</p>
			
			<ul class="list-unstyled">
			<li class="active" data-filter="all">ALL</li>
			<!--  start currently running events  -->
		<?php
			$stmts = $db->prepare("SELECT DISTINCT category FROM events WHERE status = '2'");
			$stmts->execute();
			$current_count = $stmts->rowCount();
			if($current_count > 0){
			?>
				<li data-filter=".current">currently running Events</li>
			<?php
			}
		?>
			<!-- end currently running events  -->
			<!--  start upcoming events  -->
		<?php
			$stmts = $db->prepare("SELECT DISTINCT category FROM events WHERE status = '0'");
			$stmts->execute();
			$upcoming_count = $stmts->rowCount();
			if($upcoming_count > 0){
			?>
				<li data-filter=".upcoming">Upcoming Events</li>
			<?php
			}
		?>
			<!-- end upcoming events  -->
	<?php
		foreach($rows as $row){
			extract($row);
			$categoryClass = str_replace(" " , "_" , $category);
	?>
		<li data-filter=".<?php echo $categoryClass; ?>"><?php echo $category; ?></li>
	<?php
		}
	?>
		</ul>
		<div class="row mixes">
	<?php
		// current events
		if($current_count > 0){
			$stmt = $db->prepare("SELECT id,name,description,location,date,category,cover FROM events WHERE status = '2'");
		$stmt->execute();
		$rows = $stmt->fetchAll();
		foreach($rows as $row){
			extract($row);
			$image = 'uploaded_files/' . $cover;
			$categoryClass = str_replace(" " , "_" , $category);
	?>
	<div class="mb-4 col-12 col-md-4 mix current event-tt <?php echo $categoryClass; ?>">
					<a href="event.php?p=<?php echo $id; ?>">
						<div class="event-cnt position-relative">
						
							<span style="right:-14px" class="category-event position-absolute">
								<span class="position-relative">
								<?php echo $category; ?>
								</span>
							</span>
						
							<div class="ribbon position-absolute">
								<span class="runs">Running</span>
							</div>
							
							<div class="event-thumb">
							
								<div class="top-photo">
									<img class='img-fluid' src="<?php echo $image; ?>" />
								</div>
								
							</div>
							<div class="event-details">
								<h2 class="font event-name"><b><?php echo $name; ?></b></h2>
								<p class="lead details-talk">
									<?php echo $description; ?>
								</p>
								<span><span class="lead"><i class="fas fa-calendar-alt"style="font-size:15px;color:#00adf6"></i> <?php echo $date; ?></span></span>
								
								<div class="icons">
									<span class="more-inf"><i class="fas fa-map-marker-alt"style="color:#00adf6"></i> <?php echo $location; ?></span>
								</div>
							</div>
						</div>
					</a>
				</div>
	<?php
		}
		}
		
		// upcoming events
		if($upcoming_count > 0){
			$stmt = $db->prepare("SELECT id,name,description,location,date,category,cover FROM events WHERE status = '0'");
		$stmt->execute();
		$rows = $stmt->fetchAll();
		foreach($rows as $row){
			extract($row);
			$image = 'uploaded_files/' . $cover;
			$categoryClass = str_replace(" " , "_" , $category);
	?>
	<div class="mb-4 col-12 col-md-4 mix upcoming event-tt <?php echo $categoryClass; ?>">
					<a href="event.php?p=<?php echo $id; ?>">
						<div class="event-cnt position-relative">
							<div class="event-thumb">
							
								<div class="ribbon position-absolute">
									<span class="upcom"style="font-size:13px">Upcoming</span>
								</div>
								<div class="top-photo">
								
									<img class='img-fluid' src="<?php echo $image; ?>" />
								</div>
								
							</div>
							<div class="event-details">
								<h2 class="font event-name"><b><?php echo $name; ?></b></h2>
								<p class="lead details-talk">
									<?php echo $description; ?>
								</p>
								<span><span class="lead"><i class="fas fa-calendar-alt"style="font-size:15px;color:#00adf6"></i> <?php echo $date; ?></span></span>
								<span style="right:-14px" class="category-event position-absolute">
									<span class="position-relative">
									<?php echo $category; ?>
									</span>
								</span>
								
								<div class="icons">
									<span class="more-inf"><i class="fas fa-map-marker-alt"style="color:#00adf6"></i> <?php echo $location; ?></span>
								</div>
							</div>
						</div>
					</a>
				</div>
	<?php
		}
		}
		
		
		// past events
		$stmt = $db->prepare("SELECT id,name,description,location,date,category,cover FROM events WHERE status = '1' ORDER BY id DESC");
		$stmt->execute();
		$rows = $stmt->fetchAll();
		foreach($rows as $row){
			extract($row);
			$image = 'uploaded_files/' . $cover;
			$categoryClass = str_replace(" " , "_" , $category);
	?>
	<div class="mb-4 col-12 col-md-4 mix <?php echo $categoryClass; ?> event-tt">
			<a href="event.php?p=<?php echo $id; ?>">
				<div class="event-cnt">
					<div class="event-thumb">
					
						<div class="top-photo">
							<img class='img-fluid' src="<?php echo $image; ?>" />
						</div>
						
					</div>
					<div class="event-details">
						<h2 class="font event-name"><b><?php echo $name; ?></b></h2>
						<p class="lead details-talk">
							<?php echo $description; ?>
						</p>
						<span><span class="lead"><i class="fas fa-calendar-alt"style="font-size:15px;color:#00adf6"></i> <?php echo $date; ?></span></span>
						<span class="category-event position-absolute">
							<span class="position-relative">
							<?php echo $category; ?>
							</span>
						</span>
						
						<div class="icons">
							<span class="more-inf"><i class="fas fa-map-marker-alt"style="color:#00adf6"></i> <?php echo $location; ?></span>
						</div>
					</div>
				</div>
			</a>
		</div>
	<?php
		}
		
	?>
			</div>
			
			
		</div>
	</div>
	<?php
		}
	?>
	<!--end events section -->
	
	<!-- start testmonials section -->
	<div class="testmonials position-relative padd d-flex justify-content-center align-items-center">
		<div class="overlay position-absolute"></div>
		
		<div class="my-carousel padd text-center position-relative d-block">
			<div class="container">
				<div class="owl-carousel owl-testmonials owl-theme">
				
				
					<div class="item text-center" data-color="#2ca4bf">
						<h4 class="font">loreum ipsum dolar is a dummy text used in industrial typing</h4>
					</div>
					<div class="item text-center" data-color="#2ca4bf">
						<h4 class="font">loreum ipsum dolar is a dummy text used in industrial typing</h4>
					</div>
					<div class="item text-center" data-color="#2ca4bf">
						<h4 class="font">loreum ipsum dolar is a dummy text used in industrial typing</h4>
					</div>
					<div class="item text-center" data-color="#2ca4bf">
						<h4 class="font">loreum ipsum dolar is a dummy text used in industrial typingloreum ipsum dolar is a dummy text used in industrial typingloreum ipsum dolar is a dummy text used in industrial typing</h4>
					</div>
					
					
				</div>
			</div>
			
			<div class="custom-nav d-flex justify-content-center position-absolute">
				<div class="nav-img d-inline-block m-auto">
					<img class="active" src="imgs/mag2.jpg">
					<img src="imgs/mag1.jpg">
					<img src="imgs/mag3.jpg">
					<img src="imgs/mag4.jpg">
				</div>
			</div>
		</div>
	</div>
	
	<!-- end testmonials section -->
	
<?php
	require_once 'includes/footer.inc.php';
?>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/email_subscribe.js"></script>
<script src="js/events.js"></script>