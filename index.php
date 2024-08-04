<?php
//INICIALIZA AS VARIAVEIS COM O VALOR VAZIO
$logradouro = $bairro = $cidade = $uf = "";
// OBTEM O VALOR DO FORMULARIO DE CEP
$cep = isset($_POST['cep']) ? $_POST['cep'] : "";
$data = [];
if (!empty($cep)) {
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    //suprime erros de aviso caso a requisição falhe.
    $resposta = @file_get_contents($url);
    if ($resposta !== FALSE) {
        $data = json_decode($resposta, true);
    }
}
//Se o CEP não for encontrado, define todas as variáveis de endereço como "CEP não encontrado
if (isset($data['erro']) && $data['erro']) {
    $logradouro = $bairro = $cidade = $uf = "CEP não encontrado";
    /*Caso contrário, atribui os valores retornados pela API às variáveis correspondentes. 
    Utiliza o operador ?? para garantir que, se algum campo não estiver presente, a variável recebe uma string vazia.*/
} else {
    $logradouro = $data['logradouro'] ?? "";
    $bairro = $data['bairro'] ?? "";
    $cidade = $data['localidade'] ?? "";
    $uf = $data['uf'] ?? "";
}
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
            <h1 style="font-size: 60px;">Pesquisa Cep</h1>
            <form action="" method="POST">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" maxlength="9" pattern="[0-9]{5}-[0-9]{3}" placeholder="00000-000" required>
                <button type="submit">Buscar</button>
            </form>
        </div>
    </header>
    <main>
        <div id="container">
            <form>
                <label for="logradouro">Logradouro:</label>
                <input type="text" name="logradouro" id="logradouro" value="<?php echo ($logradouro); ?>" readonly>

                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro" id="bairro" value="<?php echo ($bairro); ?>" readonly>

                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" value="<?php echo ($cidade); ?>" readonly>

                <label for="uf">UF:</label>
                <input type="text" name="uf" id="uf" value="<?php echo ($uf); ?>" readonly>
            </form>
        </div>
    </main>
</body>
</html>
