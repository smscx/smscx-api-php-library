<?php
/**
 * ApplicationsApi
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
 * ApplicationsApi Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */
class ApplicationsApi
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
     * Operation getApplicationSettings
     *
     * Get application settings
     *
     * @param  string $application_id Identifier of the application id (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\ApplicationSettingsResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function getApplicationSettings($application_id)
    {
        list($response) = $this->getApplicationSettingsWithHttpInfo($application_id);
        return $response;
    }

    /**
     * Operation getApplicationSettingsWithHttpInfo
     *
     * Get application settings
     *
     * @param  string $application_id Identifier of the application id (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\ApplicationSettingsResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getApplicationSettingsWithHttpInfo($application_id)
    {
        $request = $this->getApplicationSettingsRequest($application_id);

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
                    if ('\Smscx\Client\Model\ApplicationSettingsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\ApplicationSettingsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\ApplicationSettingsResponse', []),
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

            $returnType = '\Smscx\Client\Model\ApplicationSettingsResponse';
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
					$e =  new \Smscx\Client\Exception\InsufficientScopeException(
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
     * Operation getApplicationSettingsAsync
     *
     * Get application settings
     *
     * @param  string $application_id Identifier of the application id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApplicationSettingsAsync($application_id)
    {
        return $this->getApplicationSettingsAsyncWithHttpInfo($application_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getApplicationSettingsAsyncWithHttpInfo
     *
     * Get application settings
     *
     * @param  string $application_id Identifier of the application id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApplicationSettingsAsyncWithHttpInfo($application_id)
    {
        $returnType = '\Smscx\Client\Model\ApplicationSettingsResponse';
        $request = $this->getApplicationSettingsRequest($application_id);

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
                            $e =  new \Smscx\Client\Exception\InsufficientScopeException(
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
     * Create request for operation 'getApplicationSettings'
     *
     * @param  string $application_id Identifier of the application id (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getApplicationSettingsRequest($application_id)
    {

        // verify the required parameter 'application_id' is set
        if ($application_id === null || (is_array($application_id) && count($application_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $application_id when calling getApplicationSettings'
            );
        }

        $resourcePath = '/applications/{applicationId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($application_id !== null) {
            $resourcePath = str_replace(
                '{' . 'applicationId' . '}',
                ObjectSerializer::toPathValue($application_id),
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
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getApplicationsList
     *
     * Get applications list
     *
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\ApplicationsListResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function getApplicationsList()
    {
        list($response) = $this->getApplicationsListWithHttpInfo();
        return $response;
    }

    /**
     * Operation getApplicationsListWithHttpInfo
     *
     * Get applications list
     *
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\ApplicationsListResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getApplicationsListWithHttpInfo()
    {
        $request = $this->getApplicationsListRequest();

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
                    if ('\Smscx\Client\Model\ApplicationsListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\ApplicationsListResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\ApplicationsListResponse', []),
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

            $returnType = '\Smscx\Client\Model\ApplicationsListResponse';
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
					$e =  new \Smscx\Client\Exception\InsufficientScopeException(
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
     * Operation getApplicationsListAsync
     *
     * Get applications list
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApplicationsListAsync()
    {
        return $this->getApplicationsListAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getApplicationsListAsyncWithHttpInfo
     *
     * Get applications list
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getApplicationsListAsyncWithHttpInfo()
    {
        $returnType = '\Smscx\Client\Model\ApplicationsListResponse';
        $request = $this->getApplicationsListRequest();

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
                            $e =  new \Smscx\Client\Exception\InsufficientScopeException(
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
     * Create request for operation 'getApplicationsList'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getApplicationsListRequest()
    {

        $resourcePath = '/applications';
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
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getScopes
     *
     * Get scopes
     *
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string[]|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function getScopes()
    {
        list($response) = $this->getScopesWithHttpInfo();
        return $response;
    }

    /**
     * Operation getScopesWithHttpInfo
     *
     * Get scopes
     *
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string[]|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getScopesWithHttpInfo()
    {
        $request = $this->getScopesRequest();

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
                    if ('string[]' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string[]' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'string[]', []),
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

            $returnType = 'string[]';
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
					$e =  new \Smscx\Client\Exception\InsufficientScopeException(
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
     * Operation getScopesAsync
     *
     * Get scopes
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getScopesAsync()
    {
        return $this->getScopesAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getScopesAsyncWithHttpInfo
     *
     * Get scopes
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getScopesAsyncWithHttpInfo()
    {
        $returnType = 'string[]';
        $request = $this->getScopesRequest();

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
                            $e =  new \Smscx\Client\Exception\InsufficientScopeException(
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
     * Create request for operation 'getScopes'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getScopesRequest()
    {

        $resourcePath = '/applications/scopes';
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
            'GET',
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
