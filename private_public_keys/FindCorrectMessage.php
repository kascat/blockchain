<?php

/**
 * Class FindCorrectMessage
 */
class FindCorrectMessage
{
    /**
     * FindCorrectMessage constructor.
     */
    function __construct()
    {
        $this->findMessages();
    }

    /**
     * Validator
     */
    public function findMessages()
    {
        $keysFiles = scandir('Chaves');
        $messagesFiles = scandir('Mensagens');

        $totalCombinationsQuantity = 0;
        $correctMessagesQuantity = 0;

        foreach ($keysFiles as $keyFileName) {
            if (in_array($keyFileName, ['.', '..']))
                continue;

            $name = explode('_', $keyFileName)[0];

            $currentKeyFile = fopen("Chaves/$keyFileName", "r");
            $privateKeyValue = fread($currentKeyFile, filesize("Chaves/$keyFileName"));
            fclose($currentKeyFile);

            foreach ($messagesFiles as $messageFileName) {
                if (in_array($messageFileName, ['.', '..']))
                    continue;

                $currentMessageFile = fopen("Mensagens/$messageFileName", "r");
                $base64MessageValue = fread($currentMessageFile, filesize("Mensagens/$messageFileName"));
                fclose($currentMessageFile);

                $decodedMessage = base64_decode($base64MessageValue);

                openssl_private_decrypt($decodedMessage, $decryptedMessage, $privateKeyValue);

                if ($decryptedMessage) {
                    $pos = strpos($decryptedMessage, "Assinado: $name");
                    if ($pos) {
                        print_r("$keyFileName > $messageFileName\n");
                        print_r("Mensagem: $decryptedMessage\n");
                        $correctMessagesQuantity++;
                    }
                }
                $totalCombinationsQuantity++;
            }
        }

        print_r("\nTentativas: $totalCombinationsQuantity");
        print_r("\nDescriptografadas com rementente correto: $correctMessagesQuantity\n");
    }
}

new FindCorrectMessage();
