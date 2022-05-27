<?php
session_start();
require('../model/operations.php');
require('../model/sessionUser.php');

$isError = false;
$missingFields = array();



$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
setUsernameField($username);
setPasswordField($password);



if( !isset($username) || empty($username) ) {
    $isError = true;
    $missingFields[] = 'Nom utilisateur';
}
if( !isset($password) || empty($password) ) {
    $isError = true;
    $missingFields[] = 'Mot de passe';
}




if( $isError==true ) {
    $stringError="";
    if( $isError ) {
        $stringError .= "Veuillez remplir les champs suivants : <br />";
        foreach( $missingFields as $fieldName ) {
            $stringError .= $fieldName . "<br />";
			$stringError .=	$ban . "<br />";
        }

        setErrorsForm($stringError);
        header('location: ../index.php?p=login');
    }
}else{
    $res = getUserLogin($username,$password);
    
    if($res==true){
        setUserSession($res);
		setUsernameSession($username);
        unsetFormFields();
        header('location: ../index.php?p=acceuil');
        die();
    }else{
        $stringError = "Le nom d'utilisateur ou mot de passe incorrect ou vous avez été banni";
        setErrorsForm($stringError);
        header('location: ../index.php?p=login');
    }
}