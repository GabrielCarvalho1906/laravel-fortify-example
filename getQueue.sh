#!/bin/bash

# Executa o comando redis-cli para obter os elementos da fila
queue_items=$(redis-cli LRANGE infraestrutura_estracta_database_queues:default 0 -1)

# Verifica se a fila não está vazia
if [ -n "$queue_items" ]; then
    # Salva a lista de elementos da fila em um arquivo JSON
    echo "$queue_items" | jq -R . | jq -s . > queue_items.json

    # Limpa a fila
    redis-cli DEL infraestrutura_estracta_database_queues:default

    echo "Fila exportada para queue_items.json e fila limpa com sucesso."
else
    echo "A fila está vazia."
fi
