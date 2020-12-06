<!doctype html>
<html class="fixed">

    <?php
    include('./head.html');
    include('./connection.php');
    ?>

	<body>
		<section class="body">

		<?php
			include('./header.php');
		?>

			<div class="inner-wrapper">

                <?php
                    include('./sidebar.html');
                    ?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					</header>
					<div class="row"></div>
					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
                                            <div class="panel-body">
											<div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <a href="immobili_list.php">
                                                    <div class="summary-icon bg-primary">
														<i class="fa fa-home"></i>
													</div>
                                                    </a>
                                                </div>
												<div class="widget-summary-col">
                                                    <div class="summary">
                                                    <h4 class="title">Immobili in Vendita</h4>
                                                    <div class="info">
                                                        <strong class="amount">
                                                            <?php
                                                            $sql_user = "SELECT count(*) as immobili from AgenziaImmobili INNER JOIN AgenziaClienti ON 
AgenziaClienti.id_cliente=AgenziaImmobili.id_cliente WHERE user_type='vende'";
                                                            $result=mysqli_query($conn, $sql_user);
                                                            $utenti = mysqli_fetch_assoc($result);
                                                            mysqli_free_result($result);
                                                            echo $utenti['immobili'];
                                                            ?>
                                                        </strong>
                                                    </div>
                                                    </div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-eur"></i>
													</div>
												</div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Prezzo Medio Per immobile</h4>
                                                        <div class="info">
                                                            <strong class="amount">
                                                                <?php
                                                                $sql_user = "SELECT AVG (CASE WHEN prezzo <> 0 THEN prezzo ELSE NULL END) as immobile_prezzo from AgenziaImmobili INNER JOIN AgenziaClienti ON 
AgenziaClienti.id_cliente=AgenziaImmobili.id_cliente WHERE user_type='vende'";
                                                                $result=mysqli_query($conn, $sql_user);
                                                                $utenti = mysqli_fetch_assoc($result);
                                                                mysqli_free_result($result);
                                                                echo intval($utenti['immobile_prezzo']);
                                                                ?>
                                                                &euro;
                                                            </strong>
                                                        </div>
                                                    </div>
                                                </div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-shopping-cart"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Acquirenti Registrati</h4>
														<div class="info">
                                                            <strong class="amount">
                                                                <?php
                                                                $sql_user = "SELECT count( DISTINCT whole_name ) as total_users from AgenziaClienti WHERE user_type='cerca'";
                                                                $result=mysqli_query($conn, $sql_user);
                                                                $utenti = mysqli_fetch_assoc($result);
                                                                mysqli_free_result($result);
                                                                echo $utenti['total_users'];
                                                                ?>
                                                            </strong>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Venditori Registrati</h4>
														<div class="info">
															<strong class="amount">
                                                                <?php
                                                                $sql_user = "SELECT count( DISTINCT whole_name ) as total_users from AgenziaClienti WHERE user_type='vende'";
                                                                $result=mysqli_query($conn, $sql_user);
                                                                $utenti = mysqli_fetch_assoc($result);
                                                                mysqli_free_result($result);
                                                                echo $utenti['total_users'];
                                                                ?>
                                                            </strong>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>



					<!-- end: page -->
				</section>
			</div>

		</section>

		<!-- Vendor -->
		<script src="./assets/vendor/jquery/jquery.js"></script>
		<script src="./assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="./assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="./assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="./assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="./assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="./assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="./assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="./assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="./assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="./assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="./assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="./assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="./assets/vendor/morris/morris.js"></script>
		<script src="./assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="./assets/vendor/liquid-meter/liquid.meter.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="./assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="./assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="./assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="./assets/javascripts/dashboard/examples.dashboard.js"></script>
	</body>
</html>
