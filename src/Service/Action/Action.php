<?php


namespace App\Service\Action;


use App\Form\Action\AjouterType;
use App\Repository\ActionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use App\Entity\Action as EntiteAction;

class Action
{
    protected $entityManager;

    protected $formFactory;

    protected $repository;

    public function __construct(ActionRepository $repository, EntityManagerInterface $entityManager, FormFactoryInterface $factory)
    {
        $this->entityManager = $entityManager;
        $this->formFactory = $factory;
        $this->repository = $repository;
    }

    public function getForm()
    {
        return $this->formFactory->create(AjouterType::class, new EntiteAction());
    }

    public function getList()
    {
        return $this->repository->findBy([], ['date1Prevu' => 'desc']);
    }

    public function update($data)
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush();

        return $this;
    }
}