<?php
namespace ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Call;

/**
 * Description of TransferDomain
 *
 * @author Paweł Złamaniec <pawel.zl@modulesgarden.com>
 */
class TransferDomain extends Call
{
    public $action = "order/domains/transfer";
    
    public $type = parent::TYPE_POST;
}