<div id="w4-profile" class="tab-pane">
    <div class="form-group">
        <label class="col-md-3 control-label" for="inputSuccess">Tipologia:</label>
        <div class="col-md-6">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="albergo" name="type_house[]" class="info-aggiuntive tipolgia_interesse">
                        Albergo
                    </label>
                </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="appartamenti" name="type_house[]" class="info-aggiuntive tipolgia_interesse">
                    Appartamenti
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="attivita" name="type_house[]" class="info-aggiuntive tipolgia_interesse">
                    Attivit&agrave;
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="ville" name="type_house[]" class="info-aggiuntive tipolgia_interesse">
                    Ville
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="rustici" name="type_house[]" class="info-aggiuntive tipolgia_interesse">
                    Rustici / cascine / case
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="box" name="type_house[]" class="info-aggiuntive tipolgia_interesse">
                    Box / posti auto
                </label>
            </div>
        </div>
    </div>

    <div class="form-group" id="div_immobile_vendita_paese" hidden>
        <label class="col-sm-3 control-label" for="immobile_vendita_paese">Paese</label>
        <div class="col-sm-6">
            <select class="form-control" name="immobile_vendita_paese" id="immobile_vendita_paese" required>
                <option value="Borca">Borca</option>
                <option value="Cortina">Cortina</option>
                <option value="San Vito">San Vito</option>
                <option value="Valle">Valle</option>
                <option value="Vodo">Vodo</option>
            </select>
        </div>
    </div>
    <div class="form-group" id="div_immobile_ricerca_paese">
        <label class="col-md-3 control-label" for="inputSuccess">Paesi di interesse:</label>
        <div class="col-md-6">
            <?php
            $paesi = array('Borca', 'Cortina','San Vito', 'Valle', 'Vodo');
            sort($paesi);
            foreach($paesi as $paese) {
                echo '
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="'.$paese.'" name="immobile_ricerca_paesi[]" class="info-aggiuntive paesi_interesse">
                        '.$paese.'
                    </label>
                </div>
                ';
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="rif_num_inviato">Riferimenti inviati</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="rif_num_inviato" id="rif_num_inviato">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="rif_num_visitato">Riferimenti visitati</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="rif_num_visitato" id="rif_num_visitato">
        </div>
    </div>
<!--    <div class="form-group">-->
<!--        <label class="col-sm-3 control-label" for="metratura">Metratura</label>-->
<!--        <div class="col-sm-2">-->
<!--            <input type="text" class="form-control" name="metratura" id="metratura">-->
<!--        </div>-->
<!--        m<sup>2</sup>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label class="col-sm-3 control-label" for="anno">Anno immobile</label>-->
<!--        <div class="col-sm-2">-->
<!--            <input type="text" class="form-control" name="anno" id="anno" value="-">-->
<!--        </div>-->
<!--    </div>-->
    <div class="form-group">
        <label class="col-sm-3 control-label" for="prezzo">Budget</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="prezzo" id="prezzo">
        </div>
    </div>
<!--    <div class="form-group">-->
<!--        <label class="col-sm-3 control-label" for="provvigione">Tipo di provvigione</label>-->
<!--        <div class="col-sm-2">-->
<!--            <input type="text" class="form-control" name="provvigione" id="provvigione">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label class="col-sm-3 control-label" for="locali">Numero di locali</label>-->
<!--        <div class="col-sm-2">-->
<!--            <select class="form-control" name="locali" id="locali">-->
<!--                <option value="1" selected>1</option>-->
<!--                --><?php
//                    for($i = 2; $i <= 10; $i++) {
//                        echo '<option value="' . $i . '">' . $i . '</option>';
//                    }
//                ?>
<!--            </select>-->
<!--        </div>-->
<!--    </div>-->
    <div class="form-group">
        <label class="col-sm-3 control-label" for="camere">Camere</label>
        <div class="col-sm-2">
            <select class="form-control" name="camere" id="camere">
                <option value="1" selected>1</option>
                <?php
                for($i = 2; $i <= 10; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="bagni">Bagni</label>
        <div class="col-sm-2">
            <select class="form-control" name="bagni" id="bagni">
                <option value="1" selected>1</option>
                <?php
                for($i = 2; $i <= 10; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
<!--    <div class="form-group">-->
<!--        <label class="col-sm-3 control-label" for="classe_energetica">Classe energetica</label>-->
<!--        <div class="col-sm-2">-->
<!--            <select class="form-control" name="classe_energetica" id="classe_energetica">-->
<!--                <option value="">----</option>-->
<!--                <option value="a">A</option>-->
<!--                <option value="b">B</option>-->
<!--                <option value="c">C</option>-->
<!--                <option value="d">D</option>-->
<!--                <option value="e">E</option>-->
<!--                <option value="f">F</option>-->
<!--                <option value="g">G</option>-->
<!--            </select>-->
<!--        </div>-->
<!--    </div>-->
    <div class="form-group">
        <label class="col-sm-3 control-label" for="description">Note</label>
        <div class="col-md-9">
            <textarea class="form-control" rows="3" id="description" name="description" data-plugin-textarea-autosize="" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 86px;"></textarea>
        </div>
    </div>
<!--    <div class="form-group">-->
<!--        <label class="col-sm-3 control-label" for="arredamento">Arredamento</label>-->
<!--        <div class="col-sm-3">-->
<!--            <select class="form-control" name="arredamento" id="arredamento">-->
<!--                <option value="arredato">Arredato</option>-->
<!--                <option value="non arredato">Non arredato</option>-->
<!--                <option value="parzialmente arredato">Parzialmente arredato</option>-->
<!--            </select>-->
<!--        </div>-->
<!--    </div>-->

    <div class="form-group">
        <label class="col-md-3 control-label" for="inputSuccess">Informazioni aggiuntive</label>
        <div class="col-md-6">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="pauto" name="pauto" class="info-aggiuntive">
                    Posto Auto
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="garage" name="garage" class="info-aggiuntive">
                    Garage
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="giardino" name="giardino" class="info-aggiuntive">
                    Giardino
                </label>
            </div>
<!--            <div class="checkbox">-->
<!--                <label>-->
<!--                    <input type="checkbox" value="balcone" name="balcone" class="info-aggiuntive">-->
<!--                    Balcone-->
<!--                </label>-->
<!--            </div>-->
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="terrazzo" name="terrazzo" class="info-aggiuntive">
                    Terrazzo
                </label>
            </div>
        </div>
    </div>
</div>
