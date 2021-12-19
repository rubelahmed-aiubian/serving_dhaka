<?php

class Model
{
    protected $password='';
    protected $username="root";
    protected $connection=null;
    public function __construct()
    {
        try{
            $connection= new PDO('mysql:host=localhost;dbname=serving_dhaka',$this->username,$this->password);
            $connection->getAttribute(PDO::ATTR_ERRMODE);
            $this->connection=$connection;
        }catch (PDOException $exception){
            $this->connection=null;
            return $exception->getMessage();
        }
    }
}