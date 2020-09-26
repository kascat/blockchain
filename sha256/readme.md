## SHA-256

#### Detalhes do trabalho:

Gere uma cadeia de 16 blocos com hash sha256, contendo como primeiro bloco a seguinte mensagem:

```
Origem: Chase
Destino: Rennie
Mensagem: Ola Rennie. Meu nome é Chase.
Hash: 86a091f5effa38403dddd91754997233c2806e617eb6a33c28f070db6d95f3a2
Hash Anterior: Vazio
```
 
Para gerar o hash tome como base apenas o seguinte trexo: (Deve ser exatamente como abaixo):

```
Origem: Chase
Destino: Rennie
Mensagem: Ola Rennie. Meu nome é Chase.

```

Seguindo esse mesmo padrão de mensagem, agora crie a seguinte sequência de saudações para os seguintes nomes:

Franklin, Huynh, England, Lugo, Rodrigues, Betts, Cummings, Irwin, Nixon, Higgins, Cook, Ross, Eaton, Fountain;

A “Hash Anterior” deverá ser a hash do bloco antecessor a ele; A “Hash” deverá ser uma SHA-256 considerando o
conteúdo de Origem, Destino e Mensagem. E a mensagem sempre deverá seguir o padrão “Ola <Destino>. Meu nome é <origem>.”;

Faça isso até passar todos os nomes em sequência e retornar para Chase.

Exemplo de como ficaria o segundo bloco:

```
Origem: Rennie
Destino: Franklin
Mensagem: Ola Franklin. Meu nome é Rennie.
Hash: 2f32a8e40a215209d20c319199389f46014590ee4b27c5e594d2957c3777e002
Hash Anterior: 86a091f5effa38403dddd91754997233c2806e617eb6a33c28f070db6d95f3a2
```

Notem que o algoritmo de vocês deverá gerar essa mesma informação no segundo bloco.

ada bloco deverá ser escrito em um arquivo “blocos/bloco_N.txt”, onde “N” é o número do bloco.

O algoritmo deverá ser possuir um método para validar toda a cadeia de blocos, ou seja, ler desde o bloco 1, até o último bloco que existir, e validar as hashes conforme o conteúdo.

#### Detalhes para rodar do código:

- Rode os arquivos estando dentro do diretório `sha256`
- Para gerar os blocos exexute: `php BlocksGenerator.php`
- Os arquivos se encontrarão no diretório `sha256/blocks`
- Para validar os blocos exexute: `php BlocksValidator.php`
