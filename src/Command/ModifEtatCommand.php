<?php

namespace App\Command;

use App\Repository\GoOutRepository;
use App\Repository\StateRepository;
use App\Entity\State;
use App\Entity\GoOut;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'modif-etat',
    description: 'Modifie l\'état d\'un évènement.',
)]
class ModifEtatCommand extends Command
{
    protected static $defaultName = 'app:modif-etat';
    protected static $defaultDescription = 'Modifie l\'état d\'un évènement.';

    private $goOutRepository;

    public function __construct(GoOutRepository $goOutRepository, EntityManagerInterface  $entityManager, StateRepository $stateRepository)
    {
        parent::__construct();
        $this->goOutRepository = $goOutRepository;
        $this->entityManager = $entityManager;
        $this->stateRepository = $stateRepository;
    }

    protected function configure()
    {
        $this
            ->setName('demo:greet')
            ->setDescription('Greet someone')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $allGoOuts = $this->goOutRepository->findAll();
        $now = new \DateTime();
        $nowUtcFrance = $now->modify('+120 minutes');
        
        foreach ($allGoOuts as $goOut){
            $dateHeureDebut = clone $goOut->getDateHeureDebut();
            $dateFinActivite = clone ($goOut->getDateHeureDebut());


            if ($nowUtcFrance > $goOut->getDateLimiteInscription() and $nowUtcFrance < $goOut->getDateHeureDebut()){
                $etatCloture = $this->stateRepository->findOneBy(['libelle' => State::ETAT_CLOTURE]);
                $goOut->setState($etatCloture);
            }

            if ($nowUtcFrance > $dateFinActivite ){
                $etatPassee = $this->stateRepository->findOneBy(['libelle' => State::ETAT_PASSE]);
                $goOut->setState($etatPassee);
            }

            if($nowUtcFrance < $goOut->getDateLimiteInscription()) {
                $etatOuvert = $this->stateRepository->findOneBy(['libelle' => State::ETAT_OUVERT]);
                $goOut->setState($etatOuvert);
            }

            if (($nowUtcFrance > $dateHeureDebut) and ($nowUtcFrance <= $dateFinActivite)){
                $etatEnCours = $this->stateRepository->findOneBy(['libelle' => State::ETAT_EN_COURS]);
                $goOut->setState($etatEnCours);
            }
        $this->entityManager->persist($goOut);
        $this->entityManager->flush();
        }
        return Command::SUCCESS;


    }
}
