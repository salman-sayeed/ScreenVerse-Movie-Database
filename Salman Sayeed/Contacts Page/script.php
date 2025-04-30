<?php
    function nameVal(){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);

        if($fname === "" || $lname === ""){
            echo"<script>alert('First and Last Name is required!');</script>";
        }
    }

    function emailVal(){
        $email = trim($_POST['email']);

        if($email === ""){
            echo"<script>alert('Email is required!');</script>";
        }
    }

    function phoneVal(){
        $phone = trim($_POST['phone']);

        if($phone === ""){
            echo"<script>alert('Phone is required!');</script>";
        }
        elseif(!strlen($phone) === 11){
            echo"<script>alert('Phone number must be 11 digits!');</script>";
        }
    }

    function messageVal(){
        $message = trim($_POST['message']);

        if($message === ""){
            echo"<script>alert('Message field cant be empty!');</script>";
        }
    }

    if(isset($_POST['submit'])){
        nameVal();
        emailVal();
        phoneVal();
        messageVal();
    }

?>