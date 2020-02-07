<?php
	if(isset($_GET['p'])){
		
		$article_id = $_GET['p'];
		require_once 'db_connection.php';
		$stmt = $db->prepare("SELECT articles.name,articles.description,articles.content,articles.add_date,articles.image,categories.name AS cat_name,categories.cat_id
		FROM articles
		JOIN categories ON categories.cat_id = articles.cat_id
		WHERE articles.item_id = ? AND articles.approval = '1' LIMIT 1");
		$stmt->execute(array($article_id));
		if($stmt->rowCount() > 0){
			$row = $stmt->fetch();
			extract($row);
			$page_title = $name . ' | SPChemE';
			require_once 'includes/head.inc.php';
		


	require_once 'includes/head.inc.php';
?>
<link rel="stylesheet"href="css/article.css">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet"> 

<meta property="og:url"           content="<?php echo 'url?p=' . $article_id; ?>"  />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $page_title; ?>" />
<meta property="og:description"   content="<?php echo $description; ?>" />
<meta property="og:image"         content="<?php echo 'url/' . $image; ?>" />
<meta property="og:image:width" content="100" />
<meta property="og:image:height" content="100" />
<?php
	require_once 'includes/navbar.inc.php';
	?>
	
	<!-- start main section -->
	
	<div class="main padd position-relative" style="background:url('uploaded_files/<?php echo $image; ?>') no-repeat center center fixed;background-size:cover ">
		<div class="overlay position-absolute">
			<div class="container padd">
				<div class="d-flex align-items-end">
					<div class="top-info">
						<h1 class="font top-art-name"><?php echo $name; ?></h1>
						<div class="d-flex justify-content-start">
							<p class="art-date"><i class="mr-2 fas fa-calendar-week"></i> <?php echo $add_date; ?></p>
							<p class="art-categ"><i class="mr-2 fas fa-bookmark"></i> <?php echo $cat_name; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- end main section -->
	
	<!--start content section -->
	<div class="content padd">
		<div class="container">
			<div class="content-desc">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
	
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
	
	
	<!--end content section -->
	
	
	<!-- start subscribe section -->
<div class="padd position-relative d-flex align-items-center" style="background:#fdfdfd;color:#000;border-bottom:1px solid #DDD">
	<div class="container position-relative">
		<div class="text-center padd">
			<h1 class="font">SUBSCRIBE TO GET LATEST BLOG UPDATES</h1>
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
	$stmt = $db->prepare("SELECT item_id,image,name,description,add_date FROM articles WHERE cat_id = ? AND item_id != ?");
		$stmt->execute(array($cat_id , $article_id));
		if($stmt->rowCount() > 0){
		?>
			<div class="related padd">
				<div class="container">
					<h3 class="text-center font">Related Articles</h3>
					<p class="small text-center">Take a look at these articles too.</p>
					<div class="row mixes">
		<?php
				$rows = $stmt->fetchAll();
				foreach($rows as $row){
					extract($row);
				?>
					<div class="mix col-12 col-lg-6 mb-4">
						<a href="article.php?p=<?php echo $item_id; ?>">
							<div class="article-prev">
								<div class="row">
									<div class="col-12 col-md-6">
										<div class="mb-4 art-image position-relative">
											<img class="prev-image img-fluid" src="uploaded_files/<?php echo $image; ?>" />
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="cont">
											<h2 class="art-name font mb-2"><?php echo $name; ?></h2>
											<p class="description"><?php echo $description; ?></p>
											<p class="mb-0"style="color:#EAEAEA"><i class="mr-2 fas fa-calendar-alt"></i> <?php echo $add_date; ?></p>
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
<!-- end related articles -->
	
	
	
	<?php
		}else{
			header("Location: blog.php");
			exit();
		}
	}else{
		header("Location: blog.php");
		exit();
	}
			
?>

<?php
	require_once 'includes/footer.inc.php';
?>
<script src="js/email_subscribe.js"></script>
<script src="js/article.js"></script>