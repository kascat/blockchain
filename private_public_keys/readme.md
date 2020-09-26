## Mensagens com chave privada

####Detalhes do trabalho:

Cada chave privada descriptografa uma quantidade X de mensagens(Maior que 1);

Dentro de cada mensagem, há uma frase identificando o remetente e destinatário;

Todas as mensagens criptografadas devem ser primeiro “decodadas” da base64;

Você deverá cruzar os dados de conteúdo com a chave privada que descriptografou essa mensagem;

####Detalhes para rodar do código:

- Rode o arquivo estando dentro do diretório `private_public_keys`
- Para percorrer as chaves e validar as mensagens execute: `php FindCorrectMessage.php`

O resultado será todas as mensagens que foram descriptografadas com o correto remetente de acordo com a chave privada
