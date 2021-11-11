<?php
namespace App\Service;

use App\Entity\Billet;

/**
 * Class Decorateur
 * @package App\Service
 */
class Decorateur
{
    /** @var Billet */
    private $billet;

    public function decore()
    {
        //
    }

    /**
     * @param null|Billet $billet
     *
     * @return Decorateur
     */
    public function setBillet(?Billet $billet): Decorateur
    {
        $this->billet = $billet;

        return $this;
    }
}

