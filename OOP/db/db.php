<?php

/**
 * Eine Datanbankklasse
 *
 * Mit diese Klasse können wir in Zukunft unsere Datenbankabfragen
 * noch schneller uns sicherer umsetzten! Achtung: bei der query-Methode
 * kann es zu Sicherheitslücken kommen.
 *
 * @author    Christopher Schwarz
 * @version   1.0
 * @link      http://sae.at
 * @copyright CS
 * @since     2011.10.10
 * @example   /index.php
 */

class db{

  private $host = 'localhost';
  private $user = 'root';
  private $password = '';

  private $database = '';
  private $connection = null;

  private $sql = '';
  private $result = '';
  private $insertId = 0;

  private $errormessage = '';
  private $errornumber = 0;



  public function  __construct($host = false, $user = false, $password = false, $database= false) {

      if($host)       $this->host = $host;
      if($user)       $this->user = $user;
      if($password)   $this->password = $password;
      if($database)   $this->database = $database;
      // versuche zur datenbank zu verbinden
      if(!$this->connect()){

        echo "auchtung datenbankfehler!";
        die();
      }else{
        mysql_select_db($this->database,  $this->connection);
      }

  }



  private function connect(){

      $this->connection = mysql_connect($this->host,  $this->user, $this->password);

      //echo gettype($this->connection);

        if(gettype($this->connection) == 'resource'){
          return true;
        }
        else{
          return false;
        }

  }


  public function close(){

     if(gettype($this->connection) == 'resource'){

        $success = mysql_close($this->connection);

        if($success != 1){
          die();
        }else{
          echo "close";
          return true;
        }
     }else{
       return false;
     }
    
  }

  /**
   * Hier wird SQL -Code übergeben der von der Datanbank ausgeführt wird. Als Rückgbe erhalten wir $result
   *
   * @access  public
   * @param   string $sql
   * @return  array|boolean
   *
   */

  public function query($sql){
    $this->sql = $sql;

    $this->result = mysql_query($this->sql, $this->connection);

    if(!$this->result){
      $this->error();
    }
    
    return $this->result;
  }


  public function select($table = false,$columns = false , $where = false, $limit=false){
    $sql = self::SQLSelect($table,$columns,$where,$limit);
    $result = $this->query($sql);
    return $result; 
  }

  public function insert($table =false,$values =false){

    $sql = self::SQLInsert($table, $values);
    $result = $this->query($sql);
    

    if($result){
      return mysql_insert_id();
    }else{
      return false;

    }


    
  }

  public function update($table=false,$values=false,$where=false){

    $sql = self::SQLUpdate($table, $values, $where);
    $result = $this->query($sql);

    if($result){
      return mysql_affected_rows();
    }else{
      return false;
    }
    
    
  }


  static public function SQLUpdate($table,$values,$where =false){
    $sql = '';

    foreach ($values as $key => $value) {

      $key = mysql_real_escape_string($key);
      $value = mysql_real_escape_string($value);

      if(strlen($sql) == 0){
        $sql .= "`" . $key . "` = '" .$value . "'";
      }else{
         $sql .= ", `" . $key . "` = '" .$value . "'";

      }
    }

    $sql = "UPDATE `" . $table . "` SET " . $sql;

    if($where){
      $sql .= self::SQLWhere($where);
    }

    return $sql;
  }



  static public function SQLSelect($table = false,$columns = false , $where = false, $limit=false){
   $sql = 'SELECT ';

   if($columns){
     $sql .= self::SQLColumns($columns);
   }else{
      $sql .= ' * ';
   }
   $sql .= ' FROM `'.$table.'` ';

   if($where){
    $sql .= self::SQLWhere($where);
   }

   if($limit){
   $sql .= ' LIMIT '.$limit;
   }

   return $sql;
    
  }


  
  static public function SQLInsert($table =false, $values= false){

    $columns = self::SQLColumns(array_keys($values));
    $values = self::SQLColumns($values,"'");

    $sql = 'INSERT INTO `' . $table. '` ('. $columns.') VALUES (' . $values . ')';


    return $sql;
  }







  static public function SQLColumns($columns,$quote = '`'){

      $sql = '';

      if(is_array($columns)){

        foreach($columns as $key => $value){
          if(strlen($sql) == 0){
            $sql.= $quote . mysql_real_escape_string($value) . $quote;
          }
          else{
            $sql.= ' ,'.$quote . mysql_real_escape_string($value) . $quote;
          }

        }

        
      }

      return $sql;
    
  }

  /**
   * Liefert SQL-Where zurück
   *
   * @static
   * @param array $where BSP: array('name','email')
   * @param string $quote kannst ändern, musst aber nicht
   * @param string $quote2 kannst ändern, musst aber nicht
   * @return string
   * @todo LIKE funktioniert noch nicht.
   * @since Version 1.0
   */

  static public function SQLWhere($where,$quote ='`',$quote2 = "'" ){

    /**
     * @var string Wird verwenden um den SQL-Code zu sammeln.
     */
    $sql = '';

    // Array duchlaufen
    foreach($where as $key => $value){
      $keyvalue  = $quote.mysql_real_escape_string($key).$quote . " = ";
      $keyvalue .= $quote2.mysql_real_escape_string($value).$quote2;
      
      if(strlen($sql) ==0){
        $sql .= " WHERE ". $keyvalue;
      }
      else{
        $sql .= " AND ".$keyvalue;
      }

      
    }


    return $sql;
  }










  private function error(){

    $this->errormessage =  mysql_error();

    if(strlen($this->errormessage) >0){

      echo "<pre>";
        throw new Exception($this->errormessage);
      echo "</pre>";
      
    }

    
  }

  public function  __destruct() {
    $this->close();
  }

  
}


?>
