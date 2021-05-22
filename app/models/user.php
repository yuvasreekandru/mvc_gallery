<?php

Class User
{

    function signup($POST)
    { 
        $DB = new Database();

        $_SESSION['error'] = "";

        if(isset($arr['username']) && isset($arr['password'])){

            $arr['username'] = $POST['username'];
            $arr['email']    = $POST['email'];
            $arr['password'] = $POSt['password']; 
    
            $query = "INSERT INTO users (username,email,password) VALUES(:username,:email,:password)";
            $DB->write($query,$arr);

            if($data){

              header("Location" . ROOT . "login");
              die;
            }
        }else{

        $_SESSION['error'] = "Please Enter a Valid Username and Password";

        }
        
    }


    function login($POST)
    {
        $DB = new Database();

        $_SESSION['error'] = "";

        if(isset($arr['username']) && isset($arr['password'])){

            $arr['username'] = $POST['username'];
            $arr['password'] = $POSt['password']; 

    
            $query = "SELECT * FROM  users WHERE username = :username && password = :password limt 1";
            $DB->read($query,$arr);

            if(is_array($data)){

                // logged In
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->user_address; 

            }else{

                $_SESSION['error'] = "Wrong Username or Password";
        
                }
        }else{

        $_SESSION['error'] = "Please Enter a Valid Username and Password";

        }
        
       
    }

    function check_logged_in()
    {
        
        $DB = new Database();

        $_SESSION['error'] = "";

        if(isset($_SESSION['user_url'])){

            $arr['user_url'] = $_SESSION['user_url']; 
    
            $query = "SELECT * FROM  users WHERE user_url = :user_url limt 1";
            $DB->read($query,$arr);

            if(is_array($data)){

                // logged In
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->user_address; 

                return true;

            }
        }
        
        return false;
        
       
    }
}