<?php

/**
 * Description of ViewerMagazine
 *
 * @author Alberto
 */
class ViewerMagazine {

    function __construct() {
        
    }

    public static function viewerMagazine() {
        $html = "<br/><div class=\"vetrina\"><div class=\"template\"><div class=\"info\">";
        $html .= "<fieldset><legend style=\"text-align: left\">Dati Prodotto</legend>";
        $html .= "<ul><li class=\"riepilogo\">Tablet</li><br/>";
        $html .= "<li class=\"riepilogo\">Samsung</li><br/>";
        $html .= "<li class=\"riepilogo\">Galaxy Note 10.1</li><br/>";
        $html .= "<li class=\"riepilogo\">10</li></ul>";
        $html .= "</fieldset></div>";
        $html .= "<div class=\"photo\"><img src=\"css/img/vetrina1.png\"></div>";
        $html .= "<div class=\"price\">Prezzo 499</div>";
        $html .= "</div></div>";
        return $html;
    }

}
