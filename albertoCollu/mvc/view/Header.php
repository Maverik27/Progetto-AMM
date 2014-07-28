<?php

/**
 * Description of Header
 *
 * @author Banana Joe
 */
class Header {

    private $meta;
    private $title;
    private $linkCss;

    public function __construct() {
        $this->meta = array();
        $this->linkCss = array();
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function addMeta($httpEquiv, $content) {
        array_push($this->meta, "<meta http-equiv=\"$httpEquiv\" content=\"$content\"/>\n ");
    }

    public function addLinkCss($href, $rel = "stylesheet", $type = "text/css") {
        array_push($this->linkCss, "<link rel=\"$rel\" type=\"$type\" href=\"$href\"/>\n ");
    }

    public function __toString() {
        $html = "<head>";
        $html.= "<title>" . $this->title . "</title>";
        for ($i = 0; $i < count($this->meta); $i++) {
            $html.= $this->meta[$i];
        }
        for($i=0; $i<count($this->linkCss);$i++){
            $html.=$this->linkCss[$i];
        }
        $html.="</head>";
        return $html;
    }

}
