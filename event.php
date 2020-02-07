<?php
	if(isset($_GET['p'])){
		$event_id = $_GET['p'];
		require_once 'db_connection.php';
		$stmt = $db->prepare("SELECT name,description,content,date,end_date,cover,registeration,facebook,location,category,images,status,phone,email,topics FROM events WHERE id = ? LIMIT 1");
		$stmt->execute(array($event_id));
		$row = $stmt->fetch();
		if($stmt->rowCount() > 0){
			extract($row);
			$page_title = $name . ' | SPChemE';
			require_once 'includes/head.inc.php';
			$images = explode("," , $images);
			if($status == '0'){
				$status = 'Upcoming';
			}else if($status == '1'){
				$status = 'Past Event';
			}else if($status == '2'){
				$status = 'Currently Running';
			}
	
?>
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/owl.theme.default.min.css" />
	<link type="text/css" href="css/jquery.fancybox.min.css" media="all" rel="stylesheet" />
	<link rel="stylesheet"href="css/event.css">
	
<meta property="og:url"           content="<?php echo 'url?p=' . $event_id; ?>"  />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $page_title; ?>" />
<meta property="og:description"   content="<?php echo $description; ?>" />
<meta property="og:image"         content="<?php echo 'url/' . $cover; ?>" />
<meta property="og:image:width" content="100" />
<meta property="og:image:height" content="100" />
	
	
<?php
	require_once 'includes/navbar.inc.php';
?>
<!-- start top slider -->

<div class="event-slider position-relative">

	<div class="overlay position-absolute">
		
		<div class="event-big position-relative">
			
			<h1 class="font event-name" ><?php echo $name; ?></h1>
			<?php
							
				if(strlen($topics) > 0){
					$topics = explode("," , $topics);
			?>
				<div class="topics-discuessed">
					<?php
						for($i = 0 ; $i < count($topics) ; $i++){
					?>
							<span class="mb-2"><?php echo $topics[$i]; ?></span>
					<?php
						}
					?>
				</div>
					<?php
					}
					
						if($status == 'Upcoming' && strlen($registeration) > 5){
					?>
					<a target="_blank" href="<?php echo $registeration ; ?>">
						<button style="box-shadow:2px 4px 7px #000" class="mt-2 d-inline btn btn-primary">Register Now</button>
					</a>
					<?php
						}
					?>
		</div>
	
	</div>
	
	<div class="event-images owl-carousel owl-images owl-theme">
		<div class="item">
			<a href="uploaded_files/<?php echo $cover; ?>" data-fancybox="images" data-caption="<?php echo $name; ?>">
				<img src="uploaded_files/<?php echo $cover; ?>" alt="<?php echo $name; ?>" />
			</a>
		</div>
		<?php
			
			if(count($images) > 0){
				for($i = 0 ; $i < count($images)-1 ; $i++){
			?>
				<div class="item">
					<a href="uploaded_files/<?php echo $images[$i]; ?>" data-fancybox="images" data-caption="<?php echo $name; ?>">
						<img src="uploaded_files/<?php echo $images[$i]; ?>" alt="<?php echo $name; ?>" />
					</a>
				</div>
			<?php
				}
			}
			
		?>
		
	</div>
	
</div>

<!-- end top slider -->


<!-- start event details -->

<div class="side-info">
	<div class="container">
		<div class="ev-info">
			<div class="row">
			
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="row">
						<div class="col-4 text-center">
							<img src="imgs/event-location.png" class="img-fluid"/>
						</div>
						<div class="col-8">
							<p class="font mb-0 mt-2 section-name">LOCATION</p>
							<p class="lead"><?php echo $location; ?></p>
						</div>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="row">
						<div class="col-4 text-center">
							<img src="imgs/category-event.png" class="img-fluid"/>
						</div>
						<div class="col-8">
							<p class="font mb-0 mt-2 section-name">CATEGORY</p>
							<p class="lead"><?php echo $category; ?></p>
						</div>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="row">
						<div class="col-4 text-center">
							<img src="imgs/status-event.png" class="img-fluid"/>
						</div>
						<div class="col-8">
							<p class="font mb-0 mt-2 section-name">STATUS</p>
							<p class="lead"><?php echo $status; ?></p>
						</div>
					</div>
				</div>
				
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="row">
						<div class="col-4 text-center">
							<img src="imgs/date-event.png" class="img-fluid"/>
						</div>
						<div class="col-8">
							<p class="font mb-0 mt-2 section-name">DATE</p>
							<p class="lead">
							<?php
								if($end_date == '0000-00-00'){
									echo $date;
								}else{
									echo $date . ' > ' . $end_date;
								}
							?>
							</p>
						</div>
					</div>
				</div>
				
				<?php
					if(strlen($facebook) > 0){
				?>
					<div class="col-12 col-md-6 col-lg-4 mb-4">
						<div class="row">
							<div class="col-4 text-center">
								<img src="imgs/facebook-event.png" class="img-fluid"/>
							</div>
							<div class="col-8">
								<a href="<?php echo $facebook; ?>" target="_blank" >
									<p class="font mb-0 mt-2 section-name">FACEBOOK</p>
									<p class="lead"><?php echo $name; ?></p>
								</a>
							</div>
						</div>
					</div>
				<?php
					}
				?>
				
				<?php
					if(strlen($phone) > 0){
				?>
					<div class="col-12 col-md-6 col-lg-4 mb-4">
						<div class="row">
							<div class="col-4 text-center">
								<img src="imgs/phone-event.png" class="img-fluid"/>
							</div>
							<div class="col-8">
								
								<p class="font mb-0 mt-2 section-name">PHONE</p>
								<p class="lead"><?php echo $phone; ?></p>
								
							</div>
						</div>
					</div>
				<?php
					}
				?>
				
				
			</div>
		</div>
	</div>
</div>

<!-- end event details -->

<!-- start description -->
<div class="description">
	<div class="container">
		<?php echo $content; ?>
	</div>
</div>

<!-- end description -->

<!-- start speakers section -->
	<?php
		$speakers = $db->prepare("SELECT speakers.name,speakers.position,speakers.description,speakers.image FROM events_speakers JOIN speakers ON events_speakers.speaker_id = speakers.id
		JOIN events ON events_speakers.event_id = events.id
		WHERE events_speakers.event_id = ?");
		$speakers->execute(array($event_id));
		if($speakers->rowCount() > 0){
		?>
		<div class="speakers padd">
			<h2 class="font text-center mb-4"><span class="scheme">S</span>PEAKER<span class="scheme">S</span></h2>
			<div class="container">
				<div class="row">
		<?php
			$speakersFetch = $speakers->fetchAll();
			foreach($speakersFetch as $speaker){
		?>
		
			<div class="col-12 col-md-4">
				<div class="speaker mb-2">
					<a href="uploaded_files/<?php echo $speaker['image']; ?>" data-fancybox="speakers" data-caption="<?php echo $speaker['name'] . ' | ' . $speaker['position']; ?>">
						<img src="uploaded_files/<?php echo $speaker['image']; ?>" alt="<?php echo $speaker['name'] . ' | ' . $speaker['position']; ?>" class="img-fluid">
					</a>
					<div class="overlay">
						<h3 class="font mb-0"><?php echo $speaker['name']; ?></h3>
						<p><?php echo $speaker['position']; ?></p>
						<span style="color:#757070"><?php echo $speaker['description']; ?></span>
					</div>
				</div>
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
<!-- end speakers section -->

<!-- start sposnors -->
<?php
	$sponsors = $db->prepare("SELECT sponsors.id,sponsors.title,sponsors.image FROM events_sponsorers JOIN sponsors ON events_sponsorers.sponsor_id = sponsors.id
	JOIN events ON events_sponsorers.event_id = events.id
	WHERE events_sponsorers.event_id = ?");
	$sponsors->execute(array($event_id));
	if($sponsors->rowCount() > 0){
	?>
	<div class="speakers padd text-center">
		<div class="card-top">
				<h2 class="font mb-4"><span class="scheme">S</span>PONSOR<span class="scheme">S</span></h2>
		</div>
		<div class="container">
			<div class="row">
	<?php
		$sponsorsFetch = $sponsors->fetchAll();
		foreach($sponsorsFetch as $sponsor){
	?>
		<div class="col-6 col-lg-2">
			<div class="sponser mb-2 d-flex justify-content-center align-items-center">
				<a href="uploaded_files/<?php echo $sponsor['image']; ?>" data-fancybox="sponsors" data-caption="<?php echo $sponsor['title']; ?>">
					<img class="img-fluid" src="uploaded_files/<?php echo $sponsor['image']; ?>" title="<?php echo $sponsor['title']; ?>">
				</a>
			</div>
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

<!-- end sposnors -->
<!-- AddToAny BEGIN -->
<div class="d-flex justify-content-center">
	<div>
		<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
		<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
		<a class="a2a_button_facebook"></a>
		<a class="a2a_button_twitter"></a>
		<a class="a2a_button_email"></a>
		<a class="a2a_button_linkedin"></a>
		<a class="a2a_button_whatsapp"></a>
		<a class="a2a_button_pinterest"></a>
		<a class="a2a_button_yahoo_mail"></a>
		</div>
		<script async src="https://static.addtoany.com/menu/page.js"></script>
	</div>
</div>
	<!-- AddToAny END -->
<!-- start comment secction -->
<div class="container padd">
				<div id="disqus_thread"></div>
		<script>

		/**
		*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
		*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
		
		var disqus_config = function () {
		this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
		this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
		};
		
		(function() { // DON'T EDIT BELOW THIS LINE
		var d = document, s = d.createElement('script');
		s.src = 'https://https-www-talebshaqa-com.disqus.com/embed.js';
		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
		})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
					
				</div>

<!-- end comment secction -->

<!-- start subscribe section -->
<div class="main padd position-relative d-flex align-items-center" style="background:#241e20;color:#FFF">
	<div class="container position-relative">
		<div class="text-center padd">
			<h1 class="font">SUBSCRIBE TO GET LATEST EVENTS UPDATES</h1>
			<p>we'll send you notifications whenever a new event is published.</p>
			
			
			<div class="email_subscribe position-relative">
				<input type="text" class="subscir-form-email form-control" placeholder="Type Your Email Address..." />
				<div class="position-absolute sub sub-button">
					<span class="submit-subscribe">SUBSCRIBE</span>
				</div>
			</div>
			
			
			
		</div>
	</div>
</div>

<!-- end subscribe section -->

<!-- start related articles -->

<?php
	$stmt = $db->prepare("SELECT id,name,description,location,date,category,cover,status FROM events WHERE ( category = ? OR location = ? ) AND ( id != ? ) LIMIT 3");
		$stmt->execute(array($category , $location , $event_id));
		if($stmt->rowCount() > 0){
	?>
	<div class="prev-events mixes upcoming-events padd">
		
		<div class="container">
		
			<div class="upcoming-talk text-center mb-4">
				<h1 class="font mb-0">Related <span class="styled-font">Events</h1>
				<p class="lead">you might also love to see these events.</p>
			</div>
			
			<div class="upcoming-event-container">
			<div class="row">
	<?php
		
		$rows = $stmt->fetchAll();
		foreach($rows as $row){
			extract($row);
			$image = 'uploaded_files/' . $cover;
			
		
	?>
		<div class="mb-4 col-12 col-md-4 mix event-tt">
			<a href="event.php?p=<?php echo $id; ?>">
				<div class="event-cnt">
					<div class="event-thumb">
					
						<?php
							if($status == '0'){
								// upcoming
							echo '<div class="ribbon position-absolute">
									<span class="upcom"style="font-size:13px">Upcoming</span>
								</div>';
							}else if($status == '2'){
								// ruinning event
								echo '<div class="ribbon position-absolute">
								<span class="runs">Running</span>
							</div>';
							}
						?>
					
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
	</div>
	<?php
	}
	?>

<!-- end related articles -->


<?php
	require_once 'includes/footer.inc.php';
		}else{
			header("Location: events.php");
			exit();
		}
	}else{
		header("Location: events.php");
		exit();
	}
?>

<script type="text/javascript" src="js/jquery.fancybox.min.js"></script>
<script src="js/email_subscribe.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/event.js"></script>