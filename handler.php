<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_POST){

    include 'db.php';

    $db = DataBase::getDB();

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $patronymic = $_POST['patronymic'];
    $birthday = $_POST['birthday'];

    $query = "INSERT INTO users (firstname, lastname, address, patronymic, birthday) values('$firstname', '$lastname', '$address', '$patronymic', '$birthday')";

    $result = $db->query($query);

    if($result){

        $response = ['id' => $result, 'status' => 'success'];
        echo json_encode($response);

    } else {

        $response = ['id' => NULL, 'status' => 'error'];
        echo json_encode($response);

    }

}

?>