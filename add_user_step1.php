<div id="w4-account" class="tab-pane active">
    <?php
    if (isset($_GET['clienti'])){
        $sql = 'SELECT * FROM AgenziaClienti WHERE id_cliente='.$_GET['clienti'];
        $result=mysqli_query($conn, $sql);
        $utenti = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
    }
    ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="w4-first_name">Nome</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="first_name" id="first_name" required <?php
            if(isset($_GET['clienti'])){
                echo 'value="'.$utenti['first_name'].'"';
            }
            ?>>
            <?php if (isset($_GET['clienti'])){ ?>
            <input type="hidden" class="form-control" name="id_cliente" id="id_cliente" value="<?php
            if (isset($_GET['clienti'])){
                echo $_GET['clienti'];
            }
            ?>">
            <?php }?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="w4-last_name">Cognome</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="last_name" id="last_name" required <?php
            if(isset($_GET['clienti'])){
                echo 'value="'.$utenti['last_name'].'"';
            }
            ?>>
        </div>
    </div>
    <div class="form-group dob" hidden>
        <label class="col-sm-3 control-label" for="inputSuccess">Data di nascita</label>
        <div class="col-sm-2">
            <select class="form-control" name="exp-day" required id="birthday_day">
                <option value="00" selected>00</option>
                <?php
                for($i = 1; $i <= 31; $i++){
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control" name="exp-month" required id="birthday_month">
                <option value="01" selected>Gennaio</option>
                <option value="02">Febbraio</option>
                <option value="03">Marzo</option>
                <option value="04">Aprile</option>
                <option value="05">Maggio</option>
                <option value="06">Giugno</option>
                <option value="07">Luglio</option>
                <option value="08">Agosto</option>
                <option value="09">Settembre</option>
                <option value="10">Ottobre</option>
                <option value="11">Novembre</option>
                <option value="12">Dicembre</option>
            </select>
        </div>
        <div class="col-sm-2">
            <select class="form-control" name="exp-year" required id="birthday_year">
                <option value="0000">0000</option>
                <?php
                $currYear = intval(date('Y'));
                $oldestYear = $currYear - 100;

                for($i = $currYear; $i >= $oldestYear; $i--){
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="telephone">Telefono</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="telephone" id="telephone" <?php
            if(isset($_GET['clienti'])){
                echo 'value="'.$utenti['telephone'].'"';
            }
            ?>>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" name="email" id="email" <?php
            if(isset($_GET['clienti'])){
                echo 'value="'.$utenti['email'].'"';
            }
            ?>>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Privacy</label>
        <div class="col-md-6">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input">
                        <i class="fa fa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-default btn-file">
                        <span class="fileupload-exists">Cambia</span>
                        <span class="fileupload-new">Seleziona File</span>
                        <input type="file" name="privacy_file" accept="image/jpeg,image/gif,image/png,application/pdf">
                    </span>
                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Rimuovi</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Foglio di visita</label>
        <div class="col-md-6">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input">
                        <i class="fa fa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-default btn-file">
                        <span class="fileupload-exists">Cambia</span>
                        <span class="fileupload-new">Seleziona File</span>
                        <input type="file" name="visita_file" accept="image/jpeg,image/gif,image/png,application/pdf">
                    </span>
                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Rimuovi</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group dob" hidden>
        <label class="col-sm-3 control-label" for="user_type">Tipo di utente</label>
        <div class="col-sm-2">
            <select class="form-control" name="user_type" id="user_type" required>
                <option value="vende">Vende Casa</option>
                <option value="cerca">Cerca Casa</option>
            </select>
        </div>
    </div>
</div>

