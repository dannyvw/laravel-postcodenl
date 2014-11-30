<?php

/**
 * Laravel PostcodeNL API
 *
 * @author    Danny van Wijk <info@vwmedia.nl>
 * @copyright 2014 Danny van Wijk
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/dannyvw/laravel-postcodenl
 */

namespace Dannyvw\LaravelPostcodenl;

use Guzzle\Http\Client;

class Postcodenl
{
    /**
     * @var \Guzzle\Http\Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var string
     */
    protected $apiUser;

    /**
     * @var string
     */
    protected $apiSecret;

    /**
     * @param \Guzzle\Http\Client $client
     * @param string $baseUrl
     * @param string $apiUser
     * @param string $apiSecret
     */
    public function __construct(Client $client, $baseUrl, $apiUser, $apiSecret)
    {
        $this->client    = $client;
        $this->baseUrl   = $baseUrl;
        $this->apiUser   = $apiUser;
        $this->apiSecret = $apiSecret;
    }

    /**
     * @param string $postalCode
     * @param string $houseNumber
     * @return array
     */
    public function lookupAddress($postalCode, $houseNumber)
    {
        $this->client->setConfig(
            [
                'curl.options' => [
                    'CURLOPT_CONNECTTIMEOUT_MS' => '2000',
                    'CURLOPT_RETURNTRANSFER'    => true,
                ]
            ]
        );

        $url = sprintf(
            $this->baseUrl . '/%s/%s',
            $postalCode,
            $houseNumber
        );

        $request = $this->client->get($url)
            ->setAuth($this->apiUser, $this->apiSecret);

        return $request->send()->json();
    }
}
