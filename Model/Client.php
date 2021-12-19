<?php

include 'Core/Model.php';

class Client extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function insert($data = [])
    {
        try{
            $this->connection->prepare("
            INSERT INTO client(`name`, `email`, `image`, `mobile`, `password`, `status`)
                    VALUES ( :name, :email, :image, :mobile, :password, :status)"
                )->execute([
                ':name'=>$data['name'],
                ':image'=>$data['image'],
                ':email'=>$data['email'],
                ':mobile'=>$data['mobile'],
                ':status'=>$data['status'],
                ':password'=>$data['password'],
            ]);
            //return  "Account Created";
        }catch (PDOException $exception){
            return $exception->getMessage();
        }
    }
    public  function check($email){
        try{
            $statement="SELECT `id`, `name`, `email`, `mobile`, `password`, `location`, `image`, `status` FROM `client` WHERE email=:email";
            $prepare=$this->connection->prepare($statement);
            $prepare->execute([':email'=>$email]);
            return  $prepare->fetch();
        }
        catch (PDOException $exception){
            return $exception->getMessage();
        }
    }
    public function get(){
        $statement="SELECT `id`, `name`, `email`, `mobile`, `password`, `location`, `image`, `status` FROM `client`";
        $prepare=$this->connection->prepare($statement);
        $prepare->execute();
        return  $prepare->fetchAll();
    }

}