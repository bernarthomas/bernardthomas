<?php
namespace App\Service\Helper;

use App\Repository\CultureRepository;
use App\Repository\RecolteRepository;

Class ComparaisonRecolte
{

    /** @var array */
    private $donnees;
    /** @var array */
    private $filtre;
    /** @var int */
    private $idCulture;
    /** @var CultureRepository  */
    private $repositoryCulture;
    /** @var RecolteRepository  */
    private $repositoryRecolte;

    public function __construct(CultureRepository $repositoryCulture, RecolteRepository $repositoryRecolte)
    {
        $this->repositoryCulture = $repositoryCulture;
        $this->repositoryRecolte = $repositoryRecolte;
    }

    public function decore()
    {
        $donnees = [];
        $listeAnnees = [2018, 2019, 2020];
        $listeMois = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $listeCultures = $this->repositoryRecolte->trouveCultures($this->idCulture);
        foreach($listeCultures as $culture) {
            foreach($listeMois as $mois) {
                foreach($listeAnnees as $annee) {
                    $donnees[$culture][$annee]['total'] = '';
                    $donnees[$culture][$annee][$mois] = '';
                }

            }
        }
        if (!empty($this->donnees)) {
            foreach($this->donnees as $ligne) {
                $donnees[$ligne['culture']][$ligne['annee']]['total'] = $ligne['total'];
                $donnees[$ligne['culture']][$ligne['annee']][$ligne['mois']] = $ligne['poids'];
            }
        }
        $this->donnees = $donnees;

        return $this;
    }

    /**
     * @return $this
     */
    public function initialiseDonnees()
    {
        $this->donnees = $this->repositoryRecolte->compare($this->idCulture);

        return $this;
    }

    public function initialiseFiltre()
    {
        $this->filtre = $this->repositoryCulture->findBy([], ['libelle' => 'asc']);

        return $this;
    }

    /**
     * @return array
     */
    public function getDonnees(): array
    {
        return $this->donnees;
    }

    /**
     * @return array
     */
    public function getFiltre(): array
    {
        return $this->filtre;
    }

    public function setIdCulture(int $idCulture)
    {
        $this->idCulture = $idCulture;

        return $this;
    }
}
