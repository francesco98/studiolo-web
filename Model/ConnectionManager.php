<?php

namespace Model;

use PDO;
use PDOException;

/*
    Classe che gestisce la connessione al database
*/
class ConnectionManager
{

    //Parametri di connessione al database
    private static $serverName = "studiolo-db"; //Change in localhost
    private static $dbName = "studioloweb";
    private static $user = "studioloweb";
    private static $pass = "Q1LovzEYdUUpmRgV";

    []

    private $myConn;

    public function __construct()
    {
        try {
            //Prova la connessione al database
            $this->myConn = new PDO("mysql:host=" . self::$serverName . ";dbname=" . self::$dbName, self::$user, self::$pass);

            //In caso di errore, lancia un eccezione
            $this->myConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Ops.. qualcosa non ha funzionato! " . $e->getMessage();
        }
    }

    //Metodo che effettua una query
    public function query($name, $where = [], $which = []) {
        $sql = "SELECT ";
    
        //Se è stata fatta una selezione sui campi
        if(empty($which)) {
            $sql .= "*";
        } else {
            foreach($which as $field) {
                $sql .= $field . ",";
            }

            //Tolgo la virgola alla fine
            $sql = substr($sql, 0, strlen($sql)-1);
        }

        $sql .= " FROM " . $name;
        $values = [];

        //Se è stata fatta una selezione sui valori
        if(!empty($where)) {
            $sql .= " WHERE ";
            foreach($where as $key => $value) {
                $sql .= $key . " = ? AND ";
                array_push($values, $value);
            }

            //Tolgo AND alla fine 
            $sql = substr($sql, 0, strlen($sql)-4);
        }
        
        $query = $this->myConn->prepare($sql);
        $query->execute($values);

        return $query->fetchAll();
    }

    //Metodo che effettua l'inserimento di una riga sul database
    public function insert($name, $values) {
        $sql = "INSERT INTO " . $name;

        $fields = "";
        $vfields = "";
        $vvalues = [];

        //Costruisco tutti i campi con i rispettivi valori
        foreach($values as $key => $value) {
            $fields .= $key . ",";
            $vfields .= "?,";

            array_push($vvalues, $value);            
        }

        //Tolgo la virgola
        $fields = substr($fields, 0, strlen($fields)-1);
        $vfields = substr($vfields, 0, strlen($vfields)-1);

        $sql .= "(" . $fields . ") VALUES (" . $vfields . ")";

        $query = $this->myConn->prepare($sql);
        $query->execute($vvalues);
    }

    //Metodo che effettua l'aggiornamento di una riga sul database
    public function update($name, $values, $where) {
        $sql = "UPDATE " . $name . " SET ";

        $vvalues = [];

        //Costruisco tutte le coppie campo=valore
        foreach($values as $key => $value) {
            $sql .= $key . "=?,";
            array_push($vvalues, $value);
        }

        $sql = substr($sql, 0, strlen($sql)-1);

        //Realizzo la condizione
        $sql .= " WHERE ";
        foreach($where as $key => $value) {
            $sql .= $key . " = ? AND ";
            array_push($vvalues, $value);
        }
        $sql = substr($sql, 0, strlen($sql)-4);

        $query = $this->myConn->prepare($sql);
        $query->execute($vvalues);
    }

    public function delete($name, $where) {
        $sql = "DELETE FROM " . $name . " WHERE ";

        $vvalues = [];

        foreach($where as $key => $value) {
            $sql .= $key . " = ? AND ";
            array_push($vvalues, $value);
        }
        $sql = substr($sql, 0, strlen($sql)-4);
        
        $query = $this->myConn->prepare($sql);
        $query->execute($vvalues);
    }

    //Chiusura della connessione
    public function close() {
        $this->myConn = null;
    }

    public function __destruct()
    {
        $this->close();
    }


}
