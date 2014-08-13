<?php
require_once 'mvc/controller/TecnoShopManager.php';
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
                    <option value="" selected="selected">Desktop</option>
                    <option value="">Notebook</option>
                    <option value="">Tablet</option>
                </select>           
            </div>
            <br/>
            <div>
                <label class="labelNew" for="brandPc">Marca</label>
                <input class="selectNew" type="text" name="brandPc" placeholder="Marca" value="">
            </div>
            <br/>
            <div>
                <label class="labelNew" for="modelPc">Modello</label>
                <input class="selectNew" type="text" name="modelPc" placeholder="Modello" value="">
            </div>
            <br/>
            <div>
                <label class="labelNew" for="display">Display</label>
                <select class="selectNew" name="display">
                    <option value="">10.1"</option>
                    <option value="">13.3"</option>
                    <option value="">14.1"</option>
                    <option value="" selected="selected">15.6"</option>
                    <option value="">17.2"</option>
                </select>           
            </div>
            <br/>
            <div>
                <label class="labelNew" for="system">Sistema Operativo</label>
                <select class="selectNew" name="system">
                    <option value="">Linux mint 17 x86</option>
                    <option value="">Linux mint 17 x64</option>
                    <option value="">Windows 7 x86</option>
                    <option value="">Windows 7 x64</option>
                    <option value="" selected="selected">Windows 8.1 x64</option>
                </select>           
            </div>
            <br/>
            <div>
                <label class="labelNew" for="cpu">Processore</label>
                <select class="selectNew" name="cpu">
                    <option value="" selected="selected">Intel® Core™ i7-4980HQ (4.20 GHz)</option>
                    <option value="">Intel® Core™ i5-4910MQ (3.90 GHz)</option>
                    <option value="">Intel® Core™ i3-4690TG (3.20 GHz)</option>
                    <option value="">AMD® FX-4100 (3.70 GHz)</option>
                    <option value="">AMD® FX-8350 (4.10 GHz)</option>
                </select>           
            </div>
            <br/>
            <div>
                <label class="labelNew" for="ram">Memoria Ram</label>
                <select class="selectNew" name="ram">
                    <option value="" selected="selected">DDR1 G.Skill F1-3200PHU1-1GBNT 1GB 400MHz</option>
                    <option value="">DDR2 G.Skill F2-6400CL5S-2GBNT 2GB 800MHz</option>
                    <option value="">DDR3 G.Skill F3-12800CL9D-4GBXL 4GB 1600MHz</option>
                    <option value="">DDR3 G.Skill Ares PC3-12800 8GB 1600MHz</option>
                    <option value="">DDR3 Corsair Vengeance 16GB 1600MHz</option>
                </select>           
            </div>
            <br/>
            <div>
                <label class="labelNew" for="hdd">Archiviazione</label>
                <select class="selectNew" name="hdd">
                    <option value="" selected="selected">Western Digital Black 250GB 7200RPM 16MB SATA3 2.5"</option>
                    <option value="">Western Digital WD3200LPVT 320GB 5400RPM 8MB SATA2 2.5"</option>
                    <option value="">Seagate ST500VT000 500GB 7200RPM 16MB SATA2 2.5"</option>
                    <option value="">Western Digital Blue 750GB 9600RPM SATA3 2.5"</option>
                    <option value="">Corsair Force GS 128GB SSD R(560MB/s) WR(535MB/s) SATA3</option>
                    <option value="">Corsair Force GS 180GB SSD R(555MB/s) WR(525MB/s) SATA3</option>
                </select>           
            </div>
            <br/>
            <div>
                <label class="labelNew" for="gpu">Scheda Video</label>
                <select class="selectNew" name="gpu">
                    <option value="" selected="selected">nVidia GeForce GTX 770</option>
                    <option value="">nVidia GeForce GTX 760</option>
                    <option value="">AMD Gigabyte Radeon R9 270X</option>
                    <option value="">AMD Sapphire R7 240</option>
                </select>           
            </div>
            <br/>
            <div>
                <label class="labelNew" for="numDisponibili">Pezzi in magazzino</label>
                <input class="selectNew" type="text" name="numDisponibili" placeholder="numero pezzi" value="">
            </div>
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
            <button class="selectNew" type="submit" name="action" value="addNew">Aggiungi Prodotto</button>
        </fieldset>
    </form>
</div>
