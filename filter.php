<div class="col-md-4" style="border: 1px solid #0088cc">
        <div class="list-group">
            <h3>Prezzo</h3>
            <?php
            $sql = "SELECT MIN(CAST(prezzo as signed)) as MIN, MAX(CAST(prezzo as signed)) as MAX FROM AgenziaMZ;";
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
            $sql = "SELECT MAX(CAST(metratura as signed)) as MAX FROM AgenziaMZ";
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
            $sql = "SELECT MAX(CAST(locali as signed)) as MAX FROM AgenziaMZ";
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
            <h3>Numero di camere</h3>
            <?php
            $sql = "SELECT MAX(CAST(camere as signed)) as MAX FROM AgenziaMZ";
            $result = mysqli_query($conn, $sql);
            $camere = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_free_result($result);

            ?>
            <input type="hidden" id="hidden_minimum_camere" value="1" />
            <input type="hidden" id="hidden_maximum_camere" value="<?php echo $camere[0]["MAX"] ?>" />
            <p id="camere_show"><?php
                foreach ($camere as $camera) {
                    echo 1;
                    echo ' - ';
                    echo $camera["MAX"];
                }
                ?></p>
            <div id="camere_range"></div>
        </div>
        <br>
        <div class="list-group">
            <h3>Numero di bagni</h3>
            <?php
            $sql = "SELECT MAX(CAST(bagni as signed)) as MAX FROM AgenziaMZ";
            $result = mysqli_query($conn, $sql);
            $bagni = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_free_result($result);

            ?>
            <input type="hidden" id="hidden_minimum_bagni" value="1" />
            <input type="hidden" id="hidden_maximum_bagni" value="<?php echo $bagni[0]["MAX"] ?>" />
            <p id="bagni_show"><?php
                foreach ($bagni as $bagno) {
                    echo 1;
                    echo ' - ';
                    echo $bagno["MAX"];
                }
                ?></p>
            <div id="bagni_range"></div>
        </div>
        <div class="list-group">
            <h3>Localita</h3>
            <div style="overflow-y: auto; overflow-x: hidden;">
                <?php

                $sql = "SELECT DISTINCT(immobile_vendita_paese) FROM AgenziaMZ ORDER BY immobile_vendita_paese ASC";
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
            <div style="overflow-y: auto; overflow-x: hidden;">
                <?php

                $sql = "SELECT DISTINCT(classe_energetica) FROM AgenziaMZ ORDER BY classe_energetica ASC";
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
            <div style="overflow-y: auto; overflow-x: hidden;">
                <?php

                $sql = "SELECT DISTINCT(arredamento) FROM AgenziaMZ ORDER BY arredamento ASC";
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
            var minimum_camere = $('#hidden_minimum_camere').val();
            var maximum_camere = $('#hidden_maximum_camere').val();
            var minimum_bagni = $('#hidden_minimum_bagni').val();
            var maximum_bagni = $('#hidden_maximum_bagni').val();
            var classe_energetica = get_filter('classe_energetica');
            var immobile_vendita_paese = get_filter('immobile_vendita_paese');
            var arredamento = get_filter('arredamento');
            var info_aggiuntive = get_filter('info_aggiuntive');

            $.ajax({
                url:"fetch_users.php",
                method:"POST",
                data:{action:action, user_type:'', minimum_price:minimum_price,
                    maximum_price:maximum_price, classe_energetica:classe_energetica,
                    immobile_vendita_paese:immobile_vendita_paese,
                    arredamento:arredamento, info_aggiuntive:info_aggiuntive,
                    minimum_metratura:minimum_metratura, maximum_metratura: maximum_metratura,
                    minimum_locali:minimum_locali, maximum_locali:maximum_locali,
                    minimum_camere:minimum_camere, maximum_camere:maximum_camere,
                    minimum_bagni:minimum_bagni, maximum_bagni:maximum_bagni
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

        $('#camere_range').slider({
            range:true,
            min:1,
            max:<?php echo $camere[0]["MAX"]?>,
            values:[1, <?php echo $camere[0]["MAX"]?>],
            step:1,
            stop:function(event, ui)
            {
                $('#camere_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_camere').val(ui.values[0]);
                $('#hidden_maximum_camere').val(ui.values[1]);
                filter_data();
            }
        });

        $('#bagni_range').slider({
            range:true,
            min:1,
            max:<?php echo $bagni[0]["MAX"]?>,
            values:[1, <?php echo $bagni[0]["MAX"]?>],
            step:1,
            stop:function(event, ui)
            {
                $('#bagni_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_bagni').val(ui.values[0]);
                $('#hidden_maximum_bagni').val(ui.values[1]);
                filter_data();
            }
        });
    });
</script>