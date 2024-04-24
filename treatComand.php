<?php

// Ler o conteúdo do arquivo JSON
$json_content = file_get_contents('queue_items.json');

// Decodificar o JSON
$decoded_json = json_decode($json_content, true);
print_r($decoded_json);
print_r("\n");
// Verificar se houve erro na decodificação
if ($decoded_json === null) {
    echo "Erro ao decodificar o JSON.";
    exit;
}

// Iterar sobre cada item do JSON
foreach ($decoded_json as $item) {
    // Verificar se o campo 'data' existe e contém a chave 'command'
    var_dump($item); // Adicionando esta linha para depuração
    $item = json_decode($item, true);
    var_dump($item);
    
    preg_match('#a:1:\{(.*)\"s:8#is', $item['data']['command'], $matches);
    $json_string = str_replace('\\', '', $matches[1]);
    
    print_r($json_string);
        

   
}
