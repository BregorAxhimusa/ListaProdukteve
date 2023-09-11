<?php declare(strict_types=1);

use Shopware\Core\TestBootstrapper;

$loader = (new TestBootstrapper())
    ->addCallingPlugin()
    ->addActivePlugins('ListaProdukteve')
    ->bootstrap()
    ->getClassLoader();

$loader->addPsr4('ListaProdukteve\\Tests\\', __DIR__);