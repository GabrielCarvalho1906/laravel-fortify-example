#!/bin/bash

# Ler o conteúdo do arquivo JSON
json_data=$(cat queue_items.json)

# Remover os colchetes da lista
json_data=${json_data#[}
json_data=${json_data%]}

# Substituir vírgulas por ponto e vírgula
json_data=$(echo "$json_data" | tr ',' ';')
echo "$json_data"


# Iterar sobre cada item e decodificar
IFS=';' read -ra json_items <<< "$json_data"

# Iterar sobre cada item e decodificar
for item in "${json_items[@]}"; do
    # Decodificar o item e exibir o comando
    decoded_command=$(echo "$item" | jq -r .)
    echo "Comando decodificado:"
    echo "$decoded_command"
    echo
done
