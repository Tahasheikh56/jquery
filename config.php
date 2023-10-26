<?php
// first  data base connect direct connection
// $connect = mysqli_connect("localhost","root","","rgistration");

// second  data base connect with variables
// $host = "localhost";
// $un = "root";
// $pass = "";
// $db = "rgistration";
// $connect = mysqli_connect($host,$un,$pass,$db);

// session start is liye k 1 dafa login kare to jab tak logout nahi kare usko login karne ki zaroorat nh ho 
session_start();
// third  data base connect with class
class connection{
    private $host = "localhost";
    private $un = "root";
    private $pass = "";
    private $db = "rgistration";
    public $connect;

    public function __construct(){
        $this->connect = mysqli_connect($this->host,$this->un,$this->pass,$this->db);
        if($this->connect->connect_error){
            die ("database error".$this->connect->connect_error);
        }
        else{
            echo "database connected";
        }
    }

    public function query($query){
    return $this->connect->query($query);
    }

    public function login($email,$pass){
        $data = "select *from student where Email & Name ='$email' AND Password='$pass'";
        $query = $this->connect->query($data);
        if($query->num_rows>0){
            while($row = mysqli_fetch_assoc($query)){
                $_SESSION["id"] = $row["id"];
                $_SESSION["name"] = $row["Name"];
                $_SESSION["email"] = $row["Email"];
                $_SESSION["pass"] = $row["Password"];
                $_SESSION["img"] = $row["image"];
            }
            header("Location:profile.php");
        }
    }
    
    }
$obj = new connection();
?>