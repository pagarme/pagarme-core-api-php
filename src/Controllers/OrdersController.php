<?php
/*
 * PagarmeCoreApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace PagarmeCoreApiLib\Controllers;

use PagarmeCoreApiLib\APIException;
use PagarmeCoreApiLib\APIHelper;
use PagarmeCoreApiLib\Configuration;
use PagarmeCoreApiLib\Models;
use PagarmeCoreApiLib\Exceptions;
use PagarmeCoreApiLib\Utils\DateTimeHelper;
use PagarmeCoreApiLib\Http\HttpRequest;
use PagarmeCoreApiLib\Http\HttpResponse;
use PagarmeCoreApiLib\Http\HttpMethod;
use PagarmeCoreApiLib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class OrdersController extends BaseController
{
    /**
     * @var OrdersController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return OrdersController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Gets all orders
     *
     * @param integer  $page          (optional) Page number
     * @param integer  $size          (optional) Page size
     * @param string   $code          (optional) Filter for order's code
     * @param string   $status        (optional) Filter for order's status
     * @param DateTime $createdSince  (optional) Filter for order's creation date start range
     * @param DateTime $createdUntil  (optional) Filter for order's creation date end range
     * @param string   $customerId    (optional) Filter for order's customer id
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getOrders(
        $page = null,
        $size = null,
        $code = null,
        $status = null,
        $createdSince = null,
        $createdUntil = null,
        $customerId = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/orders';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'page'          => $page,
            'size'          => $size,
            'code'          => $code,
            'status'        => $status,
            'created_since' => DateTimeHelper::toRfc3339DateTime($createdSince),
            'created_until' => DateTimeHelper::toRfc3339DateTime($createdUntil),
            'customer_id'   => $customerId,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'ServiceRefererName' => Configuration::$serviceRefererName
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }

        if ($response->code == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }

        if ($response->code == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }

        if ($response->code == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'PagarmeCoreApiLib\\Models\\ListOrderResponse');
    }

    /**
     * Creates a new Order
     *
     * @param Models\CreateOrderRequest $body            Request for creating an order
     * @param string                    $idempotencyKey  (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createOrder(
        $body,
        $idempotencyKey = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/orders';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'ServiceRefererName' => Configuration::$serviceRefererName,
            'Content-Type'    => 'application/json',
            'idempotency-key' => $idempotencyKey
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }

        if ($response->code == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }

        if ($response->code == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }

        if ($response->code == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'PagarmeCoreApiLib\\Models\\GetOrderResponse');
    }

    /**
     * DeleteAllOrderItems
     *
     * @param string $orderId         Order Id
     * @param string $idempotencyKey  (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteAllOrderItems(
        $orderId,
        $idempotencyKey = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/orders/{orderId}/items';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'orderId'         => $orderId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'ServiceRefererName' => Configuration::$serviceRefererName,
            'idempotency-key' => $idempotencyKey
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::delete($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }

        if ($response->code == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }

        if ($response->code == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }

        if ($response->code == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'PagarmeCoreApiLib\\Models\\GetOrderResponse');
    }

    /**
     * CreateOrderItem
     *
     * @param string                        $orderId         Order Id
     * @param Models\CreateOrderItemRequest $body            Order Item Model
     * @param string                        $idempotencyKey  (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createOrderItem(
        $orderId,
        $body,
        $idempotencyKey = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/orders/{orderId}/items';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'orderId'         => $orderId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'ServiceRefererName' => Configuration::$serviceRefererName,
            'Content-Type'    => 'application/json',
            'idempotency-key' => $idempotencyKey
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }

        if ($response->code == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }

        if ($response->code == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }

        if ($response->code == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'PagarmeCoreApiLib\\Models\\GetOrderItemResponse');
    }

    /**
     * UpdateOrderItem
     *
     * @param string                        $orderId         Order Id
     * @param string                        $itemId          Item Id
     * @param Models\UpdateOrderItemRequest $body            Item Model
     * @param string                        $idempotencyKey  (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function updateOrderItem(
        $orderId,
        $itemId,
        $body,
        $idempotencyKey = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/orders/{orderId}/items/{itemId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'orderId'         => $orderId,
            'itemId'          => $itemId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'ServiceRefererName' => Configuration::$serviceRefererName,
            'Content-Type'    => 'application/json',
            'idempotency-key' => $idempotencyKey
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::put($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }

        if ($response->code == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }

        if ($response->code == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }

        if ($response->code == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'PagarmeCoreApiLib\\Models\\GetOrderItemResponse');
    }

    /**
     * DeleteOrderItem
     *
     * @param string $orderId         Order Id
     * @param string $itemId          Item Id
     * @param string $idempotencyKey  (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteOrderItem(
        $orderId,
        $itemId,
        $idempotencyKey = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/orders/{orderId}/items/{itemId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'orderId'         => $orderId,
            'itemId'          => $itemId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'ServiceRefererName' => Configuration::$serviceRefererName,
            'idempotency-key' => $idempotencyKey
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::delete($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }

        if ($response->code == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }

        if ($response->code == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }

        if ($response->code == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'PagarmeCoreApiLib\\Models\\GetOrderItemResponse');
    }

    /**
     * GetOrderItem
     *
     * @param string $orderId Order Id
     * @param string $itemId  Item Id
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getOrderItem(
        $orderId,
        $itemId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/orders/{orderId}/items/{itemId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'orderId' => $orderId,
            'itemId'  => $itemId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'ServiceRefererName' => Configuration::$serviceRefererName
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }

        if ($response->code == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }

        if ($response->code == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }

        if ($response->code == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'PagarmeCoreApiLib\\Models\\GetOrderItemResponse');
    }

    /**
     * CloseOrder
     *
     * @param string                          $id              Order Id
     * @param Models\UpdateOrderStatusRequest $body            Update Order Model
     * @param string                          $idempotencyKey  (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function closeOrder(
        $id,
        $body,
        $idempotencyKey = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/orders/{id}/closed';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'id'              => $id,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'ServiceRefererName' => Configuration::$serviceRefererName,
            'Content-Type'    => 'application/json',
            'idempotency-key' => $idempotencyKey
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::PATCH, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::patch($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }

        if ($response->code == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }

        if ($response->code == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }

        if ($response->code == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'PagarmeCoreApiLib\\Models\\GetOrderResponse');
    }

    /**
     * Updates the metadata from an order
     *
     * @param string                       $orderId         The order id
     * @param Models\UpdateMetadataRequest $body            Request for updating the order metadata
     * @param string                       $idempotencyKey  (optional) TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function updateOrderMetadata(
        $orderId,
        $body,
        $idempotencyKey = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/Orders/{order_id}/metadata';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'order_id'        => $orderId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'ServiceRefererName' => Configuration::$serviceRefererName,
            'Content-Type'    => 'application/json',
            'idempotency-key' => $idempotencyKey
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::PATCH, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::patch($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }

        if ($response->code == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }

        if ($response->code == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }

        if ($response->code == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'PagarmeCoreApiLib\\Models\\GetOrderResponse');
    }

    /**
     * Gets an order
     *
     * @param string $orderId  Order id
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getOrder(
        $orderId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/orders/{order_id}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'order_id' => $orderId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'ServiceRefererName' => Configuration::$serviceRefererName
        );

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }

        if ($response->code == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }

        if ($response->code == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }

        if ($response->code == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'PagarmeCoreApiLib\\Models\\GetOrderResponse');
    }
}
