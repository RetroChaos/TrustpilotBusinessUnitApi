<?php

namespace Trustpilot\Api\BusinessUnit;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use GuzzleHttp\Exception\GuzzleException;

class Client
{
    const ENDPOINT = 'https://api.trustpilot.com/v1/business-units';

    /**
     * @var string
     */
    private string $apiKey;

    /**
     * @var GuzzleClientInterface
     */
    private GuzzleClientInterface $guzzle;

  /**
   * @param string $apiKey
   * @param GuzzleClientInterface|null $guzzle
   */
    public function __construct(string $apiKey, GuzzleClientInterface $guzzle = null)
    {
        $this->apiKey = $apiKey;
        $this->guzzle = (null !== $guzzle) ? $guzzle : new GuzzleClient();
    }

  /**
   * @param string $url
   * @param array|null $form
   * @return array
   * @throws GuzzleException
   */
    private function makeRequest(string $url, array $form = null): array {
        $options = ['query' => ['apikey' => $this->apiKey]];

        if (null !== $form) {
            $options['query'] += $form;
        }

        $response = $this->guzzle->request('GET', $url, $options);

        return json_decode((string) $response->getBody(), true);
    }

  /**
   * @param string $name
   * @return array
   * @throws GuzzleException
   */
    public function find(string $name): array {
        return $this->makeRequest(self::ENDPOINT . '/find', ['name' => $name]);
    }

  /**
   * @param string $businessUnitId
   * @return array
   * @throws GuzzleException
   */
    public function get(string $businessUnitId): array {
        return $this->makeRequest(self::ENDPOINT . '/' . $businessUnitId);
    }

  /**
   * @param string $businessUnitId
   * @param array $optionalParams
   * @return array
   * @throws GuzzleException
   */
    public function getReviews(string $businessUnitId, array $optionalParams = []): array {
        return $this->makeRequest(self::ENDPOINT . '/' . $businessUnitId . '/reviews', $optionalParams);
    }
}
