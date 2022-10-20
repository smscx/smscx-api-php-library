<?php
/**
 * ViberApi
 * PHP version 7.4
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */

namespace Smscx\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Smscx\Client\Exception\ApiException;
use Smscx\Configuration;
use Smscx\HeaderSelector;
use Smscx\ObjectSerializer;

/**
 * ViberApi Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */
class ViberApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional)
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation deleteScheduledViberCampaign
     *
     * Delete scheduled Viber campaign
     *
     * @param  string $campaign_id Identifier of a scheduled Viber campaign (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\DeleteScheduledCampaign|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function deleteScheduledViberCampaign($campaign_id)
    {
        list($response) = $this->deleteScheduledViberCampaignWithHttpInfo($campaign_id);
        return $response;
    }

    /**
     * Operation deleteScheduledViberCampaignWithHttpInfo
     *
     * Delete scheduled Viber campaign
     *
     * @param  string $campaign_id Identifier of a scheduled Viber campaign (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\DeleteScheduledCampaign|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteScheduledViberCampaignWithHttpInfo($campaign_id)
    {
        $request = $this->deleteScheduledViberCampaignRequest($campaign_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Smscx\Client\Model\DeleteScheduledCampaign' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\DeleteScheduledCampaign' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\DeleteScheduledCampaign', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Smscx\Client\Model\Model400InvalidParam' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model400InvalidParam' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model400InvalidParam', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Smscx\Client\Model\Model401Unauthorized' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model401Unauthorized' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model401Unauthorized', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Smscx\Client\Model\Model403InsufficientScope' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model403InsufficientScope' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model403InsufficientScope', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Smscx\Client\Model\Model404NotFound' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model404NotFound' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model404NotFound', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 405:
                    if ('\Smscx\Client\Model\Model405MethodNotAllowed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model405MethodNotAllowed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model405MethodNotAllowed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\Smscx\Client\Model\Model429TooManyRequests' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model429TooManyRequests' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model429TooManyRequests', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Smscx\Client\Model\Model500ServerError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model500ServerError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model500ServerError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Smscx\Client\Model\DeleteScheduledCampaign';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model400InvalidParam',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\InvalidRequestException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 401:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model401Unauthorized',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\InvalidCredentialsException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 403:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model403InsufficientScope',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$errorType = $e->getResponseObject()->getError()->getType();
                    $errorCode = (int) $e->getResponseObject()->getError()->getCode();
					if ( $errorType == 'insufficient_scope') {
						$className = 'InsufficientScopeException';
					}
					elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
						$className = 'ChannelNotActiveException';
					}                    
					elseif ( $errorType == 'access_denied' && $errorCode === 1118 ) {
						$className = 'AccessDeniedException';
					}
					else {
						$className = 'ApiException';
					}
					$exceptionClass = "\\Smscx\\Client\\Exception\\".$className;                    
					$e =  new $exceptionClass(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 404:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model404NotFound',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ResourceNotFoundException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 405:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model405MethodNotAllowed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 429:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model429TooManyRequests',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 500:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model500ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ServerErrorException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteScheduledViberCampaignAsync
     *
     * Delete scheduled Viber campaign
     *
     * @param  string $campaign_id Identifier of a scheduled Viber campaign (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteScheduledViberCampaignAsync($campaign_id)
    {
        return $this->deleteScheduledViberCampaignAsyncWithHttpInfo($campaign_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteScheduledViberCampaignAsyncWithHttpInfo
     *
     * Delete scheduled Viber campaign
     *
     * @param  string $campaign_id Identifier of a scheduled Viber campaign (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteScheduledViberCampaignAsyncWithHttpInfo($campaign_id)
    {
        $returnType = '\Smscx\Client\Model\DeleteScheduledCampaign';
        $request = $this->deleteScheduledViberCampaignRequest($campaign_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    switch ($statusCode) {
                        case 400:             
                            $e =  new \Smscx\Client\Exception\InvalidRequestException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;                        
                        case 401:             
                            $e =  new \Smscx\Client\Exception\InvalidCredentialsException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 403:             
                            $errorObject = json_decode( (string) $response->getBody() );
                            $errorType = $errorObject->error->type;
                            $errorCode = (int) $errorObject->error->code;
                            if ( $errorType == 'insufficient_scope') {
                                $className = 'InsufficientScopeException';
                            }
                            elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
                                $className = 'ChannelNotActiveException';
                            }                    
                            elseif ( $errorType == 'access_denied' && $errorCode === 1118 ) {
                                $className = 'AccessDeniedException';
                            }
                            else {
                                $className = 'ApiException';
                            }
                            $exceptionClass = "\\Smscx\\Client\\Exception\\".$className;
                            $e =  new $exceptionClass(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 404:             
                            $e =  new \Smscx\Client\Exception\ResourceNotFoundException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 405:             
                            $e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 429:             
                            $e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 500:             
                            $e =  new \Smscx\Client\Exception\ServerErrorException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        default:
                            $e =  new \Smscx\Client\Exception\ApiException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        
                    }
                    throw $e;
                }
            );
    }

    /**
     * Create request for operation 'deleteScheduledViberCampaign'
     *
     * @param  string $campaign_id Identifier of a scheduled Viber campaign (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteScheduledViberCampaignRequest($campaign_id)
    {

        // verify the required parameter 'campaign_id' is set
        if ($campaign_id === null || (is_array($campaign_id) && count($campaign_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $campaign_id when calling deleteScheduledViberCampaign'
            );
        }
        if (strlen($campaign_id) > 36) {
            throw new \InvalidArgumentException('invalid length for "$campaign_id" when calling ViberApi.deleteScheduledViberCampaign, must be smaller than or equal to 36.');
        }
        if (strlen($campaign_id) < 36) {
            throw new \InvalidArgumentException('invalid length for "$campaign_id" when calling ViberApi.deleteScheduledViberCampaign, must be bigger than or equal to 36.');
        }
        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $campaign_id)) {
            throw new \InvalidArgumentException("invalid value for \"campaign_id\" when calling ViberApi.deleteScheduledViberCampaign, must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        $resourcePath = '/viber/scheduled/campaign/{campaignId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($campaign_id !== null) {
            $resourcePath = str_replace(
                '{' . 'campaignId' . '}',
                ObjectSerializer::toPathValue($campaign_id),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix();
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }
        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteScheduledViberMessage
     *
     * Delete scheduled Viber message
     *
     * @param  string $msg_id Identifier of a scheduled Viber message (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\DeleteScheduledMsg|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function deleteScheduledViberMessage($msg_id)
    {
        list($response) = $this->deleteScheduledViberMessageWithHttpInfo($msg_id);
        return $response;
    }

    /**
     * Operation deleteScheduledViberMessageWithHttpInfo
     *
     * Delete scheduled Viber message
     *
     * @param  string $msg_id Identifier of a scheduled Viber message (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\DeleteScheduledMsg|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteScheduledViberMessageWithHttpInfo($msg_id)
    {
        $request = $this->deleteScheduledViberMessageRequest($msg_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Smscx\Client\Model\DeleteScheduledMsg' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\DeleteScheduledMsg' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\DeleteScheduledMsg', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Smscx\Client\Model\Model400InvalidParam' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model400InvalidParam' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model400InvalidParam', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Smscx\Client\Model\Model401Unauthorized' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model401Unauthorized' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model401Unauthorized', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Smscx\Client\Model\Model403InsufficientScope' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model403InsufficientScope' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model403InsufficientScope', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Smscx\Client\Model\Model404NotFound' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model404NotFound' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model404NotFound', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 405:
                    if ('\Smscx\Client\Model\Model405MethodNotAllowed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model405MethodNotAllowed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model405MethodNotAllowed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\Smscx\Client\Model\Model429TooManyRequests' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model429TooManyRequests' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model429TooManyRequests', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Smscx\Client\Model\Model500ServerError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model500ServerError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model500ServerError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Smscx\Client\Model\DeleteScheduledMsg';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model400InvalidParam',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\InvalidRequestException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 401:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model401Unauthorized',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\InvalidCredentialsException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 403:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model403InsufficientScope',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$errorType = $e->getResponseObject()->getError()->getType();
                    $errorCode = (int) $e->getResponseObject()->getError()->getCode();
					if ( $errorType == 'insufficient_scope') {
						$className = 'InsufficientScopeException';
					}
					elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
						$className = 'ChannelNotActiveException';
					}                    
					elseif ( $errorType == 'access_denied' && $errorCode === 1118 ) {
						$className = 'AccessDeniedException';
					}
					else {
						$className = 'ApiException';
					}
					$exceptionClass = "\\Smscx\\Client\\Exception\\".$className;                    
					$e =  new $exceptionClass(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 404:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model404NotFound',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ResourceNotFoundException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 405:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model405MethodNotAllowed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 429:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model429TooManyRequests',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 500:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model500ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ServerErrorException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteScheduledViberMessageAsync
     *
     * Delete scheduled Viber message
     *
     * @param  string $msg_id Identifier of a scheduled Viber message (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteScheduledViberMessageAsync($msg_id)
    {
        return $this->deleteScheduledViberMessageAsyncWithHttpInfo($msg_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteScheduledViberMessageAsyncWithHttpInfo
     *
     * Delete scheduled Viber message
     *
     * @param  string $msg_id Identifier of a scheduled Viber message (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteScheduledViberMessageAsyncWithHttpInfo($msg_id)
    {
        $returnType = '\Smscx\Client\Model\DeleteScheduledMsg';
        $request = $this->deleteScheduledViberMessageRequest($msg_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    switch ($statusCode) {
                        case 400:             
                            $e =  new \Smscx\Client\Exception\InvalidRequestException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;                        
                        case 401:             
                            $e =  new \Smscx\Client\Exception\InvalidCredentialsException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 403:             
                            $errorObject = json_decode( (string) $response->getBody() );
                            $errorType = $errorObject->error->type;
                            $errorCode = (int) $errorObject->error->code;
                            if ( $errorType == 'insufficient_scope') {
                                $className = 'InsufficientScopeException';
                            }
                            elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
                                $className = 'ChannelNotActiveException';
                            }                    
                            elseif ( $errorType == 'access_denied' && $errorCode === 1118 ) {
                                $className = 'AccessDeniedException';
                            }
                            else {
                                $className = 'ApiException';
                            }
                            $exceptionClass = "\\Smscx\\Client\\Exception\\".$className;
                            $e =  new $exceptionClass(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 404:             
                            $e =  new \Smscx\Client\Exception\ResourceNotFoundException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 405:             
                            $e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 429:             
                            $e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 500:             
                            $e =  new \Smscx\Client\Exception\ServerErrorException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        default:
                            $e =  new \Smscx\Client\Exception\ApiException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        
                    }
                    throw $e;
                }
            );
    }

    /**
     * Create request for operation 'deleteScheduledViberMessage'
     *
     * @param  string $msg_id Identifier of a scheduled Viber message (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteScheduledViberMessageRequest($msg_id)
    {

        // verify the required parameter 'msg_id' is set
        if ($msg_id === null || (is_array($msg_id) && count($msg_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $msg_id when calling deleteScheduledViberMessage'
            );
        }
        if (strlen($msg_id) > 36) {
            throw new \InvalidArgumentException('invalid length for "$msg_id" when calling ViberApi.deleteScheduledViberMessage, must be smaller than or equal to 36.');
        }
        if (strlen($msg_id) < 36) {
            throw new \InvalidArgumentException('invalid length for "$msg_id" when calling ViberApi.deleteScheduledViberMessage, must be bigger than or equal to 36.');
        }
        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $msg_id)) {
            throw new \InvalidArgumentException("invalid value for \"msg_id\" when calling ViberApi.deleteScheduledViberMessage, must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }


        $resourcePath = '/viber/scheduled/{msgId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($msg_id !== null) {
            $resourcePath = str_replace(
                '{' . 'msgId' . '}',
                ObjectSerializer::toPathValue($msg_id),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix();
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }
        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation estimateViberCampaign
     *
     * Estimate Viber campaign
     *
     * @param  \Smscx\Client\Model\SendViberCampaignRequestEstimate $send_viber_campaign_request_estimate  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\SendViberCampaignResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403NoCoverage|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function estimateViberCampaign($send_viber_campaign_request_estimate)
    {
        list($response) = $this->estimateViberCampaignWithHttpInfo($send_viber_campaign_request_estimate);
        return $response;
    }

    /**
     * Operation estimateViberCampaignWithHttpInfo
     *
     * Estimate Viber campaign
     *
     * @param  \Smscx\Client\Model\SendViberCampaignRequestEstimate $send_viber_campaign_request_estimate  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\SendViberCampaignResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403NoCoverage|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function estimateViberCampaignWithHttpInfo($send_viber_campaign_request_estimate)
    {
        $request = $this->estimateViberCampaignRequest($send_viber_campaign_request_estimate);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Smscx\Client\Model\SendViberCampaignResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\SendViberCampaignResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\SendViberCampaignResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Smscx\Client\Model\Model400InvalidParam' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model400InvalidParam' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model400InvalidParam', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Smscx\Client\Model\Model401Unauthorized' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model401Unauthorized' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model401Unauthorized', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Smscx\Client\Model\Model403NoCoverage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model403NoCoverage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model403NoCoverage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 405:
                    if ('\Smscx\Client\Model\Model405MethodNotAllowed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model405MethodNotAllowed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model405MethodNotAllowed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\Smscx\Client\Model\Model429TooManyRequests' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model429TooManyRequests' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model429TooManyRequests', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Smscx\Client\Model\Model500ServerError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model500ServerError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model500ServerError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Smscx\Client\Model\SendViberCampaignResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model400InvalidParam',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$errorType = $e->getResponseObject()->getError()->getType();
					$errorCode = (int) $e->getResponseObject()->getError()->getCode();
					if ( $errorType == 'invalid_param' && ($errorCode === 1207 || $errorCode === 1210) ) {
						$className = 'InvalidPhoneNumberException';
					}
                    elseif ( $errorType == 'insufficient_credit' ) {
						$className = 'InsufficientBalanceException';
                    }
					else {
						$className = 'InvalidRequestException';
					}
					$exceptionClass = "\\Smscx\\Client\\Exception\\".$className;                    
					$e =  new $exceptionClass(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 401:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model401Unauthorized',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\InvalidCredentialsException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 403:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model403NoCoverage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$errorType = $e->getResponseObject()->getError()->getType();
                    $errorCode = (int) $e->getResponseObject()->getError()->getCode();
					if ( $errorType == 'insufficient_scope') {
						$className = 'InsufficientScopeException';
					}
					elseif ( $errorType == 'no_coverage' ) {
						$className = 'NoCoverageException';
					}					
					elseif ( $errorType == 'access_denied' && ( $errorCode === 1132 || $errorCode === 1133 ) ) {
						$className = 'TemplateNotApprovedException';
					}
					elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
						$className = 'ChannelNotActiveException';
					} 					
					else {
						$className = 'ApiException';
					}
					$exceptionClass = "\\Smscx\\Client\\Exception\\".$className;                    
					$e =  new $exceptionClass(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 405:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model405MethodNotAllowed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 429:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model429TooManyRequests',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 500:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model500ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ServerErrorException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation estimateViberCampaignAsync
     *
     * Estimate Viber campaign
     *
     * @param  \Smscx\Client\Model\SendViberCampaignRequestEstimate $send_viber_campaign_request_estimate  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function estimateViberCampaignAsync($send_viber_campaign_request_estimate)
    {
        return $this->estimateViberCampaignAsyncWithHttpInfo($send_viber_campaign_request_estimate)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation estimateViberCampaignAsyncWithHttpInfo
     *
     * Estimate Viber campaign
     *
     * @param  \Smscx\Client\Model\SendViberCampaignRequestEstimate $send_viber_campaign_request_estimate  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function estimateViberCampaignAsyncWithHttpInfo($send_viber_campaign_request_estimate)
    {
        $returnType = '\Smscx\Client\Model\SendViberCampaignResponse';
        $request = $this->estimateViberCampaignRequest($send_viber_campaign_request_estimate);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    switch ($statusCode) {
                        case 400:             
                            $errorObject = json_decode( (string) $response->getBody() );
                            $errorType = $errorObject->error->type;
                            $errorCode = (int) $errorObject->error->code;
                            if ( $errorType == 'invalid_param' && ($errorCode === 1207 || $errorCode === 1210) ) {
                                $className = 'InvalidPhoneNumberException';
                            }
                            elseif ( $errorType == 'insufficient_credit' ) {
                                $className = 'InsufficientBalanceException';
                            }                            
                            else {
                                $className = 'InvalidRequestException';
                            }
                            $exceptionClass = "\\Smscx\\Client\\Exception\\".$className;
                            $e =  new $exceptionClass(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;                        
                        case 401:             
                            $e =  new \Smscx\Client\Exception\InvalidCredentialsException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 403:             
                            $errorObject = json_decode( (string) $response->getBody() );
                            $errorType = $errorObject->error->type;
                            $errorCode = (int) $errorObject->error->code;
							if ( $errorType == 'insufficient_scope') {
								$className = 'InsufficientScopeException';
							}
							elseif ( $errorType == 'no_coverage' ) {
								$className = 'NoCoverageException';
							}					
							elseif ( $errorType == 'access_denied' && ( $errorCode === 1132 || $errorCode === 1133 ) ) {
								$className = 'TemplateNotApprovedException';
							}
							elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
								$className = 'ChannelNotActiveException';
							} 					
							else {
								$className = 'ApiException';
							}
                            $exceptionClass = "\\Smscx\\Client\\Exception\\".$className;
                            $e =  new $exceptionClass(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 404:             
                            $e =  new \Smscx\Client\Exception\ResourceNotFoundException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 405:             
                            $e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 429:             
                            $e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 500:             
                            $e =  new \Smscx\Client\Exception\ServerErrorException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        default:
                            $e =  new \Smscx\Client\Exception\ApiException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        
                    }
                    throw $e;
                }
            );
    }

    /**
     * Create request for operation 'estimateViberCampaign'
     *
     * @param  \Smscx\Client\Model\SendViberCampaignRequestEstimate $send_viber_campaign_request_estimate  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function estimateViberCampaignRequest($send_viber_campaign_request_estimate)
    {

        // verify the required parameter 'send_viber_campaign_request_estimate' is set
        if ($send_viber_campaign_request_estimate === null || (is_array($send_viber_campaign_request_estimate) && count($send_viber_campaign_request_estimate) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $send_viber_campaign_request_estimate when calling estimateViberCampaign'
            );
        }

        $resourcePath = '/viber/campaign/estimate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($send_viber_campaign_request_estimate)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($send_viber_campaign_request_estimate));
            } else {
                $httpBody = $send_viber_campaign_request_estimate;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix();
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }
        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation estimateViberMessage
     *
     * Estimate Viber message
     *
     * @param  \Smscx\Client\Model\SendViberMessageRequestEstimate $send_viber_message_request_estimate  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\SendViberMessageResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403NoCoverage|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function estimateViberMessage($send_viber_message_request_estimate)
    {
        list($response) = $this->estimateViberMessageWithHttpInfo($send_viber_message_request_estimate);
        return $response;
    }

    /**
     * Operation estimateViberMessageWithHttpInfo
     *
     * Estimate Viber message
     *
     * @param  \Smscx\Client\Model\SendViberMessageRequestEstimate $send_viber_message_request_estimate  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\SendViberMessageResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403NoCoverage|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function estimateViberMessageWithHttpInfo($send_viber_message_request_estimate)
    {
        $request = $this->estimateViberMessageRequest($send_viber_message_request_estimate);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Smscx\Client\Model\SendViberMessageResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\SendViberMessageResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\SendViberMessageResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Smscx\Client\Model\Model400InvalidParam' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model400InvalidParam' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model400InvalidParam', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Smscx\Client\Model\Model401Unauthorized' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model401Unauthorized' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model401Unauthorized', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Smscx\Client\Model\Model403NoCoverage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model403NoCoverage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model403NoCoverage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 405:
                    if ('\Smscx\Client\Model\Model405MethodNotAllowed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model405MethodNotAllowed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model405MethodNotAllowed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\Smscx\Client\Model\Model429TooManyRequests' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model429TooManyRequests' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model429TooManyRequests', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Smscx\Client\Model\Model500ServerError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model500ServerError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model500ServerError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Smscx\Client\Model\SendViberMessageResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model400InvalidParam',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$errorType = $e->getResponseObject()->getError()->getType();
					$errorCode = (int) $e->getResponseObject()->getError()->getCode();
					if ( $errorType == 'invalid_param' && ($errorCode === 1207 || $errorCode === 1210) ) {
						$className = 'InvalidPhoneNumberException';
					}
                    elseif ( $errorType == 'insufficient_credit' ) {
						$className = 'InsufficientBalanceException';
                    }                    
					else {
						$className = 'InvalidRequestException';
					}
					$exceptionClass = "\\Smscx\\Client\\Exception\\".$className;                    
					$e =  new $exceptionClass(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 401:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model401Unauthorized',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\InvalidCredentialsException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 403:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model403NoCoverage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$errorType = $e->getResponseObject()->getError()->getType();
                    $errorCode = (int) $e->getResponseObject()->getError()->getCode();
					if ( $errorType == 'insufficient_scope') {
						$className = 'InsufficientScopeException';
					}
					elseif ( $errorType == 'no_coverage' ) {
						$className = 'NoCoverageException';
					}					
					elseif ( $errorType == 'access_denied' && ( $errorCode === 1132 || $errorCode === 1133 ) ) {
						$className = 'TemplateNotApprovedException';
					}
					elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
						$className = 'ChannelNotActiveException';
					} 					
					else {
						$className = 'ApiException';
					}
					$exceptionClass = "\\Smscx\\Client\\Exception\\".$className;                    
					$e =  new $exceptionClass(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 405:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model405MethodNotAllowed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 429:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model429TooManyRequests',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 500:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model500ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ServerErrorException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation estimateViberMessageAsync
     *
     * Estimate Viber message
     *
     * @param  \Smscx\Client\Model\SendViberMessageRequestEstimate $send_viber_message_request_estimate  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function estimateViberMessageAsync($send_viber_message_request_estimate)
    {
        return $this->estimateViberMessageAsyncWithHttpInfo($send_viber_message_request_estimate)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation estimateViberMessageAsyncWithHttpInfo
     *
     * Estimate Viber message
     *
     * @param  \Smscx\Client\Model\SendViberMessageRequestEstimate $send_viber_message_request_estimate  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function estimateViberMessageAsyncWithHttpInfo($send_viber_message_request_estimate)
    {
        $returnType = '\Smscx\Client\Model\SendViberMessageResponse';
        $request = $this->estimateViberMessageRequest($send_viber_message_request_estimate);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    switch ($statusCode) {
                        case 400:             
                            $errorObject = json_decode( (string) $response->getBody() );
                            $errorType = $errorObject->error->type;
                            $errorCode = (int) $errorObject->error->code;
                            if ( $errorType == 'invalid_param' && ($errorCode === 1207 || $errorCode === 1210) ) {
                                $className = 'InvalidPhoneNumberException';
                            }
                            elseif ( $errorType == 'insufficient_credit' ) {
                                $className = 'InsufficientBalanceException';
                            }                            
                            else {
                                $className = 'InvalidRequestException';
                            }
                            $exceptionClass = "\\Smscx\\Client\\Exception\\".$className;
                            $e =  new $exceptionClass(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;                        
                        case 401:             
                            $e =  new \Smscx\Client\Exception\InvalidCredentialsException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 403:             
                            $errorObject = json_decode( (string) $response->getBody() );
                            $errorType = $errorObject->error->type;
                            $errorCode = (int) $errorObject->error->code;
							if ( $errorType == 'insufficient_scope') {
								$className = 'InsufficientScopeException';
							}
							elseif ( $errorType == 'no_coverage' ) {
								$className = 'NoCoverageException';
							}					
							elseif ( $errorType == 'access_denied' && ( $errorCode === 1132 || $errorCode === 1133 ) ) {
								$className = 'TemplateNotApprovedException';
							}
							elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
								$className = 'ChannelNotActiveException';
							} 					
							else {
								$className = 'ApiException';
							}
                            $exceptionClass = "\\Smscx\\Client\\Exception\\".$className;
                            $e =  new $exceptionClass(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 404:             
                            $e =  new \Smscx\Client\Exception\ResourceNotFoundException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 405:             
                            $e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 429:             
                            $e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 500:             
                            $e =  new \Smscx\Client\Exception\ServerErrorException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        default:
                            $e =  new \Smscx\Client\Exception\ApiException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        
                    }
                    throw $e;
                }
            );
    }

    /**
     * Create request for operation 'estimateViberMessage'
     *
     * @param  \Smscx\Client\Model\SendViberMessageRequestEstimate $send_viber_message_request_estimate  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function estimateViberMessageRequest($send_viber_message_request_estimate)
    {

        // verify the required parameter 'send_viber_message_request_estimate' is set
        if ($send_viber_message_request_estimate === null || (is_array($send_viber_message_request_estimate) && count($send_viber_message_request_estimate) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $send_viber_message_request_estimate when calling estimateViberMessage'
            );
        }

        $resourcePath = '/viber/estimate';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($send_viber_message_request_estimate)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($send_viber_message_request_estimate));
            } else {
                $httpBody = $send_viber_message_request_estimate;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix();
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }
        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation sendViberCampaign
     *
     * Send Viber campaign
     *
     * @param  \Smscx\Client\Model\SendViberCampaignRequest $send_viber_campaign_request  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\SendViberCampaignResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403NoCoverage|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function sendViberCampaign($send_viber_campaign_request)
    {
        list($response) = $this->sendViberCampaignWithHttpInfo($send_viber_campaign_request);
        return $response;
    }

    /**
     * Operation sendViberCampaignWithHttpInfo
     *
     * Send Viber campaign
     *
     * @param  \Smscx\Client\Model\SendViberCampaignRequest $send_viber_campaign_request  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\SendViberCampaignResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403NoCoverage|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendViberCampaignWithHttpInfo($send_viber_campaign_request)
    {
        $request = $this->sendViberCampaignRequest($send_viber_campaign_request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Smscx\Client\Model\SendViberCampaignResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\SendViberCampaignResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\SendViberCampaignResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Smscx\Client\Model\Model400InvalidParam' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model400InvalidParam' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model400InvalidParam', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Smscx\Client\Model\Model401Unauthorized' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model401Unauthorized' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model401Unauthorized', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Smscx\Client\Model\Model403NoCoverage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model403NoCoverage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model403NoCoverage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 405:
                    if ('\Smscx\Client\Model\Model405MethodNotAllowed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model405MethodNotAllowed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model405MethodNotAllowed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\Smscx\Client\Model\Model429TooManyRequests' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model429TooManyRequests' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model429TooManyRequests', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Smscx\Client\Model\Model500ServerError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model500ServerError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model500ServerError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Smscx\Client\Model\SendViberCampaignResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model400InvalidParam',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$errorType = $e->getResponseObject()->getError()->getType();
					if ( $errorType == 'insufficient_credit' ) {
						$className = 'InsufficientBalanceException';
                    }
					else {
						$className = 'InvalidRequestException';
					}
					$exceptionClass = "\\Smscx\\Client\\Exception\\".$className;                    
					$e =  new $exceptionClass(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 401:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model401Unauthorized',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\InvalidCredentialsException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 403:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model403NoCoverage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$errorType = $e->getResponseObject()->getError()->getType();
                    $errorCode = (int) $e->getResponseObject()->getError()->getCode();
					if ( $errorType == 'insufficient_scope') {
						$className = 'InsufficientScopeException';
					}
					elseif ( $errorType == 'no_coverage' ) {
						$className = 'NoCoverageException';
					}					
					elseif ( $errorType == 'access_denied' && ( $errorCode === 1132 || $errorCode === 1133 ) ) {
						$className = 'TemplateNotApprovedException';
					}
					elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
						$className = 'ChannelNotActiveException';
					} 					
					else {
						$className = 'ApiException';
					}
					$exceptionClass = "\\Smscx\\Client\\Exception\\".$className;                    
					$e =  new $exceptionClass(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 405:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model405MethodNotAllowed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 429:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model429TooManyRequests',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 500:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model500ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ServerErrorException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation sendViberCampaignAsync
     *
     * Send Viber campaign
     *
     * @param  \Smscx\Client\Model\SendViberCampaignRequest $send_viber_campaign_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendViberCampaignAsync($send_viber_campaign_request)
    {
        return $this->sendViberCampaignAsyncWithHttpInfo($send_viber_campaign_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendViberCampaignAsyncWithHttpInfo
     *
     * Send Viber campaign
     *
     * @param  \Smscx\Client\Model\SendViberCampaignRequest $send_viber_campaign_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendViberCampaignAsyncWithHttpInfo($send_viber_campaign_request)
    {
        $returnType = '\Smscx\Client\Model\SendViberCampaignResponse';
        $request = $this->sendViberCampaignRequest($send_viber_campaign_request);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    switch ($statusCode) {
                        case 400:             
                            $errorObject = json_decode( (string) $response->getBody() );
                            $errorType = $errorObject->error->type;
                            if ( $errorType == 'insufficient_credit' ) {
                                $className = 'InsufficientBalanceException';
                            }                            
                            else {
                                $className = 'InvalidRequestException';
                            }
                            $exceptionClass = "\\Smscx\\Client\\Exception\\".$className;
                            $e =  new $exceptionClass(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;                        
                        case 401:             
                            $e =  new \Smscx\Client\Exception\InvalidCredentialsException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 403:             
                            $errorObject = json_decode( (string) $response->getBody() );
                            $errorType = $errorObject->error->type;
                            $errorCode = (int) $errorObject->error->code;
							if ( $errorType == 'insufficient_scope') {
								$className = 'InsufficientScopeException';
							}
							elseif ( $errorType == 'no_coverage' ) {
								$className = 'NoCoverageException';
							}					
							elseif ( $errorType == 'access_denied' && ( $errorCode === 1132 || $errorCode === 1133 ) ) {
								$className = 'TemplateNotApprovedException';
							}
							elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
								$className = 'ChannelNotActiveException';
							} 					
							else {
								$className = 'ApiException';
							}
                            $exceptionClass = "\\Smscx\\Client\\Exception\\".$className;
                            $e =  new $exceptionClass(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 404:             
                            $e =  new \Smscx\Client\Exception\ResourceNotFoundException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 405:             
                            $e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 429:             
                            $e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 500:             
                            $e =  new \Smscx\Client\Exception\ServerErrorException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        default:
                            $e =  new \Smscx\Client\Exception\ApiException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        
                    }
                    throw $e;
                }
            );
    }

    /**
     * Create request for operation 'sendViberCampaign'
     *
     * @param  \Smscx\Client\Model\SendViberCampaignRequest $send_viber_campaign_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function sendViberCampaignRequest($send_viber_campaign_request)
    {

        // verify the required parameter 'send_viber_campaign_request' is set
        if ($send_viber_campaign_request === null || (is_array($send_viber_campaign_request) && count($send_viber_campaign_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $send_viber_campaign_request when calling sendViberCampaign'
            );
        }

        $resourcePath = '/viber/campaign';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($send_viber_campaign_request)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($send_viber_campaign_request));
            } else {
                $httpBody = $send_viber_campaign_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix();
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }
        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation sendViberMessage
     *
     * Send Viber message
     *
     * @param  \Smscx\Client\Model\SendViberMessageRequest $send_viber_message_request  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\SendViberMessageResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403NoCoverage|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function sendViberMessage($send_viber_message_request)
    {
        list($response) = $this->sendViberMessageWithHttpInfo($send_viber_message_request);
        return $response;
    }

    /**
     * Operation sendViberMessageWithHttpInfo
     *
     * Send Viber message
     *
     * @param  \Smscx\Client\Model\SendViberMessageRequest $send_viber_message_request  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\SendViberMessageResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403NoCoverage|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendViberMessageWithHttpInfo($send_viber_message_request)
    {
        $request = $this->sendViberMessageRequest($send_viber_message_request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Smscx\Client\Model\SendViberMessageResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\SendViberMessageResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\SendViberMessageResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Smscx\Client\Model\Model400InvalidParam' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model400InvalidParam' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model400InvalidParam', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Smscx\Client\Model\Model401Unauthorized' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model401Unauthorized' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model401Unauthorized', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\Smscx\Client\Model\Model403NoCoverage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model403NoCoverage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model403NoCoverage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 405:
                    if ('\Smscx\Client\Model\Model405MethodNotAllowed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model405MethodNotAllowed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model405MethodNotAllowed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 429:
                    if ('\Smscx\Client\Model\Model429TooManyRequests' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model429TooManyRequests' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model429TooManyRequests', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\Smscx\Client\Model\Model500ServerError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\Model500ServerError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\Model500ServerError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Smscx\Client\Model\SendViberMessageResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model400InvalidParam',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$errorType = $e->getResponseObject()->getError()->getType();
					$errorCode = (int) $e->getResponseObject()->getError()->getCode();
					if ( $errorType == 'invalid_param' && ($errorCode === 1207 || $errorCode === 1210) ) {
						$className = 'InvalidPhoneNumberException';
					}
                    elseif ( $errorType == 'insufficient_credit' ) {
						$className = 'InsufficientBalanceException';
                    }
					else {
						$className = 'InvalidRequestException';
					}
					$exceptionClass = "\\Smscx\\Client\\Exception\\".$className;                    
					$e =  new $exceptionClass(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 401:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model401Unauthorized',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\InvalidCredentialsException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 403:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model403NoCoverage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$errorType = $e->getResponseObject()->getError()->getType();
                    $errorCode = (int) $e->getResponseObject()->getError()->getCode();
					if ( $errorType == 'insufficient_scope') {
						$className = 'InsufficientScopeException';
					}
					elseif ( $errorType == 'no_coverage' ) {
						$className = 'NoCoverageException';
					}					
					elseif ( $errorType == 'access_denied' && ( $errorCode === 1132 || $errorCode === 1133 ) ) {
						$className = 'TemplateNotApprovedException';
					}
					elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
						$className = 'ChannelNotActiveException';
					} 					
					else {
						$className = 'ApiException';
					}
					$exceptionClass = "\\Smscx\\Client\\Exception\\".$className;                    
					$e =  new $exceptionClass(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 405:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model405MethodNotAllowed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 429:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model429TooManyRequests',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
                case 500:             
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Smscx\Client\Model\Model500ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
					$e =  new \Smscx\Client\Exception\ServerErrorException(
						$e->getMessage(),
						$e->getCode(),
						$e->getResponseHeaders(),
						$e->getResponseBody()
					);
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation sendViberMessageAsync
     *
     * Send Viber message
     *
     * @param  \Smscx\Client\Model\SendViberMessageRequest $send_viber_message_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendViberMessageAsync($send_viber_message_request)
    {
        return $this->sendViberMessageAsyncWithHttpInfo($send_viber_message_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendViberMessageAsyncWithHttpInfo
     *
     * Send Viber message
     *
     * @param  \Smscx\Client\Model\SendViberMessageRequest $send_viber_message_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendViberMessageAsyncWithHttpInfo($send_viber_message_request)
    {
        $returnType = '\Smscx\Client\Model\SendViberMessageResponse';
        $request = $this->sendViberMessageRequest($send_viber_message_request);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();

                    switch ($statusCode) {
                        case 400:             
                            $errorObject = json_decode( (string) $response->getBody() );
                            $errorType = $errorObject->error->type;
                            $errorCode = (int) $errorObject->error->code;
                            if ( $errorType == 'invalid_param' && ($errorCode === 1207 || $errorCode === 1210) ) {
                                $className = 'InvalidPhoneNumberException';
                            }
                            elseif ( $errorType == 'insufficient_credit' ) {
                                $className = 'InsufficientBalanceException';
                            }                            
                            else {
                                $className = 'InvalidRequestException';
                            }
                            $exceptionClass = "\\Smscx\\Client\\Exception\\".$className;
                            $e =  new $exceptionClass(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;                        
                        case 401:             
                            $e =  new \Smscx\Client\Exception\InvalidCredentialsException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 403:             
                            $errorObject = json_decode( (string) $response->getBody() );
                            $errorType = $errorObject->error->type;
                            $errorCode = (int) $errorObject->error->code;
							if ( $errorType == 'insufficient_scope') {
								$className = 'InsufficientScopeException';
							}
							elseif ( $errorType == 'no_coverage' ) {
								$className = 'NoCoverageException';
							}					
							elseif ( $errorType == 'access_denied' && ( $errorCode === 1132 || $errorCode === 1133 ) ) {
								$className = 'TemplateNotApprovedException';
							}
							elseif ( $errorType == 'access_denied' && $errorCode === 1606 ) {
								$className = 'ChannelNotActiveException';
							} 					
							else {
								$className = 'ApiException';
							}
                            $exceptionClass = "\\Smscx\\Client\\Exception\\".$className;
                            $e =  new $exceptionClass(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 404:             
                            $e =  new \Smscx\Client\Exception\ResourceNotFoundException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 405:             
                            $e =  new \Smscx\Client\Exception\ApiMethodNotAllowedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 429:             
                            $e =  new \Smscx\Client\Exception\RateLimitExcedeedException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        case 500:             
                            $e =  new \Smscx\Client\Exception\ServerErrorException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        default:
                            $e =  new \Smscx\Client\Exception\ApiException(
                                sprintf(
                                    '[%d] Error connecting to the API (%s)',
                                    $statusCode,
                                    $exception->getRequest()->getUri()
                                ),						
                                $statusCode,
                                $response->getHeaders(),
                                (string) $response->getBody()
                            );
                            break;
                        
                    }
                    throw $e;
                }
            );
    }

    /**
     * Create request for operation 'sendViberMessage'
     *
     * @param  \Smscx\Client\Model\SendViberMessageRequest $send_viber_message_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function sendViberMessageRequest($send_viber_message_request)
    {

        // verify the required parameter 'send_viber_message_request' is set
        if ($send_viber_message_request === null || (is_array($send_viber_message_request) && count($send_viber_message_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $send_viber_message_request when calling sendViberMessage'
            );
        }

        $resourcePath = '/viber';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($send_viber_message_request)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($send_viber_message_request));
            } else {
                $httpBody = $send_viber_message_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix();
        if ($apiKey !== null) {
            $headers['X-API-KEY'] = $apiKey;
        }
        // this endpoint requires Bearer authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
