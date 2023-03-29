<?php
require("database/querys/sqlquerys.php");
require("database/connection.php");

use Jenssegers\Blade\Blade;

class TableController
{

    private $blade;
    private $conn;


    public function __construct()
    {
        $this->conn = open();
        $this->blade = new Blade('views', 'assets/cache');
    }

    public function postTable()
    {


        if (mysqli_error($this->conn)) {
            die('Nao foi possivel conectar ao Banco de Dados. Motivo: ' . mysqli_error($this->conn));
        } else { //echo "conectado";
        }

        $response = [];


        if ($_POST['dataEntrega'] && !$_POST['carga']) {
            $dataEntrega = date('Ymd', strtotime(htmlspecialchars($_POST['dataEntrega'])));
            $parametro = 'AND awnfr.dataEntrega = ' . $dataEntrega;
        } elseif ($_POST['carga'] && !$_POST['dataEntrega']) {
            $CARGA = htmlspecialchars($_POST['carga']);
            $parametro = 'AND awnfr.cargano = ' . $CARGA;
        } else {
            $DATAENTREGA = date('Ymd', strtotime(htmlspecialchars($_POST['dataEntrega'])));
            $CARGA = htmlspecialchars($_POST['carga']);
            $parametro = 'AND awnfr.dataEntrega = ' . $DATAENTREGA . ' AND awnfr.cargano = ' . $CARGA;
        }

        $turno = htmlspecialchars($_POST['turno']) ?: 1;



        $temporaryTable = createTableTemporary($parametro);
        $dados = getDadosTable($turno);


        mysqli_query($this->conn, $temporaryTable) or die(mysqli_error($this->conn));
        $resultDados = mysqli_query($this->conn, $dados) or die(mysqli_error($this->conn));


        $data = [
            "telefone-ddi" => '',
            "telefone-ddd" => '',
            "telefone-numero" => '',
            "nome" => '',
            "pedido" => '',
            "turno" => '',
            "data" => '',
        ];

        while ($row = mysqli_fetch_array($resultDados, MYSQLI_NUM)) {
            $i = 0;
            foreach ($data as $key => $value) {
                $data[$key] = $row[$i];
                $i++;
            }

            array_push($response, $data);
        }

        session_destroy();

        echo $this->blade->make('pages/table', ['response' => $response])->render();
    }
}
