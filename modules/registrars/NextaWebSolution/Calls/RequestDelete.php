<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of RequestDelete
 *
 * @author inbs
 */
class RequestDelete extends Call
{
    public $action = "domains/:domain/delete";
    
    public $type = parent::TYPE_POST;
}