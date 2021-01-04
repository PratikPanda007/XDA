<?php
class DB{
    
    private static function connect(){
        //pdo = PHP Data Object
        $pdo = new PDO('mysql:host=127.0.0.1; dbname=xda; charset=utf8mb4','root','');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //PDO::ATTR_ERRMODE will report the Error
        //PDO::ERRMODE_EXCEPTION will throw the exception
        return $pdo;
    }
    
    public static function query($query, $params = array()){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        
    if(explode(' ', $query)[0] == 'SELECT'){
        $data = $statement->fetchAll();
        return $data;
        
        //This explode method will take the first word of this query line, if the first word of the query line is 'SELECT' then it will execute the block of code. fetchAll() will fetch all the data from the database and will return all the data from the database.
    }
    }
}

?>
