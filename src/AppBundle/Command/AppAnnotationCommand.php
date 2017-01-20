<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\User;
use Doctrine\Common\Annotations\AnnotationReader as Reader;
//use AppBundle\Annotation\StandardObject;

class AppAnnotationCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:annotation')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {







        $user = new User();

        $reader = new Reader();

        $reflectionObject = new \ReflectionObject($user);

        foreach ($reflectionObject->getProperties() as $reflectionProperty) {

            $annotation = $reader->getPropertyAnnotation($reflectionProperty, 'AppBundle\Annotation\StandardObject');

            if (!is_null($annotation)) {
                dump($reflectionProperty->getName());
            }


        }
        exit;

        $reader->getMethodAnnotations();






        $argument = $input->getArgument('argument');

        if ($input->getOption('option')) {
            // ...
        }

        $output->writeln('Command result.');
    }

}
