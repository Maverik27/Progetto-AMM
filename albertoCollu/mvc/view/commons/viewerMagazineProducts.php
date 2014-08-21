<?php

/**
 * Description of viewerMagazineProducts
 *
 * @author Alberto
 */
class viewerMagazineProducts {

    function __construct() {
        
    }

    public static function viewerMagazine() {
        $html = "<br/><div class=\"vetrina\"><div class=\"template1\"><div class=\"info1\">";
        $html .= "<fieldset><legend style=\"text-align: left\">Dati Prodotto</legend>";
        $html .= "<ul><li class=\"riepilogo\">Tablet</li>";
        $html .= "<li class=\"riepilogo\">Samsung</li>";
        $html .= "<li class=\"riepilogo\">Galaxy Note 10.1</li>";
        $html .= "<li class=\"riepilogo\">10</li></ul>";
        $html .= "</fieldset></div>";
        $html .= "<div class=\"photo1\"><img src=\"css/img/vetrina1.png\"></div>";
        $html .= "<div class=\"price1\">Prezzo 499</div>";
        $html .= "</div></div>";
        return $html;
    }

    public static function viewerProductsToBy() {
        $html = "<br/><div class=\"vetrina\"><div class=\"template2\"><div class=\"info2\">";
        $html .= "<fieldset><legend style=\"text-align: left\">Dati Prodotto</legend>";
        $html .= "<ul><li class=\"riepilogo\">Tipologia</li>";
        $html .= "<li class=\"riepilogo\">Marca</li>";
        $html .= "<li class=\"riepilogo\">Modello</li>";
        $html .= "<li class=\"riepilogo\">Display</li>";
        $html .= "<li class=\"riepilogo\">Sistema Operativo</li>";
        $html .= "<li class=\"riepilogo\">Ram</li>";
        $html .= "<li class=\"riepilogo\">Processore</li>";
        $html .= "<li class=\"riepilogo\">Archiviazione</li>";
        $html .= "<li class=\"riepilogo\">Scheda Video</li>";
        $html .= "<li class=\"riepilogo\">Pezzi Disponibili</li>";
        $html .= "</fieldset></div>";
        $html .= "<div class=\"photo2\"><img src=\"css/img/code.jpg\"></div>";
        $html .= "<div class=\"price2\">Prezzo 499</div>";
        if (AccesManager::checkAccess(AccesManager::ACCESS_GUEST)) {
            $html .= "<button class=\"bayProd\" onclick=\"guestCantBay()\">Compra</button>";
            $html .= "<script>function guestCantBay(){alert(\"Non puoi acquistare se non sei registrato! ";
            $html .= "Registrati oppure effettua il Login al nostro sito!\");}</script>";
        } else {
            $html .="<button class=\"bayProd\" type=\"submit\" name=\"bay\" value=\"\">Compra</button>";
        }
        $html .= "</div></div>";
        return $html;
    }

}
