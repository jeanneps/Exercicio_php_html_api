<?php
$logradouro = $bairro = $cidade = $estado;

$url ="https://viacep.com.br/ws/01001000/json/";
$resposta = file_get_contents($url);
$transformado = json_decode($resposta, true);


?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa Cep</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div id="buscar">
        <h1 style=" font-size: 60px;">Pesquisa Cep</h1>
        <form action="">
        <label for="cep">CEP</label>
        <div id="busca" ><input type="text" name="cep" id="cep" maxlength="8" pattern="[0-8]{5}-[0-8]{3}">
        <button type="submit" value="Buscar">Buscar</button>
        </form>
        </div>
    </header>
    <main>
        <div id="container">
            <form action="">
            <label for="logradouro">Logradouro:</label>
            <input type="text" name="logradouro" id="logradouro">

            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" id="bairro">

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade">

            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado">
            </form>


        </div>
    </main>
</body>

</html>