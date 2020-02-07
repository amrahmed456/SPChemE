</head>
	<body>
		
		<div id="preloader"class="preloader d-flex justify-content-center align-items-center">
			<img src="imgs/preloader.gif">
			
		</div>
		
		<script>
			var winH = window.innerHeight;
			var el = document.getElementById("preloader");
			el.style.height = winH + "px";
		</script>
		<!-- end preloader -->
	
	<!-- start to top arrow key -->
	<div class="to_top to_top_bottom">
		<i class="fas fa-arrow-up"></i>
	</div>
	<!-- end to to top arrow key -->
	
	<!-- start navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
		  <a class="navbar-brand" href="#"><img src="imgs/logo_name.png" class="float-left"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item lead <?php if($page_title == 'SPChemE SUSC'){echo 'active';}?>">
				<a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item lead <?php if($page_title == 'SPChemE Events'){echo 'active';}?>">
				<a class="nav-link" href="events.php"><i class="fa fa-calendar"></i> EVENTS</a>
			  </li>
			  <li class="nav-item lead <?php if($page_title == 'SPChemE Blog'){echo 'active';}?>">
				<a class="nav-link" href="blog.php"><i class="fab fa-readme"></i> Blog</a>
			  </li>
			  <li class="nav-item lead <?php if($page_title == 'SPChemE TEAM'){echo 'active';}?>">
				<a class="nav-link" href="team.php"><i class="fa fa-users"></i> TEAM</a>
			  </li>
			  <li class="nav-item lead <?php if($page_title == 'About SPChemE'){echo 'active';}?>">
				<a class="nav-link" href="about.php"><i class="fa fa-globe-africa"></i> ABOUT</a>
			  </li>
			  <!--<li class="nav-item">
				<button class="btn rounder-btn">Join Now</button>
			  </li>-->
			  <div class="social-btns d-flex align-items-center">
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
			</ul>
		  </div>
	  </div>
	</nav>
	
	<div class="nav-top-replacer"></div>

<!-- end navbar -->
		
		