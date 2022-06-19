<?php
namespace App\Model;
use PDO;

class person{

    private int $id;
    private string $name;
    private string $phoneNumber;
    private string $address;
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost:3306;dbname=city', 'root', 'dfdb7kjy3000');
    }

    public function setId($id): void
    {
        $this->id = $id;
    }
    public function setName($name): void
    {
        $this->name = $name;
    }
    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function setAddress($address): void
    {
        $this->address = $address;
    }
    public function getAll(){
        $query = 'SELECT * from person';
        $sql = $this->db->prepare($query);
        $sql->execute();
        return $sql->fetchAll();;
    }
    public function getById($id){
        $query = 'SELECT * from person WHERE id=:id';
        $sql = $this->db->prepare($query);
        $sql->bindParam('id', $id,PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function getByPhoneNumber($phoneNumber)
    {
        $query = 'SELECT * from person WHERE phoneNumber=:phoneNumber';
        $sql = $this->db->prepare($query);
        $sql->bindParam('phoneNumber', $phoneNumber,PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function deleteById($id){
        $query = 'DELETE FROM `city`.`person` WHERE id=:id;';
        $sql = $this->db->prepare($query);
        $sql->bindParam('id', $id,PDO::PARAM_INT);
        $sql->execute();
    }
    public function add($name, $phoneNumber,$address){
        $query = 'INSERT INTO `city`.`person` (`name`, `phoneNumber`,`address`) VALUES (:name, :phoneNumber, :address);';
        $sql = $this->db->prepare($query);
        $sql->bindParam('name', $name,PDO::PARAM_STR);
        $sql->bindParam('phoneNumber', $phoneNumber,PDO::PARAM_STR);
        $sql->bindParam('address', $address,PDO::PARAM_STR);
        $sql->execute();
    }
}