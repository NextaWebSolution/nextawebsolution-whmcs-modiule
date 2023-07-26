<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of TransferDomain
 *
 * @author inbs
 */
class SaveDns extends Call
{
    public $action = "domains/:domain/dns";
    
    public $type = parent::TYPE_POST;
}