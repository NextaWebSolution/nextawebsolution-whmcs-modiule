<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of TransferDomain
 *
 * @author inbs
 */
class ModifyNameServer extends Call
{
    public $action = "domains/:domain/nameservers/modify";
    
    public $type = parent::TYPE_POST;
}