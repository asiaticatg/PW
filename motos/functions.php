<?php

include("../config.php");
include(DBAPI);

$motos = null;
$moto = null;

/* Listagem de Motos */
function index()
{
    global $motos;
    $motos = find_all('motos');
}

/* Cadastro de Motos */
function add() {
    if (!empty($_POST['moto'])) {
        $moto = $_POST['moto'];

        $today = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));
        $moto['datacad'] = $today->format("Y-m-d H:i:s");

        // Upload da foto
        if (!empty($_FILES['foto']['name'])) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = basename($_FILES['foto']['name']);
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $filePath)) {
                $moto['foto'] = $fileName;
            }
        }

        save('motos', $moto);
        header("location: index.php");
        exit;
    }
}

/* Atualização/Edicao de Moto */
function edit() {
    $now = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        if (isset($_POST['moto'])) {

            $moto = $_POST['moto'];

            // Upload de nova foto
            if (!empty($_FILES['foto']['name'])) {
                $uploadDir = 'uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileName = basename($_FILES['foto']['name']);
                $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['foto']['tmp_name'], $filePath)) {
                    $moto['foto'] = $fileName;
                }
            }

            update('motos', $id, $moto);
            header('location: index.php');
            exit;

        } else {
            global $moto;
            $moto = find("motos", $id);
        }
    } else {
        header('location: index.php');
        exit;
    }
}

/* Exclusão */
function delete($id = null) {
    global $moto;

    // Busca a moto e obtém o nome da foto
    $moto = find("motos", $id);

    if (!empty($moto['foto'])) {
        $filePath = 'uploads/' . $moto['foto'];

        // Se o arquivo existir, apaga
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Remove do banco
    remove("motos", $id);

    header("location: index.php");
}


/* Formata data */
function formataData($data, $formato) {
    $df = new DateTime($data, new DateTimeZone("America/Sao_Paulo"));
    return $df->format($formato);
}

/* Visualização de uma Moto */
function view($id = null) {
    global $moto;
    $moto = find('motos', $id);
}

/* Formata telefone (não usado, mas mantido) */
function formataTel($telefone) {
    $tel = "(" . substr($telefone, 0 , 2) . ")"
    . substr($telefone, 2 , 5) . "-" . substr($telefone, 7, 4);
    return $tel;
}
