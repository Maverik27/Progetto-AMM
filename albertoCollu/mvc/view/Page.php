<?php

require_once 'Content.php';
require_once 'Footer.php';
require_once 'Header.php';
require_once 'Head.php';
require_once 'SidebarLeft.php';

/**
 * Description of Page
 *
 * @author Alberto Collu
 */
class Page {

    private $head;
    private $header;
    private $sidebarLeft;
    private $content;
    private $footer;

    public function __construct() {
        $this->head = new Head();
        $this->header = new Header();
        $this->sidebarLeft = new SidebarLeft();
        $this->content = new Content();
        $this->footer = new Footer();
    }

    public function pageTop() {
        $html = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
        $html.= "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"it\">\n";
        $html.= $this->head;
        $html.= "<body>\n";
        $html.= "<div class=\"page\">";
        $html.= "<FONT FACE=\"Lucida Sans Unicode\" SIZE=\"2\">";
        $html.= $this->header;
        $html.= $this->sidebarLeft;
        $html.= $this->content->contentTop();
        return $html;
    }

    public function pageBottom() {
        $html = $this->content->contentBottom();
        $html.= $this->footer;
        $html.= "</FONT>";
        $html.= "</div>\n</body>\n";
        $html.= "</html>\n";
        return $html;
    }

    public function getHeader() {
        return $this->header;
    }

    public function getContent() {
        return $this->content;
    }

    public function getFooter() {
        return $this->footer;
    }

    public function getHead() {
        return $this->head;
    }

    public function getSidebarLeft() {
        return $this->sidebarLeft;
    }

}
