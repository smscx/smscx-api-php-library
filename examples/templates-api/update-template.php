<?php

require_once(__DIR__ . '/vendor/autoload.php');

// Use authentication via API Key
$config = Smscx\Configuration::getDefaultConfiguration()->setApiKey('YOUR_API_KEY');

// OR

// Use authentication via Access Token
// $config = Smscx\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$smscx = new Smscx\Client\Api\TemplatesApi(
    new GuzzleHttp\Client(),
    $config
);

$template_id = 39774;
$templates_update_request = [
    'name' => 'My new template name',
    'text' => 'My new template text.',
];

try {
    $result = $smscx->updateTemplate($template_id, $templates_update_request);
    print_r($result);
    // $result->getInfo()->getId();
} catch (Smscx\Client\Exception\ResourceNotFoundException $e) {
    //Template ID not found    
} catch (Smscx\Client\Exception\AccessDeniedException $e) {
    //Code for access denied - template is locked for editing    
} catch (Smscx\Client\Exception\DuplicateValueException $e) {
    //Code for duplicate value    
} catch (Smscx\Client\Exception\InvalidRequestException $e) {
    //Code for Invalid request    
} catch (Smscx\Client\Exception\ApiException $e) {
    echo 'Exception when calling TemplatesApi->updateTemplate: ', $e->getMessage(), PHP_EOL;
}