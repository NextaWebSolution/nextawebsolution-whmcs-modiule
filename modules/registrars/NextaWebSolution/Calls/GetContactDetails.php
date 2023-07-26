<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of GetContactDetails
 *
 * @author inbs
 */
class GetContactDetails extends Call
{
    public $action = "domains/:domain/contact";
    
    public $type = parent::TYPE_GET;
}