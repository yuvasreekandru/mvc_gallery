<?php

Class Database
{

    public function db_connect()
    {

        try{

            $dsn = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";";
            return $db = new PDO($dsn,DB_USER,DB_PASS);
            // show($db);
        }catch(PDOException $e){

            die($e->getMessage());
        }
    }
    public function read($query,$data = [])
    {
        $DB = $this->db_connect();
        $stmt = $DB->prepare($query);

        if(count($data) == 0){

            $stmt = $DB->query($query);
            $check = 0;

            if($stmt){
                $check = 1;
            }
        }else{

            $check = $stmt->execute($data);
        }

        if($check){
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }else{

            return false;
        }

    }
    public function write($query,$data = [])
    {
        $DB = $this->db_connect();
        $stmt = $DB->prepare($query);

        if(count($data) == 0){

            $stmt = $DB->query($query);
            $check = 0;

            if($stmt){
                $check = 1;
            }
        }else{

            $check = $stmt->execute($data);
        }

        if($check){
            
            return true;
        }else{

            return false;
        }

    }
}


?>