<?php 

class Database{
    private $dsn = "mysql:host=localhost;dbname=crud_php_oop";
    private $user = "root";
    private $pass = "root";
    public  $conn;

    public function __construct(){
        try{
            $this->conn = new PDO($this->dsn,$this->user,$this->pass);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    // insert data
    public function insert($fname,$lname,$email,$phone)
    {
        $sql = "INSERT INTO users (first_name, last_name, email, phone) VALUES (:fname,:lname,:email,:phone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['fname'=>$fname,'lname'=>$lname,'email'=>$email,'phone'=>$phone]);

        return true;
    }

    // reat data
    public function read()
    {
        $data = [];
        $sql = "SELECT * FROM users ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[]= $row;
        }
        return $data;
    }

    // select user by id
    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $resutl = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resutl;

    }
    // update
    public function update($id,$fname,$lname,$email,$phone){
        $sql = "UPDATE users SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['fname'=>$fname, 'lname'=>$lname,'email'=>$email,'phone'=>$phone, 'id'=>$id]);
        return true;
    }

    // delete 
    public function delete($id){
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return true;
    }

    // totalRowCount
    public function totalRowCount(){
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $t_rows = $stmt->rowCount();
        return $t_rows;
    }
}



?>