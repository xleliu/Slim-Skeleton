<?php

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->name('*.php')
    ->in('app')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
    ->setUsingCache(true)
    ->setLineEnding("\n")
;
