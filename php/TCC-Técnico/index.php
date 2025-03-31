<?php
session_start();
include_once("database/Mydatasource.php");

if (isset($_SESSION['msg'])) {
	echo "<script> alert('$_SESSION[msg]')</script> <script> location.replace('index.php'); </script>";
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
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
									<li class="nav-item active">
										<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="about.php">Sobre </a>
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
			<div class="slider_container">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="container">
								<div class="row">
									<div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
										<div class="detail-box">
											<h2>
												Construa seu físico
											</h2>
											<h1>
												Seja Fitness aqui
											</h1>
											<p>
												A melhor forma de ver o resultado da academia é treinando com frequência. Há dias bons e dias ruins nos treinos, mas é sempre melhor treinar do que deixar de movimentar o corpo!A melhor forma de ver o resultado da academia é treinando com frequência. Há dias bons e dias ruins nos treinos, mas é sempre melhor treinar do que deixar de movimentar o corpo!
											</p>
											<div class="btn-box">
												<a href="about.html" class="btn-1">
													Ler mais
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item ">
							<div class="container">
								<div class="row">
									<div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
										<div class="detail-box">
											<h2>
												Construa seu físico
											</h2>
											<h1>
												Seja Fitness aqui
											</h1>
											<p>
												Desconfie do destino e acredite em você. Gaste mais horas realizando que sonhando, fazendo que planejando, vivendo que esperando porque, embora quem quase morre esteja vivo, quem quase vive já morreu.
											</p>
											<div class="btn-box">
												<a href="about.html" class="btn-1">
													Ler mais
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item ">
							<div class="container">
								<div class="row">
									<div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
										<div class="detail-box">
											<h2>
												Construa seu físico
											</h2>
											<h1>
												Seja Fitness aqui
											</h1>
											<p>
												Treinar é sentir que você pode fazer algo que depende do seu esforço e da sua determinação. Quanto mais motivado você estiver, melhores vão ser os resultados!
											</p>
											<div class="btn-box">
												<a href="about.html" class="btn-1">
													Ler mais
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end slider section -->
	</div>


	<!-- about section -->

	<section class="about_section layout_padding">
		<div class="container">
			<div class="heading_container">
				<h2>
					Sobre a Doomgym
				</h2>
			</div>
			<div class="box">
				<div class="img-box">
					<img src="images/logo.png" alt="">
				</div>
				<div class="detail-box">
					<p>
						Na Academia Doom Gym, cada pessoa é valorizada e respeitada em sua jornada de autodescoberta e crescimento pessoal. Aqui, o compromisso é com a excelência, a saúde e a felicidade duradoura. Junte-se a nós e descubra o poder de uma vida equilibrada na Academia Doom Gym - onde a transformação começa de dentro para fora.
					</p>
					<a href="about.html">
						Ler mais
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- end about section -->

	<!-- service section -->

	<section class="service_section layout_padding">
		<div class="container">
			<div class="heading_container">
				<h2>
					Nossos Treinos
				</h2>
			</div>
			<div class="service_container">
				<div class="box">
					<img src="images/s-1.jpg" alt="">
					<h6 class="visible_heading">
						CROSSFIT TRAINING
					</h6>
					<div class="link_box">
						<a href="crossfit.php">
							<img src="images/link.png" alt="">
						</a>
						<h6>
							CROSSFIT TRAINING
						</h6>
					</div>
				</div>
				<div class="box">
					<img src="images/s-2.jpg" alt="">
					<h6 class="visible_heading">
						FITNESS
					</h6>
					<div class="link_box">
						<a href="fitness.php">
							<img src="images/link.png" alt="">
						</a>
						<h6>
							FITNESS
						</h6>
					</div>
				</div>
				<div class="box">
					<img src="images/s-3.jpg" alt="">
					<h6 class="visible_heading">
						DYNAMIC STRENGTH TRAINING
					</h6>
					<div class="link_box">
						<a href="forca.php">
							<img src="images/link.png" alt="">
						</a>
						<h6>
							DYNAMIC STRENGTH TRAINING
						</h6>
					</div>
				</div>
				<div class="box">
					<img src="images/s-4.jpg" alt="">
					<h6 class="visible_heading">
						HEALTH
					</h6>
					<div class="link_box">
						<a href="health.php">
							<img src="images/link.png" alt="">
						</a>
						<h6>
							HEALTH
						</h6>
					</div>
				</div>
				<div class="box">
					<img src="images/s-5.jpg" alt="">
					<h6 class="visible_heading">
						WORKOUT
					</h6>
					<div class="link_box">
						<a href="workout.php">
							<img src="images/link.png" alt="">
						</a>
						<h6>
							WORKOUT
						</h6>
					</div>
				</div>
				<div class="box">
					<img src="images/s-6.jpg" alt="">
					<h6 class="visible_heading">
						STRATEGIES
					</h6>
					<div class="link_box">
						<a href="strategies.php">
							<img src="images/link.png" alt="">
						</a>
						<h6>
							STRATEGIES
						</h6>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- end service section -->


	<!-- Us section -->

	<section class="us_section layout_padding">
		<div class="container">
			<div class="heading_container">
				<h2>
					Porque escolher nós?
				</h2>
			</div>
			<div class="us_container">
				<div class="box">
					<div class="img-box">
						<img src="images/u-1.png" alt="">
					</div>
					<div class="detail-box">
						<h5>
							Equipamentos de Qualidade
						</h5>
						<p>
							Possuímos equipamentos de qualidade e máquinas importadas para ajuda-lo a buscar melhores resultados
						</p>
					</div>
				</div>
				<div class="box">
					<div class="img-box">
						<img src="images/u-2.png" alt="">
					</div>
					<div class="detail-box">
						<h5>
							Plano de nutrição saudável
						</h5>
						<p>
							Apresentamos dietas flexíveis e saúdaveis acompanhadas com nutricionistas ativos.
						</p>
					</div>
				</div>
				<div class="box">
					<div class="img-box">
						<img src="images/u-3.png" alt="">
					</div>
					<div class="detail-box">
						<h5>
							Disponibilidade de Treinos
						</h5>
						<p>
							Contamos com uma vasta gama de profissionais com disponibilidade para qualquer momento do dia.
						</p>
					</div>
				</div>
				<div class="box">
					<div class="img-box">
						<img src="images/u-4.png" alt="">
					</div>
					<div class="detail-box">
						<h5>
							Unico para suas necessidades
						</h5>
						<p>
							Nossos Treinos atendem todos os públicos e necessidades, não dependendo de Treinos adicionais.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- end us section -->


	<!-- client section -->

	<section class="client_section layout_padding">
		<div class="container">
			<div class="heading_container">
				<h2>
					Feedback dos clientes
				</h2>
			</div>
			<div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
					<li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="box">
							<div class="img-box">
								<img src="images/client.png" alt="">
							</div>
							<div class="detail-box">
								<h5>
									Lorem Ipsum
								</h5>
								<p>
									Lorem ipsum dolor sit amet. Et fugit vitae in amet temporibus et quidem amet eos nobis neque!
								</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="box">
							<div class="img-box">
								<img src="images/client.png" alt="">
							</div>
							<div class="detail-box">
								<h5>
									Lorem Ipsum
								</h5>
								<p>
									Lorem ipsum dolor sit amet. Et fugit vitae in amet temporibus et quidem amet eos nobis neque!
								</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="box">
							<div class="img-box">
								<img src="images/client.png" alt="">
							</div>
							<div class="detail-box">
								<h5>
									Lorem Ipsum
								</h5>
								<p>
									Lorem ipsum dolor sit amet. Et fugit vitae in amet temporibus et quidem amet eos nobis neque!
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- end client section -->

	<!-- result section -->

	<section class="result_section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 px-0">
					<div class="img-box">
						<img src="images/result-img.jpg" alt="">
					</div>
				</div>
				<div class="col-lg-4 col-md-5">
					<div class="detail-box">
						<h2>
							Treine para obter<br>melhores resultados
						</h2>
						<p>
							A academia DoomGym oferece equipamentos modernos, instrutores qualificados e uma variedade de aulas para todos os níveis. Com programas personalizados e um ambiente acolhedor, garantindo que você alcance seus objetivos.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- end result section -->


	<!-- cadastro section -->
	<section class="cadastro_section layout_padding">
		<div class="container">
			<div class="heading_container">

				<div class="col-md-6">
					<div class="image_container">
						<div class="image-responsive">
							<img
								src="images/logo.png"
								align="center"
								style="
                  border:0; 
                  width: 400px; 
                  height: 350px">
							</img>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end cadastro section -->


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
			&copy; 2024 All Rights Reserved. Design by Doomgym</a>
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