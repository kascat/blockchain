<?php

/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 19/09/20
 * Time: 09:15
 */
class BlocksValidator
{
    /**
     * BlocksValidator constructor.
     */
    function __construct()
    {
        $this->validate();
    }

    /**
     * Validator
     */
    public function validate()
    {
        $filesQuantity = count(scandir('blocks')) - 2;

        $previousHash = null;

        for ($x = 1; $x <= $filesQuantity; $x++) {
            $currentFile = fopen("blocks/block_$x.txt", "r");
            $content = fread($currentFile, filesize("blocks/block_$x.txt"));
            fclose($currentFile);

            preg_match_all("/[\w]{64}/", $content, $matches);

            $valid = $previousHash == (isset($matches[0][1]) ? $matches[0][1] : null);

            $previousHash  = $matches[0][0] ?: null;

            echo  "block_$x.txt: " . ($previousHash && $valid ? "Válido\n" : "Inválido\n");
        }
    }
}

new BlocksValidator();
