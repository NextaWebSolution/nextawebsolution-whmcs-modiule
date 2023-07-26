<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of GetDns
 *
 * @author inbs
 */
class GetDns extends Call
{
    public $action = "domains/:domain/dns";
    
    public $type = parent::TYPE_GET;
}