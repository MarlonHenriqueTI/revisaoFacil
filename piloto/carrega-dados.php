<?php

$tipo = $_POST['tipo'];
$categoria = $_POST['cat_id'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];


if (isset($_POST["tipo"])) {
    if ($_POST["tipo"] == "marcas") {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://veiculos.fipe.org.br/api/veiculos/ConsultarMarcas',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "codigoTabelaReferencia": 231,
                "codigoTipoVeiculo": ' . intval($categoria) . '
            }',
            CURLOPT_HTTPHEADER => array(
                'Host: veiculos.fipe.org.br',
                'Referer: http://veiculos.fipe.org.br',
                'Content-Type: application/json',
                'Cookie: ROUTEID=.3'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    } else if ($_POST["tipo"] == "modelo") {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://veiculos.fipe.org.br/api/veiculos/ConsultarModelos',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "codigoTabelaReferencia": 231,
            "codigoTipoVeiculo": ' . intval($categoria) . ',
            "codigoMarca": ' . intval($marca) . '
        }',
            CURLOPT_HTTPHEADER => array(
                'Host: veiculos.fipe.org.br',
                'Referer: http://veiculos.fipe.org.br',
                'Content-Type: application/json',
                'Cookie: ROUTEID=.3'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $f = json_decode($response);
        foreach ($f as $key) {
            $res[] = $key;
        }
        echo json_encode($res[0]);
    } else if ($_POST["tipo"] == "ano") {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://veiculos.fipe.org.br/api/veiculos/ConsultarAnoModelo',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "codigoTabelaReferencia": 231,
                "codigoTipoVeiculo": ' . intval($categoria) . ',
                "codigoMarca": ' . intval($marca) . ',
                "codigoModelo": ' . intval($modelo) . '
            }',
            CURLOPT_HTTPHEADER => array(
                'Host: veiculos.fipe.org.br',
                'Referer: http://veiculos.fipe.org.br',
                'Content-Type: application/json',
                'Cookie: ROUTEID=.3'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    } 
}
