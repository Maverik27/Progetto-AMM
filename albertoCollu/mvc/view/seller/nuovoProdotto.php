<?php
require_once 'mvc/controller/TecnoShopManager.php';
require_once (__DIR__) . '/../../model/Computer.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOBUYER);
?>

<div class="titleReg"><h1>Aggiungi un nuovo prodotto!</h1></div>

<div class="addNew">
    <form class="" action="index.php?page=nuovoProdotto&action=addNew" method="post">
        <fieldset><legend>Scheda Prodotto</legend>
            <br/>
            <div>
                <label class="labelNew" for="type">Tipologia Prodotto</label>

                <select class="selectNew" name="type">
                    <?php
                    for ($i = 0; $i < count(Computer::$arrayType); $i++) {
                        if ($i == 0) {
                            echo '<option value=\"' . Computer::$arrayType[$i] . '\" selected=\"selected\">' . Computer::$arrayType[$i] . '</option>';
                        } else {
                            echo '<option value=\"' . Computer::$arrayType[$i] . '\">' . Computer::$arrayType[$i] . '</option>';
                        }
                    }
                    ?>
                </select>           
            </div>
            <br/>
            <br/>
            <div>
                <label class="labelNew" for="brand">Marca</label>
                <input class="selectNew" type="text" name="brand" placeholder="Marca" value="">
            </div>
            <br/>
            <br/>
            <div>
                <label class="labelNew" for="model">Modello</label>
                <input class="selectNew" type="text" name="model" placeholder="Modello" value="">
            </div>
            <br/>
            <br/>
            <div>
                <label class="labelNew" for="inces">Display</label>
                <select class="selectNew" name="inces">
                    <?php
                    for ($i = 0; $i < count(Computer::$arrayInces); $i++) {
                        if ($i == 0) {
                            echo '<option value=\"' . Computer::$arrayInces[$i] . '\" selected=\"selected\">' . Computer::$arrayInces[$i] . '"</option>';
                        } else {
                            echo '<option value=\"' . Computer::$arrayInces[$i] . '\">' . Computer::$arrayInces[$i] . '"</option>';
                        }
                    }
                    ?>
                </select>           
            </div>
            <br/>
            <br/>
            <div>
                <label class="labelNew" for="os">Sistema Operativo</label>
                <select class="selectNew" name="os">
                    <?php
                    for ($i = 0; $i < count(Computer::$arrayOs); $i++) {
                        if ($i == 0) {
                            echo '<option value=\"' . Computer::$arrayOs[$i] . '\" selected=\"selected\">' . Computer::$arrayOs[$i] . '</option>';
                        } else {
                            echo '<option value=\"' . Computer::$arrayOs[$i] . '\">' . Computer::$arrayOs[$i] . '</option>';
                        }
                    }
                    ?>
                </select>           
            </div>
            <br/>
            <br/>
            <div>
                <label class="labelNew" for="cpu">Processore</label>
                <select class="selectNew" name="cpu">
                    <?php
                    for ($i = 0; $i < count(Computer::$arrayCpu); $i++) {
                        if ($i == 0) {
                            echo '<option value=\"' . Computer::$arrayCpu[$i] . '\" selected=\"selected\">' . Computer::$arrayCpu[$i] . '</option>';
                        } else {
                            echo '<option value=\"' . Computer::$arrayCpu[$i] . '\">' . Computer::$arrayCpu[$i] . '</option>';
                        }
                    }
                    ?>
                </select>           
            </div>
            <br/>
            <br/>
            <div>
                <label class="labelNew" for="ram">Memoria Ram</label>
                <select class="selectNew" name="ram">
                    <?php
                    for ($i = 0; $i < count(Computer::$arrayRam); $i++) {
                        if ($i == 0) {
                            echo '<option value=\"' . Computer::$arrayRam[$i] . '\" selected=\"selected\">' . Computer::$arrayRam[$i] . '</option>';
                        } else {
                            echo '<option value=\"' . Computer::$arrayRam[$i] . '\">' . Computer::$arrayRam[$i] . '</option>';
                        }
                    }
                    ?>
                </select>           
            </div>
            <br/>
            <br/>
            <div>
                <label class="labelNew" for="storage">Archiviazione</label>
                <select class="selectNew" name="storage">
                    <?php
                    for ($i = 0; $i < count(Computer::$arrayStorage); $i++) {
                        if ($i == 0) {
                            echo '<option value=\"' . Computer::$arrayStorage[$i] . '\" selected=\"selected\">' . Computer::$arrayStorage[$i] . '</option>';
                        } else {
                            echo '<option value=\"' . Computer::$arrayStorage[$i] . '\">' . Computer::$arrayStorage[$i] . '</option>';
                        }
                    }
                    ?>
                </select>           
            </div>
            <br/>
            <br/>
            <div>
                <label class="labelNew" for="gpu">Scheda Video</label>
                <select class="selectNew" name="gpu">
                    <?php
                    for ($i = 0; $i < count(Computer::$arrayGpu); $i++) {
                        if ($i == 0) {
                            echo '<option value=\"' . Computer::$arrayGpu[$i] . '\" selected=\"selected\">' . Computer::$arrayGpu[$i] . '</option>';
                        } else {
                            echo '<option value=\"' . Computer::$arrayGpu[$i] . '\">' . Computer::$arrayGpu[$i] . '</option>';
                        }
                    }
                    ?>
                </select>           
            </div>
            <br/>
            <br/>
            <div>
                <label class="labelNew" for="nitems">Pezzi in magazzino</label>
                <input class="selectNew" type="text" name="nitems" placeholder="numero pezzi" value="">
            </div>
            <br/>
            <br/>
            <div>
                <label class="labelNew" for="price">Prezzo</label>
                <input class="selectNew" type="text" name="price" placeholder="Prezzo" value="">
            </div>
            <br/>
            <br/>
            <div>
                <textarea name="testo" rows="8" cols="74">Descrizione prodotto..</textarea>
            </div>
            <br/>
            <button class="selectNewButton" type="submit" name="action" value="addNew">Aggiungi Prodotto</button>
        </fieldset>
    </form>
</div>
