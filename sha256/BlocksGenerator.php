<?php

/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 19/09/20
 * Time: 09:13
 */
class BlocksGenerator
{
    const NAMES = [
        'Chase',
        'Rennie',
        'Franklin',
        'Huynh',
        'England',
        'Lugo',
        'Rodrigues',
        'Betts',
        'Cummings',
        'Irwin',
        'Nixon',
        'Higgins',
        'Cook',
        'Ross',
        'Eaton',
        'Fountain'
    ];

    /**
     * BlocksGenerator constructor.
     */
    function __construct()
    {
        $this->generateBlocks();
    }

    /**
     * Generator
     */
    public function generateBlocks()
    {
        $previousHash = null;

        for ($x = 0; $x < count(self::NAMES); $x++) {
            $from = self::NAMES[$x];
            $to = isset(self::NAMES[$x+1]) ? self::NAMES[$x+1] : self::NAMES[0];

            $message = "Origem: $from\nDestino: $to\nMensagem: Ola $to. Meu nome é $from.\n";

            $hash = hash('sha256', $message);

            $message .= "Hash: " . hash('sha256', $message) . "\n";
            $message .= "Hash Anterior: " . ($previousHash ?: 'Vazio') . "\n";

            $previousHash = $hash;

            $filename = $x + 1;
            $blockFile = fopen("blocks/block_$filename.txt", "w");
            fwrite($blockFile, $message);
            fclose($blockFile);

            echo  $message . "\n";
        }
    }
}

new BlocksGenerator();
