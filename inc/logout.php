<?php
    include ("../config.php");
    try{
        session_start(); //incia a sessao ou acessa a sessao existente
        session_destroy(); //mata a sessao limpando todos os valores salvos
        // direciona para o index do site 
        header("Location: " . BASEURL ."index.php");
    } catch (exception $e) {
        $_SESSION['message'] = "Ocorreu um erro: " . $e->GetMessage();
        $_SESSION['type'] = "danger";
    }
?>