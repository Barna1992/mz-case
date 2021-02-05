<?php
require("./config/session.php");
require("./config/connection.php");
?>
<!doctype html>
<html class="fixed">

    <?php include($_SERVER['DOCUMENT_ROOT'].'/head.html'); ?>

	<body>
		<section class="body">

		<?php include($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>

			<div class="inner-wrapper">

                <?php include($_SERVER['DOCUMENT_ROOT'].'/sidebar.html'); ?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Aggiungi Immobile</h2>
					</header>
					<div class="row"></div>
					<!-- start: page -->
					<div class="row">
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
                                        <a href="add_user.php">
                                        <div class="panel-body" style="padding-bottom: 80px;">
											<div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">

                                                    <div class="summary-icon bg-primary">
														<i class="fa fa-user"></i>
													</div>
                                                </div>
												<div class="widget-summary-col">
                                                    <div class="summary">
                                                    <h4 class="title">Aggiungi immobile e nuovo Utente</h4>
                                                    </div>
												</div>
											</div>
										</div>
                                        </a>
                                    </section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-home"></i>
													</div>
												</div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Aggiungi immobile</h4>
                                                        <div class="info">
                                                        </div>
                                                    </div>
                                                </div>
											</div>
                                            <div style="padding-top: 20px">
                                            <form action="/add_user.php">
                                                <label for="utenti">Seleziona Utente:</label>
                                                <?php
                                                $sql = 'SELECT id_cliente, last_name, first_name FROM AgenziaClienti ORDER BY last_name';
                                                $result = mysqli_query($conn, $sql);
                                                $numero_di_clienti = mysqli_num_rows($result);
                                                if ($numero_di_clienti > 0) {
                                                ?>
                                                <select name="clienti" id="clienti">
                                                <?php
                                                    foreach ($result as $cliente) {
                                                        echo '<option value="'.$cliente['id_cliente'].'">'.$cliente['last_name'].' '.$cliente['first_name'].'</option>';
                                                    }
                                                ?>
                                                </select>
                                                <input type="submit" value="Avanti">
                                                <?php } else {
                                                    echo 'Nessun utente registrato!!';
                                                }?>
                                            </form>
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
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
	</body>
</html>
