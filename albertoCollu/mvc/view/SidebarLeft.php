<?php

/**
 * Description of SidebarLeft
 *
 * @author Banana Joe
 */
class SidebarLeft {

    function __construct() {
        
    }

    public function __toString() {
        $html = "<div id=\"sidebar\">";
        $html.="<a href=\"#\" <img src=\"img/pcTablet.pnj\" width=\"155\" height=\"85\"/> Pc e Tablet </a>\n ";
        $html.="<a href=\"#\" <img src=\"img/Desktop.pnj\" width=\"155\" height=\"85\"/> Desktop Pc </a>\n ";
        $html.="<a href=\"#\" <img src=\"img/Accessori.pnj\" width=\"155\" height=\"85\"/> Accessori </a>\n ";
        $html.="<a href=\"#\" <img src=\"img/Monitor.pnj\" width=\"155\" height=\"85\"/> Monitor </a>\n ";
        $html.="</div>";

        return $html;
    }

}
