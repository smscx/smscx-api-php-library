<?php
/**
 * OptoutsApi
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
 * OptoutsApi Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */
class OptoutsApi
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
     * Operation addContactToOptoutsList
     *
     * Add contact to optouts list
     *
     * @param  \Smscx\Client\Model\AddContactsToGroupRequest $add_contacts_to_group_request  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\OptoutsNewResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function addContactToOptoutsList($add_contacts_to_group_request)
    {
        list($response) = $this->addContactToOptoutsListWithHttpInfo($add_contacts_to_group_request);
        return $response;
    }

    /**
     * Operation addContactToOptoutsListWithHttpInfo
     *
     * Add contact to optouts list
     *
     * @param  \Smscx\Client\Model\AddContactsToGroupRequest $add_contacts_to_group_request  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\OptoutsNewResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function addContactToOptoutsListWithHttpInfo($add_contacts_to_group_request)
    {
        $request = $this->addContactToOptoutsListRequest($add_contacts_to_group_request);

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
                    if ('\Smscx\Client\Model\OptoutsNewResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\OptoutsNewResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\OptoutsNewResponse', []),
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

            $returnType = '\Smscx\Client\Model\OptoutsNewResponse';
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
     * Operation addContactToOptoutsListAsync
     *
     * Add contact to optouts list
     *
     * @param  \Smscx\Client\Model\AddContactsToGroupRequest $add_contacts_to_group_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addContactToOptoutsListAsync($add_contacts_to_group_request)
    {
        return $this->addContactToOptoutsListAsyncWithHttpInfo($add_contacts_to_group_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation addContactToOptoutsListAsyncWithHttpInfo
     *
     * Add contact to optouts list
     *
     * @param  \Smscx\Client\Model\AddContactsToGroupRequest $add_contacts_to_group_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addContactToOptoutsListAsyncWithHttpInfo($add_contacts_to_group_request)
    {
        $returnType = '\Smscx\Client\Model\OptoutsNewResponse';
        $request = $this->addContactToOptoutsListRequest($add_contacts_to_group_request);

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
     * Create request for operation 'addContactToOptoutsList'
     *
     * @param  \Smscx\Client\Model\AddContactsToGroupRequest $add_contacts_to_group_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function addContactToOptoutsListRequest($add_contacts_to_group_request)
    {

        // verify the required parameter 'add_contacts_to_group_request' is set
        if ($add_contacts_to_group_request === null || (is_array($add_contacts_to_group_request) && count($add_contacts_to_group_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $add_contacts_to_group_request when calling addContactToOptoutsList'
            );
        }

        $resourcePath = '/optouts';
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
        if (isset($add_contacts_to_group_request)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($add_contacts_to_group_request));
            } else {
                $httpBody = $add_contacts_to_group_request;
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
     * Operation deleteContactFromOptoutsList
     *
     * Delete contact from optouts list
     *
     * @param  int $optout_id Identifier of the phone number in the optout list (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\OptoutsDeleteResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function deleteContactFromOptoutsList($optout_id)
    {
        list($response) = $this->deleteContactFromOptoutsListWithHttpInfo($optout_id);
        return $response;
    }

    /**
     * Operation deleteContactFromOptoutsListWithHttpInfo
     *
     * Delete contact from optouts list
     *
     * @param  int $optout_id Identifier of the phone number in the optout list (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\OptoutsDeleteResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteContactFromOptoutsListWithHttpInfo($optout_id)
    {
        $request = $this->deleteContactFromOptoutsListRequest($optout_id);

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
                    if ('\Smscx\Client\Model\OptoutsDeleteResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\OptoutsDeleteResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\OptoutsDeleteResponse', []),
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

            $returnType = '\Smscx\Client\Model\OptoutsDeleteResponse';
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
					$errorType = $e->getResponseObject()->getError()->getType();
					if ( $errorType == 'insufficient_scope') {
						$className = 'InsufficientScopeException';
					}
					elseif ( $errorType == 'access_denied' ) {
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
     * Operation deleteContactFromOptoutsListAsync
     *
     * Delete contact from optouts list
     *
     * @param  int $optout_id Identifier of the phone number in the optout list (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteContactFromOptoutsListAsync($optout_id)
    {
        return $this->deleteContactFromOptoutsListAsyncWithHttpInfo($optout_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteContactFromOptoutsListAsyncWithHttpInfo
     *
     * Delete contact from optouts list
     *
     * @param  int $optout_id Identifier of the phone number in the optout list (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteContactFromOptoutsListAsyncWithHttpInfo($optout_id)
    {
        $returnType = '\Smscx\Client\Model\OptoutsDeleteResponse';
        $request = $this->deleteContactFromOptoutsListRequest($optout_id);

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
                            if ( $errorType == 'insufficient_scope') {
                                $className = 'InsufficientScopeException';
                            }
                            elseif ( $errorType == 'access_denied' ) {
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
     * Create request for operation 'deleteContactFromOptoutsList'
     *
     * @param  int $optout_id Identifier of the phone number in the optout list (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteContactFromOptoutsListRequest($optout_id)
    {

        // verify the required parameter 'optout_id' is set
        if ($optout_id === null || (is_array($optout_id) && count($optout_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $optout_id when calling deleteContactFromOptoutsList'
            );
        }

        $resourcePath = '/optouts/{optoutId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($optout_id !== null) {
            $resourcePath = str_replace(
                '{' . 'optoutId' . '}',
                ObjectSerializer::toPathValue($optout_id),
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
     * Operation exportOptoutsToCSV
     *
     * Export optouts to CSV
     *
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function exportOptoutsToCSV()
    {
        list($response) = $this->exportOptoutsToCSVWithHttpInfo();
        return $response;
    }

    /**
     * Operation exportOptoutsToCSVWithHttpInfo
     *
     * Export optouts to CSV
     *
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function exportOptoutsToCSVWithHttpInfo()
    {
        $request = $this->exportOptoutsToCSVRequest();

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
                    if ('string' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'string', []),
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

            $returnType = 'string';
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
     * Operation exportOptoutsToCSVAsync
     *
     * Export optouts to CSV
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function exportOptoutsToCSVAsync()
    {
        return $this->exportOptoutsToCSVAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation exportOptoutsToCSVAsyncWithHttpInfo
     *
     * Export optouts to CSV
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function exportOptoutsToCSVAsyncWithHttpInfo()
    {
        $returnType = 'string';
        $request = $this->exportOptoutsToCSVRequest();

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
     * Create request for operation 'exportOptoutsToCSV'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function exportOptoutsToCSVRequest()
    {

        $resourcePath = '/optouts/csv';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/csv', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/csv', 'application/json'],
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
     * Operation exportOptoutsToXLSX
     *
     * Export optouts to XLSX
     *
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function exportOptoutsToXLSX()
    {
        list($response) = $this->exportOptoutsToXLSXWithHttpInfo();
        return $response;
    }

    /**
     * Operation exportOptoutsToXLSXWithHttpInfo
     *
     * Export optouts to XLSX
     *
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function exportOptoutsToXLSXWithHttpInfo()
    {
        $request = $this->exportOptoutsToXLSXRequest();

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
                    if ('\SplFileObject' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\SplFileObject' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\SplFileObject', []),
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

            $returnType = '\SplFileObject';
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
     * Operation exportOptoutsToXLSXAsync
     *
     * Export optouts to XLSX
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function exportOptoutsToXLSXAsync()
    {
        return $this->exportOptoutsToXLSXAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation exportOptoutsToXLSXAsyncWithHttpInfo
     *
     * Export optouts to XLSX
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function exportOptoutsToXLSXAsyncWithHttpInfo()
    {
        $returnType = '\SplFileObject';
        $request = $this->exportOptoutsToXLSXRequest();

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
     * Create request for operation 'exportOptoutsToXLSX'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function exportOptoutsToXLSXRequest()
    {

        $resourcePath = '/optouts/xlsx';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/json'],
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
     * Operation getOptoutsList
     *
     * Get optouts list
     *
     * @param  int $limit A limit on the number of objects to be returned (optional, default to 500)
     * @param  string $next The next token used to retrieve additional data (optional)
     * @param  string $previous The previous token used to retrieve additional data (optional)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\OptoutsListResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function getOptoutsList($limit = 500, $next = null, $previous = null)
    {
        list($response) = $this->getOptoutsListWithHttpInfo($limit, $next, $previous);
        return $response;
    }

    /**
     * Operation getOptoutsListWithHttpInfo
     *
     * Get optouts list
     *
     * @param  int $limit A limit on the number of objects to be returned (optional, default to 500)
     * @param  string $next The next token used to retrieve additional data (optional)
     * @param  string $previous The previous token used to retrieve additional data (optional)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\OptoutsListResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getOptoutsListWithHttpInfo($limit = 500, $next = null, $previous = null)
    {
        $request = $this->getOptoutsListRequest($limit, $next, $previous);

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
                    if ('\Smscx\Client\Model\OptoutsListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\OptoutsListResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\OptoutsListResponse', []),
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

            $returnType = '\Smscx\Client\Model\OptoutsListResponse';
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
     * Operation getOptoutsListAsync
     *
     * Get optouts list
     *
     * @param  int $limit A limit on the number of objects to be returned (optional, default to 500)
     * @param  string $next The next token used to retrieve additional data (optional)
     * @param  string $previous The previous token used to retrieve additional data (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOptoutsListAsync($limit = 500, $next = null, $previous = null)
    {
        return $this->getOptoutsListAsyncWithHttpInfo($limit, $next, $previous)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getOptoutsListAsyncWithHttpInfo
     *
     * Get optouts list
     *
     * @param  int $limit A limit on the number of objects to be returned (optional, default to 500)
     * @param  string $next The next token used to retrieve additional data (optional)
     * @param  string $previous The previous token used to retrieve additional data (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getOptoutsListAsyncWithHttpInfo($limit = 500, $next = null, $previous = null)
    {
        $returnType = '\Smscx\Client\Model\OptoutsListResponse';
        $request = $this->getOptoutsListRequest($limit, $next, $previous);

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
     * Create request for operation 'getOptoutsList'
     *
     * @param  int $limit A limit on the number of objects to be returned (optional, default to 500)
     * @param  string $next The next token used to retrieve additional data (optional)
     * @param  string $previous The previous token used to retrieve additional data (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getOptoutsListRequest($limit = 500, $next = null, $previous = null)
    {




        $resourcePath = '/optouts';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // type
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $next,
            'next', // param base name
            'string', // type
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $previous,
            'previous', // param base name
            'string', // type
            'form', // style
            true, // explode
            false // required
        ) ?? []);




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
