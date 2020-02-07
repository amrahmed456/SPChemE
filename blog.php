<?php
	$page_title = 'SPChemE Blog';
	require_once 'includes/head.inc.php';
?>
		<link rel="stylesheet" href="css/blog.css" />
<?php
	require_once 'includes/navbar.inc.php';
?>


<!-- start main sction -->
	
	<div class="main padd position-relative d-flex align-items-center">
		<div class="overlay position-absolute"></div>
		<div class="container position-relative">
			<div class="text-center padd">
				<img src="imgs/logo.png" class="img-fluid mb-4" style="width:90px"/>
				<h1 class="font"><span class="scheme">S</span>PChem<span class="scheme">E</span> BLOG</h1>
				<p class="lead mb-4">Where you can read about technical, non technical and valuable articles to boost your skills and knowledge.</p>
				<p class="small">subscribe to get latest articles updates</p>
				
				
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
	
	<!-- start latest 3 articles -->
	<?php
		require_once 'db_connection.php';
		$stmt = $db->prepare("SELECT articles.item_id,articles.name as article_name,articles.description,articles.image,categories.name as cat_name FROM articles  JOIN categories ON articles.cat_id = categories.cat_id WHERE articles.approval = '1' ORDER BY articles.item_id DESC LIMIT 3");
		$stmt->execute(array());
		if($stmt->rowCount() > 0){
	?>
	<div class="latest-articles padd">
		<div class="container">
			<div class="row">
	<?php
			$rows = $stmt->fetchAll();
			foreach($rows as $row){
				extract($row);
			?>
				<div class="col-12 col-md-4 mb-4">
					<a href="article.php?p=<?php echo $item_id; ?>">
						<div class="lat-art position-relative">
							<img src="uploaded_files/<?php echo $image; ?>" class="img-fluid" />
							<div class="cat-rib font position-absolute">
								<?php echo $cat_name; ?>
							</div>
							<div class="overlay position-absolute">
								<div class="d-flex align-items-end position-relative">
									<div style="height:auto">
										<h2 class="font"><?php echo $article_name; ?></h2>
										<p class="art-description-top"><?php echo $description; ?></p>
									</div>
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
		
	
	<!-- end latest 3 articles -->
	
	<!-- start all articles section -->
	
	<div class="padd articles">
		<div class="container">
			<div class="top text-center">
				<h2 class="font mb-0">Explore Articles</h2>
				<p class="small mb-4">sort articles by category</p>
			</div>
			
			<?php
				$stmt = $db->prepare("SELECT DISTINCT articles.cat_id,categories.name FROM articles JOIN categories ON categories.cat_id = articles.cat_id");
				$stmt->execute(array());
				if($stmt->rowCount() > 0){
					
				?>
				<ul class="list-unstyled mb-8">
					<li class="active" data-filter="all">ALL</li>
					<?php
					
						$rows = $stmt->fetchAll();
						foreach($rows as $row){
							extract($row);
							$categoryClass = str_replace(" " , "_" , $name);
						?>
							<li data-filter=".<?php echo $categoryClass; ?>"><?php echo $name; ?></li>
						<?php
						}
					
					?>
				</ul>
				<div class="row mixes">
				<?php
					$stmt = $db->prepare("SELECT articles.item_id,articles.add_date,articles.name as article_name,articles.description,articles.image,categories.name as cat_name FROM articles  JOIN categories ON articles.cat_id = categories.cat_id WHERE articles.approval = '1' ORDER BY articles.item_id DESC");
					$stmt->execute(array());
						$rows = $stmt->fetchAll();
						foreach($rows as $row){
							extract($row);
							$categoryClass = str_replace(" " , "_" , $cat_name);
						?>
							<div class="mix col-12 col-lg-6 mb-4 <?php echo $categoryClass; ?>">
								<a href="article.php?p=<?php echo $item_id; ?>">
									<div class="article-prev">
										<div class="row">
											<div class="col-12 col-md-6">
												<div class="art-image position-relative">
													<div class="cat-rib font position-absolute">
														<?php echo $cat_name; ?>
													</div>
													<img class="prev-image img-fluid" src="uploaded_files/<?php echo $image; ?>" />
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="cont">
													<h2 class="art-name font mb-2"><?php echo $article_name; ?></h2>
													<p class="description"><?php echo $description; ?></p>
													<p class="mb-0"style="color:#006F9D"><i class="mr-2 fas fa-calendar-alt"></i> <?php echo $add_date; ?></p>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
						<?php
							
						}
				?>
				</div>
				<?php
				}
			?>
			
		</div>
	</div>
	
	<!-- end all articles section -->


<?php
	require_once 'includes/footer.inc.php';
?>
<script src="js/email_subscribe.js"></script>
<script src="js/mixitup.min.js"></script>
<script>
	$(document).ready(function(){
		if($(".mixes").length > 0){
			var mixer = mixitup('.mixes');
		}
		
		// for sorting events
		$(".articles li").click(function(){
			
			$(this).siblings("li").each(function(){
				$(this).removeClass("active");
			});
			$(this).addClass("active");
			
		});
		
	});
</script>