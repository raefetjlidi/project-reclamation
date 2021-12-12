


<?php
    include_once '../Model/reclamation.php';
    include_once '../Model/motif.php';
    include_once '../Controller/reclamationC.php';
	require_once 'MailSender.php';

    $error = "";

    // create reclamation
    $reclamation = null;


    // create an instance of the controller
    $reclamationC = new reclamationC();
    if (
        
        isset($_POST["name"]) &&       
        isset($_POST["email"]) &&
        isset($_POST["phone"]) &&
        isset($_POST["subject"]) &&
        isset($_POST["type"]) &&
        isset($_POST["explication"])
    ) {
        if (
            
            !empty($_POST['name']) &&
            !empty($_POST["email"]) &&
            !empty($_POST["phone"]) &&
            !empty($_POST["subject"]) &&
            !empty($_POST["type"]) &&
            !empty($_POST["explication"])
        ) {

            $reclamation = new reclamation(
               
                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['subject'],             
                $_POST['explication']
            );

            $reclamationC->ajouterReclamation($reclamation);

            $motif = new motif(
              $_POST['type']
            );
            $reclamationC->ajouterMotif($motif);

			$mailSender = new MailSender();
			$mailSender->setsubject("About your reclamation ");
            $mess='you reclamation sent with sucess';
            $mailSender->setMessage($mess);
			$mailSender->setName( $_POST['name']);
            $mailSender->setrecipient( $_POST['email']);

            $mailSender->sendMail();
            echo $mailSender->getresult();
        }
        else
            $error = "Missing information";
    }

    
    
    
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template">

	<!-- title -->
	<title>Contact</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="../assets/css/responsive.css">



</head>
<body>


	<!--PreLoader-->
	<div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<title></title>
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								
									<ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul>
								</li>
								<li><a href="about.html">Accueil</a></li>
								<li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="cart.html">Utilisateur</a></li>
										<li><a href="checkout.html">Produit</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">Panier</a></li>
										
									</ul>
								</li>
								<li><a href="news.html">News</a>
									<ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="shop.html">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul>
								</li>
								<li><a href="historique.php"> historique </a></li> 

								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Obtenir de l'aide </p>
						<h1>Contactez Nous</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
				<form>

  <!-- Certains navigateurs historiques ont besoin de l'attribut
       `type` avec la valeur `submit` sur l'élément `button` -->

</form>
					<div class="form-title">
						<h2>Avez-vous une question?</h2>
						Envoyez vos questions ou vos suggestions pour qu'on puisse rester à votre écoute.
						
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<div class ="container">
	
                     <form id="contact"  onsubmit="return  valid_datas(contact)"  method="post" >
							
			
				
							<div class="form-group">
								<label>Nom</label>
								<input  type="text" class="form-control"  placeholder="Saisir un nom" name="name" id="name"   >
							</div>
							
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control"    placeholder="Saisir un email" name="email" id="email" > 

							</div>
							
							<div class="form-group">
								<label >Tél</label>
								<input type="text" class="form-control"   placeholder="Saisir ton Num de tél " name="phone" id="phone">
							</div>

							<div class="form-group pt-1">
								<label>Type</label>
								<select class="form-control" name="type" id="type">
									<option value="Demande_Divers">Demande Divers</option>
									<option value="Reclamation">Réclamation</option>
									<option value="Demande_devis">Demande devis</option>

								</select>
							</div>
							
							<div class="form-group">
								<label >Sujet</label>
								<input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Saisir ton sujet" name="subject" id="subject">
							</div>
							
							<div class="form-group">
								<label >Message</label>
								<textarea type="textarea" class="form-control" id="exampleInputEmail1"  placeholder="écrire un message" name="explication" id="explication"></textarea>
							</div>
							  
							  <button type="submit" class="btn btn-primary">Submit</button>
							</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Magasin adresse</h4>
							<p>1, 2 rue André Ampère <br> 2083 - Pôle Technologique <br> El Ghazala</p>  
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Magasin Heures</h4>
							<p>Lundi - Vendredi: 8 to 9 PM <br> Samedi - Dimanche: 10 to 8 PM </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: +216 71 338 123 <br> Email: Galaxyinvaders@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->

	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Trouvez notre emplacement</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26432.42324808999!2d-118.34398767954286!3d34.09378509738966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf07045279bf%3A0xf67a9a6797bdfae4!2sHollywood%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1576846473265!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
	</div>
	<!-- end google map section -->


	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About Nous</h2>
						<p>Car pour que vous aperceviez pour le moindre pardon, d'où est née toute cette erreur, le plaisir d'accuser et de louer la douleur, j'ouvrirai le tout, et ce qui est.  </p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Entrer en contact</h2>
						<ul>
							<li>1, 2 rue André Ampère , 2083 - Pôle Technologique , El Ghazala.</li>
							<li>Galaxyinvaders@gmail.com</li>
							<li>+216 71 338 123</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">

						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.html">Accueil</a></li>
							<li><a href="about.html">Utilisateur</a></li>
							<li><a href="services.html">Produit</a></li>
							<li><a href="news.html">Panier</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">S'abonner</h2>
						<p>Abonnez-vous à notre liste de diffusion pour obtenir les dernières mises à jour.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit" ><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2021 - <a>Raefet Jlidi</a>,  Tous les droits sont réservés.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="../assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="../assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="../assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="../assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="../assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="../assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="../assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="../assets/js/sticker.js"></script>
	<!-- form validation js -->
	<script src="../assets/js/form-validate.js"></script>
	<!-- main js -->
	<script src="../assets/js/main.js"></script>
	
</form>
</body>
</html>