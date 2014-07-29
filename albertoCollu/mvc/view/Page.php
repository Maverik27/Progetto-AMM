<?php

require_once 'Content.php';
require_once 'Footer.php';
require_once 'Header.php';
require_once 'Head.php';
require_once 'SidebarLeft.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author Banana Joe
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
        $html.= $this->header;
        $html.= $this->sidebarLeft;
        $html.= $this->content->contentTop();
        return $html;
    }

    public function pageBottom() {
        $html = $this->content->contentBottom();
        $html.= $this->footer;
        $html.= "</div>\n</body>\n";
        $html.= "</html>\n";
        return $html;
    }

    public function getHeader() {
        return $this->header;
    }

    public function getSiderLeft() {
        return $this->sidebarLeft;
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
