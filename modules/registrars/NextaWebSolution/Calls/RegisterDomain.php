<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of RegisterDomain
 *
 * @author Paweł Złamaniec <pawel.zl@modulesgarden.com>
 */
class RegisterDomain extends Call
{
    public $action = "order/domains/register";
    
    public $type = parent::TYPE_POST;
}
