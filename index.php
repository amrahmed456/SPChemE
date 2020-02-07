<?php
	$page_title = 'SPChemE SUSC';
	require_once 'includes/head.inc.php';
?>
		<link rel="stylesheet" href="css/owl.carousel.min.css" />
		<link rel="stylesheet" href="css/owl.theme.default.min.css" />
		<link rel="stylesheet" href="css/home.css" />
<?php
	require_once 'includes/navbar.inc.php';
?>
	
	<!-- start main screen -->
	<div class="main">
		<div class="row">
			<div class="col-12 col-md-6 main-no-padding">
				<div class="hero intro text-center d-flex justify-content-center align-items-center">
					<div class="top-welcome">
						<img src="imgs/logo.png">
						<h2 class="font">WELCOME TO <span class="scheme">S</span>PChem<span class="scheme">E</span></h2>
						<p>loreum ipsum dolar is a dummy text used for printable industrial publishing text loreum ipsum dolar </p>
						<div class="leave-main m-auto mt-4">
							<i class="fa fa-angle-double-down"></i>
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="what-we-do intro text-center d-flex justify-content-center align-items-center">
					<div class="slider container">
						<div class="owl-carousel owl-features owl-theme">
							<div class="item"data-color="#2ca4bf">
								<div class="circle d-flex justify-content-center align-items-center">
									<img src="imgs/music.jpg">
								</div>
								<h3 class="font">Enjoy with us</h3>
								<p class="lead">loreum ipsum dolar is a dummy text used in industrial typing</p>
							</div>
							<div class="item"data-color="#262123">
								<div class="circle d-flex justify-content-center align-items-center">
									<img src="imgs/enjoy.jpg">
								</div>
								<h3 class="font">Professional Team</h3>
								<p class="lead">loreum ipsum dolar is a dummy text used in industrial typing</p>
							</div>
							<div class="item"data-color="#05aff2">
								<div class="circle d-flex justify-content-center align-items-center">
									<img src="imgs/dance.jpg">
								</div>
								<h3 class="font">Develope your skills</h3>
								<p class="lead">loreum ipsum dolar is a dummy text used in industrial typing</p>
							</div>
							<div class="item"data-color="#fe982a">
								<div class="circle d-flex justify-content-center align-items-center">
									<img src="imgs/learn.jpg">
								</div>
								<h3 class="font">Learn with us</h3>
								<p class="lead">loreum ipsum dolar is a dummy text used in industrial typing</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	<!-- end main screen -->
	
	<!-- start features section -->
	<div class="committies padd">
		<div class="container">
			<h2 class="font text-center borded head-text">COMMITTIES IN THE CHAPTER</h2>
			
			<div class="row">
			
				<div class="col-12 col-md-6 col-lg-3 text-center feat-talk mb-4">
					<div class="committe text-center it-com">
						<div class="illustration mb-4">
							<img src="imgs/it-com.png">
						</div>
						<h5 class="font">IT COMMITTE</h5>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3 text-center feat-talk mb-4">
					<div class="committe text-center dp-com">
						<div class="illustration mb-4">
							<img src="imgs/dp-com.png">
						</div>
						<h5 class="font">DP COMMITTE</h5>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3 text-center feat-talk mb-4">
					<div class="committe text-center oc-com">
						<div class="illustration mb-4">
							<img src="imgs/oc-com.png">
						</div>
						<h5 class="font">OC COMMITTE</h5>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3 text-center feat-talk mb-4">
					<div class="committe text-center hr-com">
						<div class="illustration mb-4">
							<img src="imgs/hr-com.png">
						</div>
						<h5 class="font">HR COMMITTE</h5>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3 text-center feat-talk mb-4">
					<div class="committe text-center media-com">
						<div class="illustration mb-4">
							<img src="imgs/media-com.png">
						</div>
						<h5 class="font">MEDIA COMMITTE</h5>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3 text-center feat-talk mb-4">
					<div class="committe text-center fr-com">
						<div class="illustration mb-4">
							<img src="imgs/fr-com.png">
						</div>
						<h5 class="font">FR COMMITTE</h5>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3 text-center feat-talk mb-4">
					<div class="committe text-center pr-com">
						<div class="illustration mb-4">
							<img src="imgs/pr-com.png">
						</div>
						<h5 class="font">PR COMMITTE</h5>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-3 text-center feat-talk mb-4">
					<div class="committe text-center social-com">
						<div class="illustration mb-4">
							<img src="imgs/social-com.png">
						</div>
						<h5 class="font">SOCIAL MEDIA</h5>
					</div>
				</div>
				
				
			</div>
			
			
		</div>
	</div>
	
	<!-- end features section -->
	
	<!-- start events section -->
	<div class="events padd">
		
		<div class="row">
			<div class="col-12 col-md-4 d-flex align-items-center mb-4">
				<div class="container">
					<div>
						<h1 class="font borded mb-4 ">LATEST <span class="scheme">S</span>PChem<span class="scheme">E</span> EVENTS</h1>
						<a href="events.php"><button class="d-none d-md-block btn btn-primary">VIEW ALL</button></a>
					</div>
				</div>
				
			</div>
			
			<div class="col-12 col-md-8">
				<div class="owl-carousel owl-events owl-theme">
				<?php
					require_once 'db_connection.php';
					$stmt = $db->prepare("SELECT id,name,description,location,cover FROM events ORDER BY id DESC LIMIT 6");
					$stmt->execute();
					$rows = $stmt->fetchAll();
					foreach($rows as $row){
						extract($row);
						$image = 'uploaded_files/' . $cover;
					?>
						<div class="item">
							
								<div class="event">
									<div class="event-img">
										<img src="<?php echo $image; ?>">
									</div>
									<div class="event-info">
										<p class="font mb-2 event-name"><?php echo $name; ?></p>
										<p class="event-talk"><?php echo $description; ?>
										</p>
										<div class="further-details">
											<i class="fa fa-map-marker-alt"></i> <span class="location"><?php echo $location; ?></span>
											<a href="event.php?p=<?php echo $id; ?>" class="read font float-right">READ MORE...</a>
										</div>
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
	
	<!-- end events section -->
	
	
	
	<!-- start magazine section -->
	<div class="events magazines padd">
		
		<div class="row">
			
			<div class="col-12 col-md-4 d-flex align-items-center mb-4">
				<div class="container">
					<div>
						<h1 class="font mb-4 text-right">READ <span class="scheme">S</span>PChem<span class="scheme">E</span> ARTICLES</h1>
						<a href="blog.php"><button class="d-none d-md-block btn btn-info ml-auto">VIEW ALL</button></a>
					</div>
				</div>
				
			</div>
			
			
			<div class="col-12 col-md-8">
				<div class="owl-carousel owl-magazine owl-theme">
				<?php
					$stmt = $db->prepare("SELECT item_id,name,description,image FROM articles WHERE approval = '1' ORDER BY item_id DESC LIMIT 5;");
					$stmt->execute();
					if($stmt->rowCount() > 0){
						$rows = $stmt->fetchAll();
						foreach($rows as $row){
							extract($row);
					?>
						<div class="item articles-lat">
							<a href="article.php?p=<?php echo $item_id; ?>">
								<div class="magazine position-relative">
									<div class="event-img">
										<img src="uploaded_files/<?php echo $image; ?>">
									</div>
									<div class="overlay position-absolute d-flex align-items-end">
										<div class="magazine-info">
											<h5 class="font"><?php echo $name; ?></h5>
											<p class="magazine-talk"><?php echo $description; ?></p>
											
										</div>
									</div>
									
								</div>
							</a>
						</div>
					<?php
						}
					}
				?>
				
				</div>
			</div>
			
		</div>
	
	</div>
	
	<!-- end magazines section -->
	
	<!-- presidents section -->
		<div class="presidents padd">
			<div class="container">
			
				<h1 class="font text-center"><span class="scheme">S</span>PChem<span class="scheme">E</span> LEADERS</h1>
				<p class="lead text-center head-text">every great student chapter has great leaders behind it</p>
				
				<div class="row">
					
					<div class="col-12 col-md-4 mb-4">
						<div class="presidental">
							<div class="overlay d-flex align-items-end">
								<div class="p-info">
									<h2 class="font">AMR AHMED</h2>
									<p class="font">PRESIDENT</p>
								</div>
							
							</div>
						</div>
					</div>
					
					
					<div class="col-12 col-md-4 mb-4">
						<div class="presidental">
							<div class="overlay d-flex align-items-end">
								<div class="p-info">
									<h2 class="font">AMR AHMED</h2>
									<p class="font">VICE-PRESIDENT</p>
									
								</div>
							
							</div>
						</div>
					</div>
					
					<div class="col-12 col-md-4 mb-4">
						<div class="presidental">
							
								<div class="all-team text-center">
									<h2 class="font">WE HAVE THE BEST TEAM EVER</h2>
									<a href="team.php">
										<button class="btn btn-primary">VIEW ALL</button>
									</a>
								</div>
							
							
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
		
		<!-- end presidents section -->
	

		<!-- start best members -->
		<div class="best-members padd">
			<div class="container">
				<h1 class="text-center font borded head-text">OUR BEST MEMBERS</h1>
				<div class="row">
					<div class="col-12 col-md-4 col-lg-3 mb-4">
						<div class="best-member">
							<img src="imgs/event1.jpg">
						</div>
						<div class="row">
							<div class="col-8">
								<p class="font best-name">amr ahmed</p>
								<p class="best-com">it committe</p>
							</div>
							<div class="col-4 medal">
								<img src="imgs/medal.png">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-3 mb-4">
						<div class="best-member">
							<img src="imgs/event2.jpg">
						</div>
						<div class="row">
							<div class="col-8">
								<p class="font best-name">amr ahmed</p>
								<p class="best-com">it committe</p>
							</div>
							<div class="col-4 medal">
								<img src="imgs/medal.png">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-3 mb-4">
						<div class="best-member">
							<img src="imgs/event3.jpg">
						</div>
						<div class="row">
							<div class="col-8">
								<p class="font best-name">amr ahmed</p>
								<p class="best-com">it committe</p>
							</div>
							<div class="col-4 medal">
								<img src="imgs/medal.png">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-3 mb-4">
						<div class="best-member">
							<img src="imgs/event4.jpg">
						</div>
						<div class="row">
							<div class="col-8">
								<p class="font best-name">amr ahmed</p>
								<p class="best-com">it committe</p>
							</div>
							<div class="col-4 medal">
								<img src="imgs/medal.png">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-3 mb-4">
						<div class="best-member">
							<img src="imgs/event1.jpg">
						</div>
						<div class="row">
							<div class="col-8">
								<p class="font best-name">amr ahmed</p>
								<p class="best-com">it committe</p>
							</div>
							<div class="col-4 medal">
								<img src="imgs/medal.png">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-3 mb-4">
						<div class="best-member">
							<img src="imgs/event2.jpg">
						</div>
						<div class="row">
							<div class="col-8">
								<p class="font best-name">amr ahmed</p>
								<p class="best-com">it committe</p>
							</div>
							<div class="col-4 medal">
								<img src="imgs/medal.png">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-3 mb-4">
						<div class="best-member">
							<img src="imgs/event3.jpg">
						</div>
						<div class="row">
							<div class="col-8">
								<p class="font best-name">amr ahmed</p>
								<p class="best-com">it committe</p>
							</div>
							<div class="col-4 medal">
								<img src="imgs/medal.png">
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-3 mb-4">
						<div class="best-member">
							<img src="imgs/event4.jpg">
						</div>
						<div class="row">
							<div class="col-8">
								<p class="font best-name">amr ahmed</p>
								<p class="best-com">it committe</p>
							</div>
							<div class="col-4 medal">
								<img src="imgs/medal.png">
							</div>
						</div>
					</div>

					
				</div>
			</div>
		</div>
		
		<!-- end best members -->
		
		<!-- start visit us section -->
		<div class="visit-us padd text-center">
			<div class="container">
				
				<div class="my-tal">
					<h1 class="font">STAY IN TOUCH</h1>
					<p class="lead">CONTACT US ON OUR DIFFERENT SOCIAL MEDIA ACCOUNTS</p>
				</div>
			
			
				<div class="social-btns contact-icons mb-4">
					<a class="btn facebook" href="#">
						<div class="icon-container icon-facebook d-flex justify-content-center align-items-center">
						<i class="icon fab fa-facebook-f"></i>
						</div>
					</a>
					
					<a class="btn twitter" href="#">
						<div class="icon-container icon-twitter d-flex justify-content-center align-items-center">
							<i class="icon fab fa-twitter"></i>
						</div>
					</a>
				
					<a class="btn google" href="#">
						<div class="icon-container icon-linkedin d-flex justify-content-center align-items-center">
							<i class="icon fab fa-linkedin-in"></i>
						</div>
					</a>
					<a class="btn instagram" href="#">
						<div class="icon-container icon-whats d-flex justify-content-center align-items-center">
							<i class="icon fab fa-whatsapp"></i>
						</div>
					</a>
				</div>
				
				<p class="lead">we will be waiting for you...</p>
				
				
			</div>
		</div>
		
		<!-- end visit us section -->
		
<?php
	require_once 'includes/footer.inc.php';
?>
<script src="js/owl.carousel.min.js"></script>
<script src="js/home.js"></script>