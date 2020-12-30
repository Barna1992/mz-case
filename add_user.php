<!doctype html>
<html class="fixed">

    <?php
    include('./head.html');
    ?>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

<body>
<section class="body">

    <?php
        include('./header.php');
    ?>

    <div class="inner-wrapper">
        <section role="main" class="content-body" style="margin-left:0px">
            <header class="page-header" style="left:0px">
                <h2>Aggiungi cliente</h2>
            </header>
            <?php
                include('./connection.php');
            ?>
            <!-- start: page -->
            <div class="row">
                <div class="col-xs-12">
                    <section class="panel form-wizard" id="w4">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="fa fa-caret-down"></a>
                                <a href="#" class="fa fa-times"></a>
                            </div>

                            <h2 class="panel-title">Aggiungi cliente</h2>
                        </header>
                        <div class="panel-body">
                            <div class="wizard-progress wizard-progress-lg">
                                <div class="steps-progress">
                                    <div class="progress-indicator"></div>
                                </div>
                                <ul class="wizard-steps">
                                    <li class="active">
                                        <a href="#w4-account" data-toggle="tab"><span>1</span>Generale</a>
                                    </li>
                                    <li>
                                        <a href="#w4-profile" data-toggle="tab"><span>2</span>Cosa cerca</a>
                                    </li>
                                    <li>
                                        <a href="#w4-confirm" data-toggle="tab"><span>3</span>Conferma</a>
                                    </li>
                                </ul>
                            </div>

                            <form class="form-horizontal" novalidate="novalidate" method="post" action="process.php" enctype="multipart/form-data">
                                <div class="tab-content">
                                    <?php
                                        include('./add_user_step1.php')
                                    ?>
                                    <?php
                                        include('./add_user_step2.php')
                                    ?>
                                    <?php
                                    include('./add_user_step3.php')
                                    ?>

                                </div>
                                <input type="submit" class="salva-form-hidden" value="Salva" hidden/>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <ul class="pager">
                                <li class="previous disabled">
                                    <a><i class="fa fa-angle-left"></i> Indietro</a>
                                </li>
                                <li class="finish hidden pull-right">
                                    <a class="salva-form">Salva</a>
                                </li>
                                <li class="next">
                                    <a>Avanti <i class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
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
<script src="assets/vendor/jquery-validation/jquery.validate.js"></script>
<script src="assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
<script src="assets/vendor/dropzone/dropzone.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>


<!-- Examples -->
<script src="assets/javascripts/forms/examples.wizard.js"></script>
<script src="assets/javascripts/forms/form_confirm.js"></script>

<!-- Vendor -->
<script src="assets/vendor/jquery/jquery.js"></script>
<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="assets/vendor/jquery-autosize/jquery.autosize.js"></script>
<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>
<script>
    function checkInitial(id, recap_id) {
        if($(id).val()) {
            $(recap_id).val($(id).val());
        }
    }

    document.getElementById('user_type').value='<?php echo $utenti['user_type']?>';
    <?php list($year, $month, $day, ) = explode('-', $utenti['birthdate']);
    ?>
    document.getElementById('birthday_year').value='<?php echo $year?>';
    document.getElementById('birthday_month').value='<?php echo $month?>';
    document.getElementById('birthday_day').value='<?php echo intval($day)?>';
    function toggleStep2(utente) {
        if ( utente === 'cerca' ) {
            $('#div_immobile_ricerca_paese').show();
            $('#div_immobile_vendita_paese').hide();
            $('#rif_num').parent().parent().hide();
            $('#rif_num_ReadOnly').parent().parent().hide();
            $('#classe_energetica').parent().parent().hide();
            $('#classe_energetica_ReadOnly').parent().parent().hide();
        }
        else {
            $('#div_immobile_ricerca_paese').hide();
            $('#div_immobile_vendita_paese').show();
            $('#rif_num').parent().parent().show();
            $('#rif_num_ReadOnly').parent().parent().show();
            $('#classe_energetica').parent().parent().show();
            $('#classe_energetica_ReadOnly').parent().parent().show();
        }
        $('#div_immobile_ricerca_paese').show();
        $('#div_immobile_vendita_paese').hide();
    }
    toggleStep2($('#user_type').val());
    $('#user_type').change( () => {
        toggleStep2($('#user_type').val());
    })
    $('#first_name').change( () => {
        console.log('changed');
    })
    checkInitial('#first_name', '#first_name_ReadOnly');
    checkInitial('#last_name', '#last_name_ReadOnly');
    checkInitial('#telephone', '#telephone_ReadOnly');
    checkInitial('#email', '#email_ReadOnly');
</script>


</body>
</html>

