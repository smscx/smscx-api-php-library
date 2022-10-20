<?php
/**
 * TemplatesApi
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
 * TemplatesApi Class Doc Comment
 *
 * @category Class
 * @package  Smscx
 * @author   SMS Connexion
 * @link     https://sms.cx
 */
class TemplatesApi
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
     * Operation createTemplate
     *
     * Create template
     *
     * @param  \Smscx\Client\Model\TemplatesNewRequest $templates_new_request  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\TemplatesNewResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function createTemplate($templates_new_request)
    {
        list($response) = $this->createTemplateWithHttpInfo($templates_new_request);
        return $response;
    }

    /**
     * Operation createTemplateWithHttpInfo
     *
     * Create template
     *
     * @param  \Smscx\Client\Model\TemplatesNewRequest $templates_new_request  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\TemplatesNewResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function createTemplateWithHttpInfo($templates_new_request)
    {
        $request = $this->createTemplateRequest($templates_new_request);

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
                case 201:
                    if ('\Smscx\Client\Model\TemplatesNewResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\TemplatesNewResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\TemplatesNewResponse', []),
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

            $returnType = '\Smscx\Client\Model\TemplatesNewResponse';
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
					if ( $errorType == 'duplicate_value') {
						$className = 'DuplicateValueException';
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
     * Operation createTemplateAsync
     *
     * Create template
     *
     * @param  \Smscx\Client\Model\TemplatesNewRequest $templates_new_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTemplateAsync($templates_new_request)
    {
        return $this->createTemplateAsyncWithHttpInfo($templates_new_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createTemplateAsyncWithHttpInfo
     *
     * Create template
     *
     * @param  \Smscx\Client\Model\TemplatesNewRequest $templates_new_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTemplateAsyncWithHttpInfo($templates_new_request)
    {
        $returnType = '\Smscx\Client\Model\TemplatesNewResponse';
        $request = $this->createTemplateRequest($templates_new_request);

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
                            if ( $errorType == 'duplicate_value') {
                                $className = 'DuplicateValueException';
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
     * Create request for operation 'createTemplate'
     *
     * @param  \Smscx\Client\Model\TemplatesNewRequest $templates_new_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createTemplateRequest($templates_new_request)
    {

        // verify the required parameter 'templates_new_request' is set
        if ($templates_new_request === null || (is_array($templates_new_request) && count($templates_new_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $templates_new_request when calling createTemplate'
            );
        }

        $resourcePath = '/templates';
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
        if (isset($templates_new_request)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($templates_new_request));
            } else {
                $httpBody = $templates_new_request;
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
     * Operation deleteTemplate
     *
     * Delete template
     *
     * @param  int $template_id Identifier of the template (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\TemplatesDeleteResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function deleteTemplate($template_id)
    {
        list($response) = $this->deleteTemplateWithHttpInfo($template_id);
        return $response;
    }

    /**
     * Operation deleteTemplateWithHttpInfo
     *
     * Delete template
     *
     * @param  int $template_id Identifier of the template (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\TemplatesDeleteResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteTemplateWithHttpInfo($template_id)
    {
        $request = $this->deleteTemplateRequest($template_id);

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
                    if ('\Smscx\Client\Model\TemplatesDeleteResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\TemplatesDeleteResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\TemplatesDeleteResponse', []),
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

            $returnType = '\Smscx\Client\Model\TemplatesDeleteResponse';
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
     * Operation deleteTemplateAsync
     *
     * Delete template
     *
     * @param  int $template_id Identifier of the template (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteTemplateAsync($template_id)
    {
        return $this->deleteTemplateAsyncWithHttpInfo($template_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteTemplateAsyncWithHttpInfo
     *
     * Delete template
     *
     * @param  int $template_id Identifier of the template (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteTemplateAsyncWithHttpInfo($template_id)
    {
        $returnType = '\Smscx\Client\Model\TemplatesDeleteResponse';
        $request = $this->deleteTemplateRequest($template_id);

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
     * Create request for operation 'deleteTemplate'
     *
     * @param  int $template_id Identifier of the template (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteTemplateRequest($template_id)
    {

        // verify the required parameter 'template_id' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling deleteTemplate'
            );
        }

        $resourcePath = '/templates/{templateId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace(
                '{' . 'templateId' . '}',
                ObjectSerializer::toPathValue($template_id),
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
     * Operation getTemplate
     *
     * Get template
     *
     * @param  int $template_id Identifier of the template (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\TemplateDetailsResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function getTemplate($template_id)
    {
        list($response) = $this->getTemplateWithHttpInfo($template_id);
        return $response;
    }

    /**
     * Operation getTemplateWithHttpInfo
     *
     * Get template
     *
     * @param  int $template_id Identifier of the template (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\TemplateDetailsResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTemplateWithHttpInfo($template_id)
    {
        $request = $this->getTemplateRequest($template_id);

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
                    if ('\Smscx\Client\Model\TemplateDetailsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\TemplateDetailsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\TemplateDetailsResponse', []),
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

            $returnType = '\Smscx\Client\Model\TemplateDetailsResponse';
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
     * Operation getTemplateAsync
     *
     * Get template
     *
     * @param  int $template_id Identifier of the template (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplateAsync($template_id)
    {
        return $this->getTemplateAsyncWithHttpInfo($template_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTemplateAsyncWithHttpInfo
     *
     * Get template
     *
     * @param  int $template_id Identifier of the template (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplateAsyncWithHttpInfo($template_id)
    {
        $returnType = '\Smscx\Client\Model\TemplateDetailsResponse';
        $request = $this->getTemplateRequest($template_id);

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
     * Create request for operation 'getTemplate'
     *
     * @param  int $template_id Identifier of the template (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getTemplateRequest($template_id)
    {

        // verify the required parameter 'template_id' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling getTemplate'
            );
        }

        $resourcePath = '/templates/{templateId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace(
                '{' . 'templateId' . '}',
                ObjectSerializer::toPathValue($template_id),
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
     * Operation getTemplatesList
     *
     * Get templates list
     *
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\TemplatesListResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function getTemplatesList()
    {
        list($response) = $this->getTemplatesListWithHttpInfo();
        return $response;
    }

    /**
     * Operation getTemplatesListWithHttpInfo
     *
     * Get templates list
     *
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\TemplatesListResponse|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function getTemplatesListWithHttpInfo()
    {
        $request = $this->getTemplatesListRequest();

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
                    if ('\Smscx\Client\Model\TemplatesListResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\TemplatesListResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\TemplatesListResponse', []),
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

            $returnType = '\Smscx\Client\Model\TemplatesListResponse';
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
     * Operation getTemplatesListAsync
     *
     * Get templates list
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplatesListAsync()
    {
        return $this->getTemplatesListAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getTemplatesListAsyncWithHttpInfo
     *
     * Get templates list
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTemplatesListAsyncWithHttpInfo()
    {
        $returnType = '\Smscx\Client\Model\TemplatesListResponse';
        $request = $this->getTemplatesListRequest();

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
     * Create request for operation 'getTemplatesList'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getTemplatesListRequest()
    {

        $resourcePath = '/templates';
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
     * Operation updateTemplate
     *
     * Update template
     *
     * @param  int $template_id Identifier of the template (required)
     * @param  \Smscx\Client\Model\TemplatesUpdateRequest $templates_update_request  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Smscx\Client\Model\TemplatesUpdateResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError
     */
    public function updateTemplate($template_id, $templates_update_request)
    {
        list($response) = $this->updateTemplateWithHttpInfo($template_id, $templates_update_request);
        return $response;
    }

    /**
     * Operation updateTemplateWithHttpInfo
     *
     * Update template
     *
     * @param  int $template_id Identifier of the template (required)
     * @param  \Smscx\Client\Model\TemplatesUpdateRequest $templates_update_request  (required)
     *
     * @throws \Smscx\Client\Exception\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Smscx\Client\Model\TemplatesUpdateResponse|\Smscx\Client\Model\Model400InvalidParam|\Smscx\Client\Model\Model401Unauthorized|\Smscx\Client\Model\Model403InsufficientScope|\Smscx\Client\Model\Model404NotFound|\Smscx\Client\Model\Model405MethodNotAllowed|\Smscx\Client\Model\Model429TooManyRequests|\Smscx\Client\Model\Model500ServerError, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateTemplateWithHttpInfo($template_id, $templates_update_request)
    {
        $request = $this->updateTemplateRequest($template_id, $templates_update_request);

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
                    if ('\Smscx\Client\Model\TemplatesUpdateResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Smscx\Client\Model\TemplatesUpdateResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Smscx\Client\Model\TemplatesUpdateResponse', []),
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

            $returnType = '\Smscx\Client\Model\TemplatesUpdateResponse';
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
					if ( $errorType == 'duplicate_value') {
						$className = 'DuplicateValueException';
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
     * Operation updateTemplateAsync
     *
     * Update template
     *
     * @param  int $template_id Identifier of the template (required)
     * @param  \Smscx\Client\Model\TemplatesUpdateRequest $templates_update_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateTemplateAsync($template_id, $templates_update_request)
    {
        return $this->updateTemplateAsyncWithHttpInfo($template_id, $templates_update_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateTemplateAsyncWithHttpInfo
     *
     * Update template
     *
     * @param  int $template_id Identifier of the template (required)
     * @param  \Smscx\Client\Model\TemplatesUpdateRequest $templates_update_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateTemplateAsyncWithHttpInfo($template_id, $templates_update_request)
    {
        $returnType = '\Smscx\Client\Model\TemplatesUpdateResponse';
        $request = $this->updateTemplateRequest($template_id, $templates_update_request);

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
                            if ( $errorType == 'duplicate_value') {
                                $className = 'DuplicateValueException';
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
     * Create request for operation 'updateTemplate'
     *
     * @param  int $template_id Identifier of the template (required)
     * @param  \Smscx\Client\Model\TemplatesUpdateRequest $templates_update_request  (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateTemplateRequest($template_id, $templates_update_request)
    {

        // verify the required parameter 'template_id' is set
        if ($template_id === null || (is_array($template_id) && count($template_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_id when calling updateTemplate'
            );
        }

        // verify the required parameter 'templates_update_request' is set
        if ($templates_update_request === null || (is_array($templates_update_request) && count($templates_update_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $templates_update_request when calling updateTemplate'
            );
        }

        $resourcePath = '/templates/{templateId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($template_id !== null) {
            $resourcePath = str_replace(
                '{' . 'templateId' . '}',
                ObjectSerializer::toPathValue($template_id),
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
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($templates_update_request)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($templates_update_request));
            } else {
                $httpBody = $templates_update_request;
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
            'PATCH',
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
