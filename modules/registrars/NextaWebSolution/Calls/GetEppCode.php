<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of GetEppCode
 *
 * @author inbs
 */
class GetEppCode extends Call
{
    public $action = "domains/:domain/eppcode";
    
    public $type = parent::TYPE_GET;
}