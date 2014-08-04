<?php

/**
 * Description of ModelDb
 *
 * @author Alberto
 */
class ModelDb {

    /*
     * inizializzo l'array mapperDb con i campi delle rispettive 
     * tabelle del database creato
     */
    static $mapperDb = Array(
        "tables" => Array(
            "usersTable" => "users"
        ),
        "usersTable" => Array(
            "id" => "id",
            "email" => "email",
            "password" => "password",
            "name" => "name",
            "surname" => "surname",
            "address" => "address",
            "identity" => "identity",
            "credit" => "credit",
        ), //fine prima tabella
    );

}
