<?php

include 'Core/Model.php';

class Worker extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function insert($data = [])
    {
        try{
            $this->connection->prepare("
            INSERT INTO worker(`name`, `email`, `image`, `mobile`, `password`, `status`)
                    VALUES ( :name, :email, :image, :mobile, :password, :status)"
                )->execute([
                ':name'=>$data['name'],
                ':image'=>$data['image'],
                ':email'=>$data['email'],
                ':mobile'=>$data['mobile'],
                ':status'=>$data['status'],
                ':password'=>$data['password'],
            ]);
            return  "Account Created";
        }catch (PDOException $exception){
            return $exception->getMessage();
        }
    }

}