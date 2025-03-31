<?php
session_start();
include_once("database/Mydatasource.php");

if (isset($_SESSION['msg'])) {
	echo "<script> alert('$_SESSION[msg]')</script> <script> location.replace('about.php'); </script>";
	unset($_SESSION['msg']);
}

?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!-- Site Metas -->
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<title>Doomgym</title>

	<!-- slider stylesheet -->
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

	<!-- bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

	<!-- fonts style -->
	<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
		rel="stylesheet" />
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />
	<!-- responsive style -->
	<link href="css/responsive.css" rel="stylesheet" />

	<script src="https://kit.fontawesome.com/8a6a993d63.js" crossorigin="anonymous"></script>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>

</head>

<body class="sub_page about_page">
	<div class="hero_area">
		<!-- header section strats -->
		<header class="header_section">
			<div class="container">
				<nav class="navbar navbar-expand-lg custom_nav-container">
					<a class="navbar-brand" href="index.php">
						<img src="images/logo.png" alt="" />
						<span>
							Doomgym
						</span>
					</a>
					<div class="cadastro_nav" id="">
						<ul class="navbar-nav ">
							<li class="nav-item">
								<a class="nav-link" href="about.php">
									<img src="images/location.png" alt="" />
									<span>No.123, loram ipusm</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="about.php">
									<img src="images/call.png" alt="" />
									<span>Ligar : + 55 1899193-8909</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="about.php">
									<img src="images/envelope.png" alt="" />
									<span> Doomgymofc@gmail.com</span>
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>

		</header>
		<!-- end header section -->
		<!-- slider section -->
		<section class=" slider_section position-relative">
			<div class="container">
				<div class="custom_nav2">
					<nav class="navbar navbar-expand-lg custom_nav-container ">

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<div class="d-flex  flex-column flex-lg-row align-items-center">
								<ul class="navbar-nav">
									<li class="nav-item">
										<a class="nav-link" href="index.php">Home </a>
									</li>
									<li class="nav-item active">
										<a class="nav-link" href="about.php">Sobre <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="training.php">Treinos </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="Loja.php">Loja </a>
									</li>

									<?php

									if (!isset($_SESSION['id'])) {

										echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='register.php'>Cadastro</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='login.php'>Login</a>
                    </li>
                    ";
									} else {
										$id = $_SESSION['id'];
										$query = "SELECT * FROM user WHERE id = '$id' LIMIT 1";
										$result = mysqli_query($conn, $query);
										$row = mysqli_fetch_assoc($result);

										$username = $row['username'];
										$name = $row['name'];
										$email = $row['email'];
										echo "
										<li class='nav-item dropdown'>
											<a class='nav-link dropdown-toggle text-body-secondary' href='' role='button' data-bs-toggle='dropdown' data-bs-auto-close='outside'>$username</a>
											<ul class='dropdown-menu dropdown-menu-right'>
												<li><a class='dropdown-header'>Login</a>
												<li><a class='dopdown-text'>Nome: $name</a></li>
												<li><a class='dopdown-text'>Email: $email</a></li>
												<div class='dropdown-divider'></div>
												<li><a class='dropdown-item' href='update.php'>Editar dados</a></li>
											</ul>
										</li>
										
										<form class='form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0' method='POST'>
											<button class='btn  my-2 my-sm-0 nav_search-btn' type='submit' name='deslogar'>
											</button>
										</form>
                  ";
									}

									if ($_SERVER['REQUEST_METHOD'] == 'POST') {
										if (isset($_POST['deslogar'])) {
											unset($_SESSION['id']);
											echo '<script> location.replace("index.php"); </script>';
										}
									}

									?>

							</div>
						</div>
					</nav>
				</div>
			</div>
			<!-- end slider section -->
	</div>


	<!-- about section -->

	<section class="about_section layout_padding">
		<div class="container">
			<div class="heading_container">
				<h2>
					Sobre Doomgym
				</h2>
			</div>
			<div class="box">
				<div class="img-box">
					<img src="images/logo.png" alt="">
				</div>
				<div class="detail-box">
					<p>
						Bem-vindo à Academia Doom Gym, um oásis de transformação e bem-estar situado no coração da cidade. O ambiente é moderno e acolhedor.Equipes atenciosas e treinadas estão prontas para oferecer orientação personalizada e responder a todas as suas perguntas.<br>

						Os espaços são amplos e arejados, projetados para acomodar uma variedade de atividades. Na área de musculação, equipamentos de última geração.
					<p>

						Nos estúdios multifuncionais, a energia é contagiosa. De aulas de alta intensidade a práticas de ioga serenas, há algo para todos os gostos e níveis de condicionamento físico. Instrutores apaixonados e especializados lideram as sessões, motivando os alunos a superarem obstáculos e alcançarem seus objetivos.
					<p>

						Na Academia Doom Gym, cada pessoa é valorizada e respeitada em sua jornada de autodescoberta e crescimento pessoal. Aqui, o compromisso é com a excelência, a saúde e a felicidade duradoura. Junte-se a nós e descubra o poder de uma vida equilibrada na Academia Doom Gym - onde a transformação começa de dentro para fora.
					<p>

					<p align="left" style="font-size: 30px;"><b><br>cadastro<br></b>

						<img src="images/location-white.png" alt="">
						<span>No.123, loram ipusm </span><br>
						<img src="images/call-white.png" alt="">
						<span>Ligar : + 55 1899193-8909</span><br>
						<img src="images/mail-white.png" alt="">
						<span>Doomgymofc@gmail.com</span>
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- end about section -->

	<!-- info section -->

	<section class="info_section layout_padding2-top">
		<div class="container">
			<div class="info_form">
				<h4>
					Nossas informações
				</h4>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h6>
						Sobre a Doomgym
					</h6>
					<p>
						Na Academia Doom Gym, cada pessoa é valorizada e respeitada em sua jornada de autodescoberta e crescimento pessoal. Aqui, o compromisso é com a excelência, a saúde e a felicidade duradoura.
					</p>
				</div>
				<div class="col-md-2 offset-md-1">
					<h6>
						Menus
					</h6>
					<ul>
						<li class="">
							<a class="" href="index.php">Home </a>
						</li>
						<li class="">
							<a class="" href="about.php">Sobre </a>
						</li>
						<li class="">
							<a class="" href="training.php">Treinos </a>
						</li>
						<li class="">
							<a class="" href="loja.php">Loja </a>
						</li>
					</ul>
				</div>
				<div class="col-md-3">
					<h6>
						Links
					</h6>
					<ul>
						<li>
							<a href="">
								Adipiscing
							</a>
						</li>
						<li>
							<a href="">
								Elit, sed
							</a>
						</li>
						<li>
							<a href="">
								do Eiusmod
							</a>
						</li>
						<li>
							<a href="">
								Tempor
							</a>
						</li>
						<li>
							<a href="">
								incididunt
							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3">
					<h6>
						Contato
					</h6>
					<div class="info_link-box">
						<a href="">
							<img src="images/location-white.png" alt="">
							<span> No.123, loram ipusm</span>
						</a>
						<a href="">
							<img src="images/call-white.png" alt="">
							<span>+55 1899193-8909</span>
						</a>
						<a href="">
							<img src="images/mail-white.png" alt="">
							<span> Doomgymofc@gmail.com</span>
						</a>
					</div>
					<div class="info_social">
						<div>
							<a href="">
								<img src="images/facebook-logo-button.png" alt="">
							</a>
						</div>
						<div>
							<a href="">
								<img src="images/twitter-logo-button.png" alt="">
							</a>
						</div>
						<div>
							<a href="">
								<img src="images/linkedin.png" alt="">
							</a>
						</div>
						<div>
							<a href="">
								<img src="images/instagram.png" alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- end info section -->


	<!-- footer section -->
	<section class="container-fluid footer_section ">
		<p>
			&copy; 2024 All Rights Reserved. Design by Doomgym
		</p>
	</section>
	<!-- footer section -->

	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<script>
		function openNav() {
			document.getElementById("myNav").classList.toggle("menu_width");
			document
				.querySelector(".custom_menu-btn")
				.classList.toggle("menu_btn-style");
		}
	</script>
</body>

</html>