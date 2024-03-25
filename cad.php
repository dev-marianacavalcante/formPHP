<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interação com Formulários</title>
</head>

<body>
    <header>
        <h1>Resultado do processamento</h1>
    </header>
    <main>
        <?php
            $n = $_GET["nome"];
            $s = $_GET["sobrenome"];


            $url = 'http://172.18.0.1:3000/api/usuarios';

            // Faz a solicitação GET para a URL especificada
            // $response = file_get_contents($url);
            // $data = json_decode($response, true);
               
            // foreach ($data as $key => $value) {
            //     if (is_array($value)) {
            //         // Se o valor for outro array, faz um segundo loop para exibir seus elementos
            //         echo "Chave: $key<br>";
            //         foreach ($value as $subKey => $subValue) {
            //             echo "Subchave: $subKey, Subvalor: $subValue<br>";
            //         }
            //     } else {
            //         // Se o valor for uma string ou outro tipo, exibe normalmente
            //         echo "Chave: $key, Valor: $value<br>";
            //     }
            // }

            $data = http_build_query(array(
                'nome' => $n,
                'sobrenome' => $s
            ));
            
            // Define as opções da solicitação POST
            $options = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $data
                )
            );
            
            // Cria um contexto para a solicitação POST
            $context  = stream_context_create($options);
            
            // Define a URL para o endpoint da API
            $url = 'http://172.18.0.1:3000/api/usuarios';
            
            // Faz a solicitação POST para a URL especificada
            $response = file_get_contents($url, false, $context);


            if ($response === false) {
                // Se a resposta não foi bem-sucedida, exibe uma mensagem de erro
                echo "Erro ao fazer a requisição HTTP.";
            } else {
                echo "<p>É um prazer te conhecer, $n $s! Este é o meu site</p>";
            }
            
        ?>


        <p><a href="javascript:history.go(-1)">Voltar para a pagina</a></p>
    </main>
</body>

</html>