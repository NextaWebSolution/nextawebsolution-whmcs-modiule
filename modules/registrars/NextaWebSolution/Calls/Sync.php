<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of GetNameServers
 *
 * @author inbs
 */
class Sync extends Call
{
    public $action = "domains/:domain/sync";
    
    public $type = parent::TYPE_POST;
}