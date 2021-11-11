<?php
/**
 *
 */
namespace App\Controller;

use App\Service\Helper\HelperInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class Controller
 * @package App\Controller
 */
class Controller extends AbstractController
{
    /** @var HelperInterface  */
    protected $helper;

    /**
     * Controller constructor.
     *
     * @param HelperInterface $helper
     */
    public function __construct(HelperInterface $helper)
    {
        $this->helper = $helper;
    }
}
