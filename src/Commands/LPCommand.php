<?php declare(strict_types=1);

namespace ListaProdukteve\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;

/*
 * @author Bregor Axhimusa
 * 
 * Klasa kryesore e cila permban console komanden 
 * qe printon ne terminal listen e produkteve aktive.
 * 
 */
class LPCommand extends Command
{
    /**
     * @var EntityRepository
     */

    private $productRepository;

    public function __construct(EntityRepository $productRepository, string $name = "LPCommand Constructor")
    {
        parent::__construct($name);
        $this->productRepository = $productRepository;
    }

    // Konfigurimi i komandes
    protected function configure(): void
    {
        $this->setName("produktet:listo")->setDescription("Komanda e implementuar si pjese e detyres per Solution 25");
    }

    // Metoda e cila egzekutohet kur ne terminal shkruhet komanda: 
    // ./bin/console produktet:listo
    protected function execute(InputInterface $input, OutputInterface $out): int
    {
        $products = $this->getAllProducts();

        if( $products === null ){
            $out->writeln("Produktet nuk u gjeten! Sigurohu qe databaza ka te dhena.");
            return -1;
        }
        
        $out->writeln("\nGjithsej " . sizeof($products) . " produkte aktive u gjeten ne DB\n");
        foreach( $products as $product ){
            $out->writeln(
                "Produkti ID: '" . $product->getId() . "'\nEmri i produktit: '" . $product .
                "'\nNumri i produktit: '" . $product->getProductNumber() . "'\n\n"
            );
        }

        return 0;
    }

    // Funksioni i cili i mer produktet aktive nga Databaza
    protected function getAllProducts()
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('active', 1));
        $productResult = $this->productRepository->search($criteria, Context::createDefaultContext());

        if ($productResult === null) 
            return null;

        return $productResult;
    }
}
