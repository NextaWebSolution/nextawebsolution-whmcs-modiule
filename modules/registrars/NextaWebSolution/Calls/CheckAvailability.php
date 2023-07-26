<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class CheckAvailability extends Call
{
    public $action = "domains/lookup";
    
    public $type = parent::TYPE_POST;
}