<?php
require_once 'mvc/controller/TecnoShopManager.php';
TecnoShopManager::protect(AccesManager::ACCESS_NOBUYER);
?>

<div class="titleReg"><h1>Aggiungi un nuovo prodotto!</h1></div>

<div class="addNew">
    <form class="" action="index.php?page=nuovoProdotto&action=addNew" method="post">
        <div>
            <label for="display">Display</label>
            <select class="inReg" name="display">
                <option value="">10.1"</option>
                <option value="">13.3"</option>
                <option value="">14.1"</option>
                <option value="" selected="selected">15.6"</option>
                <option value="">17.2"</option>
            </select>           
        </div>
        <br/>
        <br/>
        <div>
            <label for="system">Sistema Operativo</label>
            <select class="inReg" name="system">
                <option value="">Linux mint 17 x86</option>
                <option value="">Linux mint 17 x64</option>
                <option value="">Windows 7 x86</option>
                <option value="">Windows 7 x64</option>
                <option value="" selected="selected">Windows 8.1 x64</option>
            </select>           
        </div>
        <br/>
        <br/>
        <div>
            <label for="cpu">Processore</label>
            <select class="inReg" name="cpu">
                <option value="" selected="selected">Intel® Core™ i7-4980HQ (4.20 GHz)</option>
                <option value="">Intel® Core™ i5-4910MQ (3.90 GHz)</option>
                <option value="">Intel® Core™ i3-4690TG (3.20 GHz)</option>
                <option value="">AMD® FX-4100 (3.70 GHz)</option>
                <option value="">AMD® FX-8350 (4.10 GHz)</option>
            </select>           
        </div>
        <br/>
        <br/>
        <div>
            <label for="ram">Memoria Ram</label>
            <select class="inReg" name="ram">
                <option value="" selected="selected">DDR1 G.Skill F1-3200PHU1-1GBNT 1GB 400MHz</option>
                <option value="">DDR2 G.Skill F2-6400CL5S-2GBNT 2GB 800MHz</option>
                <option value="">DDR3 G.Skill F3-12800CL9D-4GBXL 4GB 1600MHz</option>
                <option value="">DDR3 G.Skill Ares PC3-12800 8GB 1600MHz</option>
                <option value="">DDR3 Corsair Vengeance 16GB 1600MHz</option>
            </select>           
        </div>
        <br/>
        <br/>
        <div>
            <label for="hdd">Archiviazione</label>
            <select class="inReg" name="hdd">
                <option value="" selected="selected">Western Digital Black 250GB 7200RPM 16MB SATA3 2.5"</option>
                <option value="">Western Digital WD3200LPVT 320GB 5400RPM 8MB SATA2 2.5"</option>
                <option value="">Seagate ST500VT000 500GB 7200RPM 16MB SATA2 2.5"</option>
                <option value="">Western Digital Blue 750GB 9600RPM SATA3 2.5"</option>
                <option value="">Corsair Force GS 128GB SSD R(560MB/s) WR(535MB/s) SATA3</option>
                <option value="">Corsair Force GS 180GB SSD R(555MB/s) WR(525MB/s) SATA3</option>
            </select>           
        </div>
        <br/>
        <br/>
        <button class="inReg" type="submit" name="action" value="addNew">Aggiungi Prodotto</button>
    </form>
</div>
