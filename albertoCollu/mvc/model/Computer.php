<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Compute
 *
 * @author Riccardo
 */
class Computer {

    private $id;
    private $type;
    private $brand;
    private $model;
    private $inces;
    private $ram;
    private $os;
    private $cpu;
    private $storage;
    private $gpu;
    private $description;
    public static $arrayType = array(
        "Desktop",
        "Netbook",
        "Tablet"
    );
    public static $arrayInces = array(
        "10.1",
        "13.3",
        "14.2",
        "15.6",
        "17.2",
    );
    public static $arrayRam = array(
        "DDR1 1GB 400MHz",
        "DDR2 2GB 800MHz",
        "DDR3 4GB 1600MHz",
        "DDR3 8GB 1600MHz",
        "DDR3 16GB 1600MHz",
    );
    public static $arrayOs = array(
        "Linux Mint 17 x86",
        "Linux Mint 17 x64",
        "Windows 7 x86",
        "Windows 7 x64",
        "Windows 8.1 x64",
    );
    public static $arrayCpu = array(
        "i7-4980HQ",
        "i5-4910MQ",
        "i3-4690TG",
        "FX-4100",
        "FX-8350"
    );
    public static $arrayStorage = array(
        "250GB 7200RPM SATA3",
        "320GB 5400RPM SATA2",
        "500GB 7200RPM SATA2",
        "750GB 9600RPM SATA3",
        "128GB SSD SATA3",
        "180GB SSD SATA3",
    );
    public static $arrayGpu = array(
        "nVidia GeForce GTX 770",
        "nVidia GeForce GTX 760",
        "AMD Gigabyte Radeon R9 270X",
        "AMD Sapphire R7 240",
    );

    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getType() {
        return $this->type;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function getOs() {
        return $this->os;
    }

    public function getCpu() {
        return $this->cpu;
    }

    public function getStorage() {
        return $this->storage;
    }

    public function getGpu() {
        return $this->gpu;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setOs($os) {
        $this->os = $os;
    }

    public function setCpu($cpu) {
        $this->cpu = $cpu;
    }

    public function setStorage($storage) {
        $this->storage = $storage;
    }

    public function setGpu($gpu) {
        $this->gpu = $gpu;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getRam() {
        return $this->ram;
    }

    public function setRam($ram) {
        $this->ram = $ram;
    }

    public function getInces() {
        return $this->inces;
    }

    public function setInces($inces) {
        $this->inces = $inces;
    }

    public static function addComputer($computer) {
        $db = TecnoShop::getDatabase();
        if ($db == NULL) {
            return NULL;
        }
        $computer->setType($db->escape_string($computer->getType()));
        $computer->setBrand($db->escape_string($computer->getBrand()));
        $computer->setModel($db->escape_string($computer->getModel()));
        $computer->setInces($db->escape_string($computer->getInces()));
        $computer->setRam($db->escape_string($computer->getRam()));
        $computer->setOs($db->escape_string($computer->getOs()));
        $computer->setCpu($db->escape_string($computer->getCpu()));
        $computer->setStorage($db->escape_string($computer->getStorage()));
        $computer->setGpu($db->escape_string($computer->getGpu()));
        $computer->setDescription($db->escape_string($computer->getDescription()));

        $query = "INSERT INTO `" . NAME_DB . "`.`" . ModelDb::$mapperDb["tables"]["computersTable"] . "` (`"
                . ModelDb::$mapperDb["computersTable"]["id"] . "`, `"
                . ModelDb::$mapperDb["computersTable"]["type"] . "`, `"
                . ModelDb::$mapperDb["computersTable"]["brand"] . "`, `"
                . ModelDb::$mapperDb["computersTable"]["model"] . "`, `"
                . ModelDb::$mapperDb["computersTable"]["inces"] . "`, `"
                . ModelDb::$mapperDb["computersTable"]["ram"] . "`, `"
                . ModelDb::$mapperDb["computersTable"]["os"] . "`, `"
                . ModelDb::$mapperDb["computersTable"]["cpu"] . "`, `"
                . ModelDb::$mapperDb["computersTable"]["storage"] . "`, `"
                . ModelDb::$mapperDb["computersTable"]["gpu"] . "`, `"
                . ModelDb::$mapperDb["computersTable"]["description"] . "`) VALUES ("
                . "NULL, '"
                . $computer->getType() . "', '"
                . $computer->getBrand() . "', '"
                . $computer->getModel() . "', '"
                . $computer->getInces() . "', '"
                . $computer->getRam() . "', '"
                . $computer->getOs() . "', '"
                . $computer->getCpu() . "', '"
                . $computer->getStorage() . "', '"
                . $computer->getGpu() . "', '"
                . $computer->getDescription() . "' );";

        //il metodo add computer ggiunge un computer alla tabella computer e 
        //restituisce l'id del computer appena inserito (uno e uno solo)
        if ($db->getRowsAfterQuery($query) == 1) {
            $query = "SELECT `" . ModelDb::$mapperDb["computersTable"]["id"] . "` FROM `"
                    . NAME_DB . "`.`" . ModelDb::$mapperDb["tables"]["computersTable"] . "` WHERE `"
                    . ModelDb::$mapperDb["computersTable"]["type"] . "`='" . $computer->getType() . "' AND `"
                    . ModelDb::$mapperDb["computersTable"]["brand"] . "`='" . $computer->getBrand() . "' AND `"
                    . ModelDb::$mapperDb["computersTable"]["model"] . "`='" . $computer->getModel() . "' AND `"
                    . ModelDb::$mapperDb["computersTable"]["inces"] . "`='" . $computer->getInces() . "' limit 1;";

            $computerId = $db->getIdQuery($query);
            if ($computerId > 0) {
                return $computerId;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
