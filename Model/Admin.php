<?php

include 'Core/Model.php';

class Admin extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function insert($data = [])
    {
        try{
            $this->connection->prepare("
            INSERT INTO admin( `name`, `email`, `image`, `mobile`, `password`, `role`)
                    VALUES ( :name, :email, :image, :mobile, :password, :role)"
                )->execute([
                ':name'=>$data['name'],
                ':email'=>$data['email'],
                ':image'=>$data['image'],
                ':mobile'=>$data['mobile'],
                ':password'=>$data['password'],
                ':role'=>$data['role']
            ]);
            //return  "admin Created";
        }catch (PDOException $exception){
            return $exception->getMessage();
        }
    }

    public function update($data = [])
    {
        try{
            $this->connection->prepare("
            UPDATE admin SET `name`= :name,`image`=:image,`mobile`= :mobile,`password`=:password where `email`=:email"
            )->execute([
                ':name'=>$data['name'],
                ':email'=>$data['email'],
                ':image'=>$data['image'],
                ':mobile'=>$data['mobile'],
                ':password'=>$data['password']
            ]);
            //return  "admin Created";
            return http_response_code('200');
        }catch (PDOException $exception){
            return $exception->getMessage();
        }
    }

    public  function check($email){
        try{
            $statement="SELECT `id`, `name`, `email`, `image`, `mobile`, `password`, `role` FROM `admin` WHERE email=:email";
            $prepare=$this->connection->prepare($statement);
            $prepare->execute([':email'=>$email]);
            return  $prepare->fetch();
        }
        catch (PDOException $exception){
            return $exception->getMessage();
        }
    }
    public function get(){
        $statement="SELECT `id`, `name`, `email`, `image`, `mobile`, `password`, `role` FROM `admin`";
        $prepare=$this->connection->prepare($statement);
        $prepare->execute();
        return  $prepare->fetchAll();
    }

}