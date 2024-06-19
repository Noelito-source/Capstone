<?php
class Authentication {
    public static $id;
    public static $role;
    public static $username;
    public static $fname;
    public static $lname;

    public static function setAuthentication($id, $role, $username, $fname, $lname){
        self::$id = $id;
        self::$role = $role;
        self::$fname = $fname;
        self::$lname = $lname;
        self::$username = $username;
    }
   
    public static function Aunthenticate()
    {
        if (self::$id) {
            return true;  
        }
        return false;
    }

  
    
}

Authentication::$id = $_SESSION['id'] ?? null;
Authentication::$role = $_SESSION['role'] ?? null;
Authentication::$username = $_SESSION['username'] ?? null;
Authentication::$fname = $_SESSION['fname'] ?? null;
Authentication::$lname = $_SESSION['lname'] ?? null;


?>