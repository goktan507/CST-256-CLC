# Swagger\Client\IndividualApi

All URIs are relative to *https://cst-256-clc.herokuapp.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getJobsBySearch**](IndividualApi.md#getJobsBySearch) | **GET** /jobsrest/search | Returns all jobs matching with &#39;search&#39; in the JSON formattized Rest API
[**getUserProfile**](IndividualApi.md#getUserProfile) | **GET** /usersrest/id | Returns user with the id in the JSON formattized Rest API


# **getJobsBySearch**
> \Swagger\Client\Model\JobsModel[] getJobsBySearch()

Returns all jobs matching with 'search' in the JSON formattized Rest API

Using this URL, it will return all the matching Job postings created to the application in json format

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\IndividualApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getJobsBySearch();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IndividualApi->getJobsBySearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\JobsModel[]**](../Model/JobsModel.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUserProfile**
> \Swagger\Client\Model\UserModel[] getUserProfile()

Returns user with the id in the JSON formattized Rest API

Using the URL, it will return the User with the id registered to the application in json format

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\IndividualApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getUserProfile();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IndividualApi->getUserProfile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\UserModel[]**](../Model/UserModel.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

