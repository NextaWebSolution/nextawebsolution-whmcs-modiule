<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of TransferDomain
 *
 * @author inbs
 */
class ReleaseDomain extends Call
{
    public $action = "domains/:domain/release";
    
    public $type = parent::TYPE_POST;
}