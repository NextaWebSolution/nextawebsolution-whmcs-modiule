<?php

use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Calls;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Configuration;
use ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Helpers\ResultsListFactory;

//Loader
include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Core' . DIRECTORY_SEPARATOR . "Loader.php";
new \ModulesGarden\DomainsReseller\Registrar\NextaWebSolution\Core\Loader(__DIR__);

/**
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_getConfigArray()
{
    $configarray = [
        "FriendlyName" => [
            "Type"  => "System",
            "Value" => "NextaWebSolution"
        ],
        "Description"  => [
            "Type"  => "System",
            "Value" => "Don&#039;t have a Reseller Account yet? Get one here: www.nextawebsolution.com/domain-reseller"
        ],
        "Username"     => [
            "FriendlyName" => "API Username",
            "Type"         => "text",
            "Size"         => "40",
            "Description"  => "Enter your email used in the main WHMCS"
        ],
        "ApiKey"       => [
            "FriendlyName" => "API Key",
            "Type"         => "text",
            "Size"         => "40",
            "Description"  => "Enter your API key received from provider"
        ],
        "ApiEndpoint"  => [
            "FriendlyName" => "API Endpoint",
            "Type"         => "text",
            "Size"         => "40",
            "Description"  => "Enter API endpoint",
            "Default"      => "http://reseller.nextawebsolution.com/modules/addons/DomainsReseller/api/index.php"
        ],
    ];

    return $configarray;
}

/**
 * Register Domain
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_RegisterDomain($params)
{
    $postfields =
        [
            "domain"       => $params["domainname"],
            "regperiod"    => (int)$params["regperiod"],
            "domainfields" => base64_encode(serialize($params["additionalfields"])),
            "addons"       =>
                [
                    "dnsmanagement"   => $params['dnsmanagement'] ? 1 : 0,
                    "emailforwarding" => $params['emailforwarding'] ? 1 : 0,
                    "idprotection"    => $params['idprotection'] ? 1 : 0,
                ],
            "nameservers"  =>
                [
                    $params["ns1"],
                    $params["ns2"],
                    $params["ns3"],
                    $params["ns4"],
                    $params["ns5"],
                ],
            "contacts"     =>
                [
                    "registrant" =>
                        [
                            'firstname'   => $params["firstname"],
                            'lastname'    => $params["lastname"],
                            'companyname' => $params["companyname"],
                            'email'       => $params["email"],
                            'address1'    => $params["address1"],
                            'address2'    => $params["address2"],
                            'city'        => $params["city"],
                            'state'       => $params["state"],
                            'postcode'    => $params["postcode"],
                            'country'     => $params["country"],
                            'phonenumber' => $params["phonenumber"],
                            'tax_id'      => $params['tax_id']
                        ],
                ]
        ];
    try
    {
        $call = new Calls\RegisterDomain(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Transfer Domain
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_TransferDomain($params)
{
    $postfields =
        [
            "domain"       => $params["domainname"],
            "regperiod"    => (int)$params["regperiod"],
            "eppcode"      => $params["eppcode"],
            'domainfields' => base64_encode(serialize($params["additionalfields"])),
            "addons"       =>
                [
                    "dnsmanagement"   => $params['dnsmanagement'] ? 1 : 0,
                    "emailforwarding" => $params['emailforwarding'] ? 1 : 0,
                    "idprotection"    => $params['idprotection'] ? 1 : 0,
                ],
            "nameservers"  =>
                [
                    $params["ns1"],
                    $params["ns2"],
                    $params["ns3"],
                    $params["ns4"],
                    $params["ns5"],
                ],
            "contacts"     =>
                [
                    "registrant" =>
                        [
                            'firstname'   => $params["firstname"],
                            'lastname'    => $params["lastname"],
                            'companyname' => $params["companyname"],
                            'email'       => $params["email"],
                            'address1'    => $params["address1"],
                            'address2'    => $params["address2"],
                            'city'        => $params["city"],
                            'state'       => $params["state"],
                            'postcode'    => $params["postcode"],
                            'country'     => $params["country"],
                            'phonenumber' => $params["phonenumber"],
                            'tax_id'      => $params['tax_id']
                        ],
                ]
        ];

    try
    {
        $call = new Calls\TransferDomain(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Renew Domain
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_RenewDomain($params)
{
    $postfields =
        [
            "domain"    => $params["domainname"],
            "regperiod" => (int)$params["regperiod"],
            "addons"    =>
                [
                    "dnsmanagement"   => $params['dnsmanagement'] ? 1 : 0,
                    "emailforwarding" => $params['emailforwarding'] ? 1 : 0,
                    "idprotection"    => $params['idprotection'] ? 1 : 0,
                ],
        ];

    try
    {
        $call = new Calls\RenewDomain(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Get name servers
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_GetNameservers($params)
{
    $postfields =
        [
            "domain" => $params["domainname"]
        ];

    try
    {
        $call = new Calls\GetNameServers(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Save nameservers
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_SaveNameservers($params)
{
    $postfields =
        [
            "domain" => $params["domainname"],

            "ns1" => $params["ns1"],
            "ns2" => $params["ns2"],
            "ns3" => $params["ns3"],
            "ns4" => $params["ns4"],
            "ns5" => $params["ns5"],
        ];

    try
    {
        $call = new Calls\SaveNameServers(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Release Domain
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_ReleaseDomain($params)
{
    $postfields =
        [
            "domain"      => $params["domainname"],
            "transfertag" => $params["transfertag"]
        ];

    try
    {
        $call = new Calls\ReleaseDomain(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Get EPP Code
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_GetEPPCode($params)
{
    $postfields =
        [
            "domain" => $params["domainname"],
        ];

    try
    {
        $call = new Calls\GetEppCode(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Get Contact Details
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_GetContactDetails($params)
{
    $postfields =
        [
            "domain" => $params["domainname"],
        ];
    try
    {
        $call   = new Calls\GetContactDetails(Configuration::create($params), $postfields);
        $result = $call->process();
        $new    = [];
        foreach ($result as $key => $value)
        {
            $new[$key] = [];
            foreach ($value as $detail => $info)
            {
                $new[$key][str_replace('_', ' ', $detail)] = $info;
            }
        }
        return $new;
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Save Contact Details
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_SaveContactDetails($params)
{
    $postfields =
        [
            "domain"         => $params["domainname"],
            "contactdetails" => $params["contactdetails"]
        ];

    try
    {
        $call = new Calls\SaveContactDetails(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Get Lock Status
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_GetRegistrarLock($params)
{
    $postfields =
        [
            "domain" => $params["domainname"],
        ];

    try
    {
        $call = new Calls\GetRegistrarLock(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Update Lock Status
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_SaveRegistrarLock($params)
{
    $postfields =
        [
            "domain"     => $params["domainname"],
            "lockstatus" => $params["lockenabled"]
        ];

    try
    {
        $call = new Calls\SaveRegistrarLock(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Get DNS Records
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_GetDNS($params)
{
    $postfields =
        [
            "domain" => $params["domainname"],
        ];

    try
    {
        $call = new Calls\GetDns(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Save DNS Records
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_SaveDNS($params)
{
    $postfields =
        [
            "domain"     => $params["domainname"],
            "dnsrecords" => $params["dnsrecords"]
        ];

    try
    {
        $call = new Calls\SaveDns(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Register Name Server
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_RegisterNameserver($params)
{
    $postfields =
        [
            "domain" => $params["domainname"],

            "nameserver" => $params["nameserver"],
            "ipaddress"  => $params["ipaddress"],
        ];

    try
    {
        $call = new Calls\RegisterNameServer(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Update Name Server
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_ModifyNameserver($params)
{
    $postfields =
        [
            "domain" => $params["domainname"],

            "nameserver"       => $params["nameserver"],
            "currentipaddress" => $params["currentipaddress"],
            "newipaddress"     => $params["newipaddress"],
        ];

    try
    {
        $call = new Calls\ModifyNameServer(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Delete Name Server
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_DeleteNameserver($params)
{
    $postfields =
        [
            "domain"     => $params["domainname"],
            "nameserver" => $params["nameserver"],
        ];

    try
    {
        $call = new Calls\DeleteNameServer(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Delete Domain
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_RequestDelete($params)
{
    $postfields =
        [
            "domain" => $params["domainname"]
        ];

    try
    {
        $call = new Calls\RequestDelete(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Synchronize transfer domain
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_TransferSync($params)
{
    $postfields =
        [
            "domain" => "{$params["sld"]}.{$params["tld"]}"
        ];

    try
    {
        $call = new Calls\TransferSync(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Synchronize Registered Domains
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_Sync($params)
{
    $postfields =
        [
            "domain" => "{$params["sld"]}.{$params["tld"]}"
        ];

    try
    {
        $call = new Calls\Sync(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Get list of emails aliases
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_GetEmailForwarding($params)
{
    $postfields =
        [
            "domain" => $params["domainname"]
        ];

    try
    {
        $call = new Calls\GetEmailForwarding(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * Save list of emails aliases
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_SaveEmailForwarding($params)
{
    $postfields =
        [
            "domain"    => $params["domainname"],
            "prefix"    => $params["prefix"],
            "forwardto" => $params["forwardto"]
        ];

    try
    {
        $call = new Calls\SaveEmailForwarding(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * This function is called when the ID Protection setting is toggled on or off
 *
 * @param array $params
 * @return array $return
 */
function NextaWebSolution_IDProtectionToggle($params)
{
    $postfields =
        [
            "domain" => $params["domainname"],
            "status" => $params["protectenable"]
        ];

    try
    {
        $call = new Calls\ToggleIdProtect(Configuration::create($params), $postfields);
        return $call->process();
    }
    catch (\Exception $e)
    {
        return ['error' => $e->getMessage()];
    }
}

/**
 * This function is called when the ID Protection setting is toggled on or off
 *
 * @param $params
 * @return array
 */
function NextaWebSolution_IDProtectToggle($params)
{
    return NextaWebSolution_IDProtectionToggle($params);
}


/**
 * Send domain lookup request
 *
 * @param $params
 * @return array|bool|mixed|stdClass|string
 */
function NextaWebSolution_CheckAvailability($params)
{
    $postfields =
        [
            "searchTerm"         => $params["searchTerm"],
            "punyCodeSearchTerm" => $params["punyCodeSearchTerm"],
            "tldsToInclude"      => $params["tldsToInclude"],
            "isIdnDomain"        => $params['isIdnDomain'],
            "premiumEnabled"     => $params['premiumEnabled'],
            "isWhmcs"            => 1
        ];

    try
    {
        $call = new Calls\CheckAvailability(Configuration::create($params), $postfields);
        $result = $call->process();
        return  ResultsListFactory::createResultsList($result);
    }
    catch (\Exception $e)
    {
        \logModuleCall(
            'NextaWebSolution',
            'DomainLookup',
            $postfields,
            ['error' => $e->getMessage()]
        );
        return  ResultsListFactory::createResultsList([]);    }
}
