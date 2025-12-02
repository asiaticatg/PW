<?php

    include("../config.php");
    include(DBAPI);

    $customers = null;
    $customer = null;

    /*Listagem de Clientes*/
    function index()
    {
        global $customers;
        $customers = find_all("customers");
    }

    /**
     *  Cadastro de Clientes
     */
    function add() {
        
        if (!empty($_POST['customer'])) {
            
            $today = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

            $customer = $_POST['customer'];
            $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
            
            
            save('customers', $customer);
            header("location: index.php");
        } 
    }

    /**
     *	Atualizacao/Edicao de Cliente
     */
    function edit() {

    $now = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            if (isset($_POST['customer'])) {

                $customer = $_POST['customer'];
                $customer['modified'] = $now->format("Y-m-d H:i:s");

            update('customers', $id, $customer);
            header('location: index.php');
            } else {

                global $customer;
                $customer = find("customers", $id);
                } 
        } else {
            header('location: index.php');
        }
    }

    /**
     *  Exclusão de um Cliente
     */
    function delete($id = null) {

    global $customer;
    $customer = remove("customers", $id);

    header("location: index.php");
    }

    /*
    Formatação de datas
    */

    function formataData($data, $formato) {
        $df = new DateTime($data, new DateTimeZone("America/Sao_Paulo"));
        return $df-> format($formato);
    }

    /**
     *  Visualização de um Cliente
     */

    function view($id = null) {
        global $customer;
        $customer = find('customers', $id);
    }

    /*
    Formatação de telefone
    */

    function formataTel($telefone) {
        $tel = "(" . substr($telefone, 0 , 2) . ")"
        . substr($telefone, 2 , 5) . "-" . substr($telefone, 7, 4);
        return $tel;
    }