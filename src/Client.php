<?php

namespace Silktide\SemRushApi;

use Silktide\SemRushApi\Cache\CacheInterface;
use Silktide\SemRushApi\Data\ApiEndpoint;
use Silktide\SemRushApi\Data\Type;
use Silktide\SemRushApi\Helper\ResponseParser;
use Silktide\SemRushApi\Helper\UrlBuilder;
use Silktide\SemRushApi\Model\Factory\RequestFactory;
use Silktide\SemRushApi\Model\Factory\ResultFactory;
use Silktide\SemRushApi\Model\Request;
use Silktide\SemRushApi\Model\Result as ApiResult;
use Guzzle\Http\Client as GuzzleClient;

class Client
{

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var RequestFactory
     */
    protected $requestFactory;

    /**
     * @var ResultFactory
     */
    protected $resultFactory;

    /**
     * @var ResponseParser
     */
    protected $responseParser;

    /**
     * @var UrlBuilder
     */
    protected $urlBuilder;

    /**
     * @var GuzzleClient
     */
    protected $guzzle;

    /**
     * @var CacheInterface
     */
    protected $cache;


    /**
     * Construct a client with API key
     *
     * @param string $apiKey
     * @param RequestFactory $requestFactory
     * @param ResultFactory $resultFactory
     * @param ResponseParser $responseParser
     * @param UrlBuilder $urlBuilder
     * @param GuzzleClient $guzzle
     */
    public function __construct($apiKey, RequestFactory $requestFactory, ResultFactory $resultFactory, ResponseParser $responseParser, UrlBuilder $urlBuilder, GuzzleClient $guzzle)
    {
        $this->apiKey = $apiKey;
        $this->requestFactory = $requestFactory;
        $this->resultFactory = $resultFactory;
        $this->responseParser = $responseParser;
        $this->urlBuilder = $urlBuilder;
        $this->guzzle = $guzzle;
    }

    /**
     * @param CacheInterface $cache
     */
    public function setCache(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param string $domain
     * @param array $options
     * @return ApiResult
     */
    public function getDomainRanks($domain, $options = [])
    {
        return $this->makeRequest(Type::TYPE_DOMAIN_RANKS, ['domain' => $domain] + $options);
    }

    /**
     * @param string $domain
     * @param array $options
     * @return ApiResult
     */
    public function getDomainRank($domain, $options = [])
    {
        return $this->makeRequest(Type::TYPE_DOMAIN_RANK, ['domain' => $domain] + $options);
    }

    /**
     * @param string $domain
     * @param array $options
     * @return ApiResult
     */
    public function getDomainOrganic($domain, $options = [])
    {
        return $this->makeRequest(Type::TYPE_DOMAIN_ORGANIC, ['domain' => $domain] + $options);
    }

    /**
     * @param $domain
     * @param array $options
     * @return ApiResult
     */
    public  function getDomainOrganicCompetitors($domain, $options = [])
    {
        return $this->makeRequest(Type::TYPE_DOMAIN_ORGANIC_COMPETITORS, ['domain' => $domain] + $options);
    }

    /**
     * @param string $domain
     * @param array $options
     * @return ApiResult
     */
    public function getDomainAdwords($domain, $options = [])
    {
        return $this->makeRequest(Type::TYPE_DOMAIN_ADWORDS, ['domain' => $domain] + $options);
    }

    /**
     * @param string $domain
     * @param array $options
     * @return ApiResult
     */
    public function getDomainAdwordsUnique($domain, $options = [])
    {
        return $this->makeRequest(Type::TYPE_DOMAIN_ADWORDS_UNIQUE, ['domain' => $domain] + $options);
    }

    /**
     * @param string $domain
     * @param array $options
     * @return ApiResult
     */
    public function getDomainRankHistory($domain, $options = [])
    {
        return $this->makeRequest(Type::TYPE_DOMAIN_RANK_HISTORY, ['domain' => $domain] + $options);
    }

    /**
     * @param $phrase
     * @param array $options
     * @return ApiResult
     */
    public function getOrganicResults($phrase, $options = [])
    {
        return $this->makeRequest(Type::TYPE_ORGANIC_RESULTS, ['phrase' => $phrase] + $options);
    }

    /**
     * @param $phrase
     * @param array $options
     * @return ApiResult
     */
    public function getPhraseMatchKeywords($phrase, $options = [])
    {
        return $this->makeRequest(Type::TYPE_PHRASE_FULLSEARCH, ['phrase' => $phrase] + $options);
    }

    /**
     * @param $phrase
     * @param array $options
     * @return ApiResult
     */
    public function getRelatedKeywords($phrase, $options = [])
    {
        return $this->makeRequest(Type::TYPE_PHRASE_RELATED, ['phrase'=>$phrase] + $options);
    }

    /**
     * @param $phrase
     * @param array $options
     * @return ApiResult
     */
    public function getKeywordOverview($phrase, $options = [])
    {
        return $this->makeRequest(Type::TYPE_PHRASE_ALL, ['phrase' => $phrase] + $options);
    }

    /**
     * @param $phrase
     * @param array $options
     * @return ApiResult
     */
    public function getKeywordOverviewSingle($phrase, $options = [])
    {
        return $this->makeRequest(TYPE::TYPE_PHRASE_THIS, ['phrase'=> $phrase] + $options);
    }

    /**
     * @param $phrase
     * @param array $options
     * @return ApiResult
     */
    public function getPaidResults($phrase, $options = [])
    {
        return $this->makeRequest(Type::TYPE_PHRASE_ADWORDS, ['phrase' => $phrase] + $options);
    }

    /**
     * @param $phrase
     * @param array $options
     * @return ApiResult
     */
    public function getKeywordAdsHistory($phrase, $options = [])
    {
        return $this->makeRequest(Type::TYPE_PHRASE_ADWORDS_HISTORICAL, ['phrase' => $phrase] + $options);
    }

    /**
     * @param $phrase
     * @param array $options
     * @return ApiResult
     */
    public function getKeywordDifficulty($phrase, $options = [])
    {
        return $this->makeRequest(Type::TYPE_PHRASE_KDI, ['phrase' => $phrase] + $options);
    }

    /**
     * @param string $domain
     * @param array $options
     * @param string $endpoint_path
     * @param string $root_domain
     * @return ApiResult
     */
    public function getPublisherTextAds($domain, $options = [], $endpoint_path = "/", $root_domain = "http://api.asns.backend.semrush.com")
    {
        return $this->makeRequest(Type::TYPE_PUBLISHER_TEXT_ADS, ['domain'=>$domain] + $options, $endpoint_path, $root_domain);
    }

    /**
     * @param $domain
     * @param array $options
     * @param string $endpoint_path
     * @param string $root_domain
     * @return ApiResult
     */
    public function getAdvertiserLandings($domain, $options = [], $endpoint_path = "/", $root_domain = "http://api.asns.backend.semrush.com")
    {
        return $this->makeRequest(Type::TYPE_ADVERTISER_LANDINGS, ['domain'=>$domain] + $options, $endpoint_path, $root_domain);
    }

    /**
     * @param $domain
     * @param array $options
     * @param string $endpoint_path
     * @param string $root_domain
     * @return ApiResult
     */
    public function getAdvertiserTextAds($domain, $options = [], $endpoint_path = "/", $root_domain = "http://api.asns.backend.semrush.com")
    {
        return $this->makeRequest(Type::TYPE_ADVERTISER_TEXT_ADS, ['domain'=>$domain] + $options, $endpoint_path, $root_domain);
    }

    public function getIndexedPages($target, $options = [], $endpoint_path = ApiEndpoint::ENDPOINT_ANALYTICS)
    {
        return $this->makeRequest(Type::TYPE_INDEXED_PAGES, ['targe'=>$target] + $options, $endpoint_path);
    }


    /**
     * Make the request
     *
     * @param string $type
     * @param array $options
     * @return ApiResult
     */
    protected function makeRequest($type, $options, $endpoint_path = \Silktide\SemRushApi\Data\ApiEndpoint::ENDPOINT_DOMAIN, $root_domain = "http://api.semrush.com")
    {
        $request = $this->requestFactory->create($type, ['key' => $this->apiKey] + $options, $endpoint_path, $root_domain);

        // Attempt load from cache
        if (isset($this->cache)) {
            $result = $this->cache->fetch($request);
        }

        // Make request if not in cache
        if (!isset($result)) {
            $rawResponse = $this->makeHttpRequest($request);
            $formattedResponse = $this->responseParser->parseResult($request, $rawResponse);
            $result = $this->resultFactory->create($formattedResponse);
        }

        // Save to cache
        if (isset($this->cache)) {
            $this->cache->cache($request, $result);
        }

        return $result;
    }

    /**
     * Use guzzle to make request to API
     *
     * @param Request $request
     * @return string
     */
    protected function makeHttpRequest($request)
    {
        $url = $this->urlBuilder->build($request);
        $guzzleRequest = $this->guzzle->createRequest('GET', $url);
        $guzzleResponse = $this->guzzle->send($guzzleRequest);
        return $guzzleResponse->getBody();
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

} 