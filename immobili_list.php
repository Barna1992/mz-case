<?php
require("./config/session.php");
require("./config/connection.php");
?>
<!doctype html>
<html class="fixed search-results">
<?php include($_SERVER['DOCUMENT_ROOT'].'/head.html'); ?>

<body>
<section class="body">

    <?php include($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>

    <div class="inner-wrapper">

        <?php include($_SERVER['DOCUMENT_ROOT'].'/sidebar.html'); ?>

        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Appartamenti registrati</h2>
            </header>

            <div class="search-content">
                <div class="tab-content">
                    <?php
                    $sql = "SELECT DISTINCT * FROM AgenziaImmobili";
                    $result = mysqli_query($conn, $sql);

                    $utenti = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    mysqli_free_result($result);

                    ?>
                    <div id="everything" class="tab-pane active">
                        <div class="col-md-8">
                            <ul class="list-unstyled search-results-list" id="result"></ul>
                        </div>
                        <div class="col-md-4">
                            <div class="list-group">
                                <h3>Prezzo</h3>
                                <?php
                                $sql = "SELECT MIN(CAST(prezzo as signed)) as MIN, MAX(CAST(prezzo as signed)) as MAX FROM AgenziaImmobili;";
                                $result = mysqli_query($conn, $sql);
                                $prezzi = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                mysqli_free_result($result);

                                ?>
                                <input type="hidden" id="hidden_minimum_price" value="0" />
                                <input type="hidden" id="hidden_maximum_price" value="<?php echo $prezzi[0]["MAX"] ?>" />
                                <p id="price_show"><?php
                                    foreach ($prezzi as $prezzo) {
                                        echo 0;
                                        echo ' - ';
                                        echo $prezzo["MAX"];
                                    }
                                    ?></p>
                                <div id="price_range"></div>
                            </div>
                            <div class="list-group">
                                <h3>Metratura</h3>
                                <?php
                                $sql = "SELECT MAX(CAST(metratura as signed)) as MAX FROM AgenziaImmobili";
                                $result = mysqli_query($conn, $sql);
                                $metratura = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                mysqli_free_result($result);

                                ?>
                                <input type="hidden" id="hidden_minimum_metratura" value="0" />
                                <input type="hidden" id="hidden_maximum_metratura" value="<?php echo $metratura[0]['MAX']?>" />
                                <p id="metratura_show"><?php
                                    foreach ($metratura as $met) {
                                        echo 0;
                                        echo ' - ';
                                        echo $met["MAX"];
                                    }
                                    ?></p>
                                <div id="metratura_range"></div>
                            </div>
                            <div class="list-group">
                                <h3>Numero di locali</h3>
                                <?php
                                $sql = "SELECT MAX(CAST(locali as signed)) as MAX FROM AgenziaImmobili";
                                $result = mysqli_query($conn, $sql);
                                $locali = mysqli_fetch_all($result, MYSQLI_ASSOC);

                                mysqli_free_result($result);

                                ?>
                                <input type="hidden" id="hidden_minimum_locali" value="1" />
                                <input type="hidden" id="hidden_maximum_locali" value="<?php echo $locali[0]["MAX"] ?>" />
                                <p id="locali_show"><?php
                                    foreach ($locali as $locale) {
                                        echo 1;
                                        echo ' - ';
                                        echo $locale["MAX"];
                                    }
                                    ?></p>
                                <div id="locali_range"></div>
                            </div>
                            <br/>
                            <div class="list-group">
                                <h3>Localita</h3>
                                <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                                    <?php

                                    $sql = "SELECT DISTINCT(immobile_vendita_paese) FROM AgenziaImmobili ORDER BY immobile_vendita_paese ASC";
                                    $result = mysqli_query($conn, $sql);

                                    foreach($result as $row)
                                    {
                                        ?>
                                        <div class="list-group-item checkbox">
                                            <label><input type="checkbox" class="common_selector immobile_vendita_paese" value="<?php echo $row['immobile_vendita_paese']; ?>"  > <?php echo $row['immobile_vendita_paese']; ?></label>
                                        </div>
                                        <?php
                                    }
                                    mysqli_free_result($result);

                                    ?>
                                </div>
                            </div>
                            <div class="list-group">
                                <h3>Classe Energetica</h3>
                                <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                                    <?php

                                    $sql = "SELECT DISTINCT(classe_energetica) FROM AgenziaImmobili ORDER BY classe_energetica ASC";
                                    $result = mysqli_query($conn, $sql);

                                    foreach($result as $row)
                                    {
                                        ?>
                                        <div class="list-group-item checkbox">
                                            <label><input type="checkbox" class="common_selector classe_energetica" value="<?php echo $row['classe_energetica']; ?>"  > <?php echo $row['classe_energetica']; ?></label>
                                        </div>
                                        <?php
                                    }
                                    mysqli_free_result($result);

                                    ?>
                                </div>
                            </div>
                            <div class="list-group">
                                <h3>Arredamento</h3>
                                <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                                    <?php

                                    $sql = "SELECT DISTINCT(arredamento) FROM AgenziaImmobili ORDER BY arredamento ASC";
                                    $result = mysqli_query($conn, $sql);

                                    foreach($result as $row)
                                    {
                                        ?>
                                        <div class="list-group-item checkbox">
                                            <label><input type="checkbox" class="common_selector arredamento" value="<?php echo $row['arredamento']; ?>"  > <?php echo $row['arredamento']; ?></label>
                                        </div>
                                        <?php
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);

                                    ?>
                                </div>
                            </div>
                            <div class="list-group">
                                <h3>Informazioni aggiuntive</h3>
                                <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                                        <div class="list-group-item checkbox">
                                            <label><input type="checkbox" class="common_selector info_aggiuntive garage" value="garage"  > Garage</label>
                                        </div>
                                        <div class="list-group-item checkbox">
                                            <label><input type="checkbox" class="common_selector info_aggiuntive giardino" value="giardino"  > Giardino </label>
                                        </div>
                                        <div class="list-group-item checkbox">
                                            <label><input type="checkbox" class="common_selector info_aggiuntive balcone" value="balcone"  > Balcone</label>
                                        </div>
                                        <div class="list-group-item checkbox">
                                            <label><input type="checkbox" class="common_selector info_aggiuntive terrazzo" value="terrazzo"  > Terrazzo </label>
                                        </div>
                                </div>
                            </div>
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

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>
<script src="assets/javascripts/forms/immobili_filters.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){

        filter_data();

        function filter_data()
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var minimum_metratura = $('#hidden_minimum_metratura').val();
            var maximum_metratura = $('#hidden_maximum_metratura').val();
            var minimum_locali = $('#hidden_minimum_locali').val();
            var maximum_locali = $('#hidden_maximum_locali').val();
            var classe_energetica = get_filter('classe_energetica');
            var immobile_vendita_paese = get_filter('immobile_vendita_paese');
            var arredamento = get_filter('arredamento');
            var info_aggiuntive = get_filter('info_aggiuntive');

            $.ajax({
                url:"fetch_immobili.php",
                method:"POST",
                data:{action:action, user_type:'vende', minimum_price:minimum_price,
                    maximum_price:maximum_price, classe_energetica:classe_energetica,
                    immobile_vendita_paese:immobile_vendita_paese,
                    arredamento:arredamento, info_aggiuntive:info_aggiuntive,
                    minimum_metratura:minimum_metratura, maximum_metratura: maximum_metratura,
                    minimum_locali:minimum_locali, maximum_locali:maximum_locali
                    },
                success:function(data){
                    $('#result').html(data);
                }
            });
        }

        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function(){
            filter_data();
        });

        $('#price_range').slider({
            range:true,
            min:0,
            max:<?php echo $prezzi[0]["MAX"]?>,
            values:[0, <?php echo $prezzi[0]["MAX"]?>],
            step:500,
            stop:function(event, ui)
            {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();
            }
        });

        $('#metratura_range').slider({
            range:true,
            min:0,
            max:<?php echo $metratura[0]["MAX"]?>,
            values:[0, <?php echo $metratura[0]["MAX"]?>],
            step:5,
            stop:function(event, ui)
            {
                $('#metratura_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_metratura').val(ui.values[0]);
                $('#hidden_maximum_metratura').val(ui.values[1]);
                filter_data();
            }
        });

        $('#locali_range').slider({
            range:true,
            min:1,
            max:<?php echo $locali[0]["MAX"]?>,
            values:[1, <?php echo $locali[0]["MAX"]?>],
            step:1,
            stop:function(event, ui)
            {
                $('#locali_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_locali').val(ui.values[0]);
                $('#hidden_maximum_locali').val(ui.values[1]);
                filter_data();
            }
        });
    });
</script>

</body>
</html>