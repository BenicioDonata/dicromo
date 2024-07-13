<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__.'/app')
    ->in(__DIR__.'/config')
    ->in(__DIR__.'/database')
    ->in(__DIR__.'/routes')
    ->in(__DIR__.'/Modules')
    ->in(__DIR__.'/tests');

$config = new Config();
return $config->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        // Agrega más reglas aquí según tus necesidades
    ])
    ->setFinder($finder);
