<?php

class User{
    protected $pdo;
    
    function __construct($pdo){
        $this->pdo = $pdo;
    }
    
    public function checkInput($variable){
        $variable = htmlspecialchars($variable);    //Converts html tags into words i.e < as &lt;
        $variable = trim($variable);    //Removes white space and other predefined characters
        $variable = stripslashes($variable);   //Strips the lashes from string
        
        return $variable;
    }
    
    public function checkEmail($email_mobile){
        $stmt = $this->pdo->prepare("SELECT EMAIL FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email_mobile, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        
        if($count > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function create($table, $fields=array()){
    $columns = implode(',', array_keys($fields));
    $values = ':'.implode(', :', array_keys($fields));

    $sql = "INSERT INTO {$table}({$columns})VALUES ({$values})";

    if($stmt = $this->pdo->prepare($sql)){
    foreach($fields as $key => $data){
    $stmt->bindValue(':'.$key, $data);
    }
    $stmt->execute();
    return $this->pdo->lastInsertId();
    }
    }
    
}

?>
