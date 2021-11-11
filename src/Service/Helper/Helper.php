<?php
namespace App\Service\Helper;

use App\Service\Decorateur;

/**
 * Class Helper
 * @package App\Service\Helper
 */
class Helper
{
    /** @var Decorateur  */
    protected $decorateur;

    /**
     * Helper constructor.
     *
     * @param Decorateur $decorateur
     */
    public function __construct(Decorateur $decorateur)
    {
        $this-> decorateur = $decorateur;
    }
}