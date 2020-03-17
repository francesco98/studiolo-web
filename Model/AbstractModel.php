<?php

namespace Model;

/*
    Classe astratta padre di tutti i model
    Gestisce le operazioni di find, findAll, save
*/

abstract class AbstractModel {

    private static $connectionManager;

    //Per ogni modello devo conoscere i campi che costituiscono la chiave primaria
    protected abstract static function getPrimaryKey(); 

    //Ritorno l'oggett per la gestione della connessione al database
    private static function getConnectionManager() {
        if(self::$connectionManager == null) {
            self::$connectionManager = new ConnectionManager();
        }

        return self::$connectionManager;
    }
    
    //Ritorna il nome della classe completo (con namespaces)
    private static function getCompleteClassName() {
        return get_called_class();
    }

    //Ritorna il nome della classe escluso di namespaces
    private static function getClassName() {
        $className = self::getCompleteClassName();
        $path = explode('\\', $className);

        return strtolower(array_pop($path));
    }

    //Converto il risultato di una query in un array di oggetti del tipo della classe (modello) stesso
    public static function convertToClass($result) {
        $className = self::getCompleteClassName();

        $all = [];

        foreach($result as $row) {
            $c = new $className();

            foreach($c as $key => $value) {
                if(array_key_exists($key, $row)) {
                    $c->{$key} = $row[$key];
                }
            }

            array_push($all, $c);
        }

        return $all;
    }

    //Restituisce tutte le righe della tabella
    public static function findAll() {
        $result = self::getConnectionManager()->query(self::getClassName());

        return self::convertToClass($result);
    }

    //Restituisce le righe di una tabella ad una specifica condizione
    public static function find($where) {
        $result = self::getConnectionManager()->query(self::getClassName(), $where);

        //Se ho una sola riga, evito l'array e restitusco l'oggetto
        if(count($result) == 1)
            return self::convertToClass($result)[0];
        else 
            return self::convertToClass($result);
    }
    
    //Metodo che effettua update o insert sul database per aggiorarlo
    public function save() {
        $primaryAll = [];
        $allAttr = [];

        //Costruisco gli array $primaryAll e $allAttr
        foreach($this as $key => $value) {
            $allAttr[$key] = $value;

            if(in_array($key, static::getPrimaryKey())) {
                $primaryAll[$key] = $value;
            }
        }

        //Prova a fare una select sui campi che costituiscono la chiave primaria
        $selected = self::find($primaryAll);

        //Se la riga esiste, faccio un update
        if(is_object($selected) || (is_array($selected) && count($selected) > 0)) {
            self::getConnectionManager()->update(self::getClassName(), $allAttr, $primaryAll);
        }
        //Se la riga non esiste, faccio insert 
        else {
            self::getConnectionManager()->insert(self::getClassName(), $allAttr);
        }

        //Ritorno l'oggetto aggiornato
        return self::find($primaryAll);
    }

    public function delete() {
        $primaryAll = [];

        foreach($this as $key => $value) {
            if(in_array($key, static::getPrimaryKey())) {
                $primaryAll[$key] = $value;
            }
        }

        self::getConnectionManager()->delete(self::getClassName(), $primaryAll);
    }

}