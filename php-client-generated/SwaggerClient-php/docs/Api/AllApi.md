# Swagger\Client\AllApi

All URIs are relative to *https://cst-256-clc.herokuapp.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAllGroups**](AllApi.md#getAllGroups) | **GET** /groupsrest | Returns all groups in the JSON formattized Rest API
[**getAllJobs**](AllApi.md#getAllJobs) | **GET** /jobsrest | Returns all jobs in the JSON formattized Rest API
[**getAllUsers**](AllApi.md#getAllUsers) | **GET** /usersrest | Returns All users in the JSON formattized Rest API


# **getAllGroups**
> \Swagger\Client\Model\GroupModel[] getAllGroups()

Returns all groups in the JSON formattized Rest API

Using this URL, it will return all the Groups created in the application in json format

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AllApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getAllGroups();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AllApi->getAllGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\GroupModel[]**](../Model/GroupModel.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAllJobs**
> \Swagger\Client\Model\JobsModel[] getAllJobs()

Returns all jobs in the JSON formattized Rest API

Using this URL, it will return all the Job postings created to the application in json format

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AllApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getAllJobs();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AllApi->getAllJobs: ', $e->getMessage(), PHP_EOL;
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

# **getAllUsers**
> \Swagger\Client\Model\UserModel[] getAllUsers()

Returns All users in the JSON formattized Rest API

Using this URL, it will return all the Users registered to the application in json format

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AllApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->getAllUsers();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AllApi->getAllUsers: ', $e->getMessage(), PHP_EOL;
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

