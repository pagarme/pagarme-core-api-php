<?php
/*
 * PagarmeCoreApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace PagarmeCoreApiLib;

use PagarmeCoreApiLib\Controllers;

/**
 * PagarmeCoreApiLib client class
 */
class PagarmeCoreApiClient
{
    /**
     * Constructor with authentication and configuration parameters
     */
    public function __construct(      
        $basicAuthUserName = null,
        $basicAuthPassword = null,
        $serviceRefererName = null
    ) {
        Configuration::$basicAuthUserName = $basicAuthUserName ? $basicAuthUserName : Configuration::$basicAuthUserName;
        Configuration::$basicAuthPassword = $basicAuthPassword ? $basicAuthPassword : Configuration::$basicAuthPassword;
        Configuration::$serviceRefererName = $serviceRefererName ? $serviceRefererName : Configuration::$serviceRefererName;
    }
    /**
     * Singleton access to Subscriptions controller
     * @return Controllers\SubscriptionsController The *Singleton* instance
     */
    public function getSubscriptions()
    {
        return Controllers\SubscriptionsController::getInstance();
    }
    /**
     * Singleton access to Orders controller
     * @return Controllers\OrdersController The *Singleton* instance
     */
    public function getOrders()
    {
        return Controllers\OrdersController::getInstance();
    }
    /**
     * Singleton access to Plans controller
     * @return Controllers\PlansController The *Singleton* instance
     */
    public function getPlans()
    {
        return Controllers\PlansController::getInstance();
    }
    /**
     * Singleton access to Invoices controller
     * @return Controllers\InvoicesController The *Singleton* instance
     */
    public function getInvoices()
    {
        return Controllers\InvoicesController::getInstance();
    }
    /**
     * Singleton access to Customers controller
     * @return Controllers\CustomersController The *Singleton* instance
     */
    public function getCustomers()
    {
        return Controllers\CustomersController::getInstance();
    }
    /**
     * Singleton access to Charges controller
     * @return Controllers\ChargesController The *Singleton* instance
     */
    public function getCharges()
    {
        return Controllers\ChargesController::getInstance();
    }
    /**
     * Singleton access to Recipients controller
     * @return Controllers\RecipientsController The *Singleton* instance
     */
    public function getRecipients()
    {
        return Controllers\RecipientsController::getInstance();
    }
    /**
     * Singleton access to Tokens controller
     * @return Controllers\TokensController The *Singleton* instance
     */
    public function getTokens()
    {
        return Controllers\TokensController::getInstance();
    }
    /**
     * Singleton access to Transactions controller
     * @return Controllers\TransactionsController The *Singleton* instance
     */
    public function getTransactions()
    {
        return Controllers\TransactionsController::getInstance();
    }
    /**
     * Singleton access to Transfers controller
     * @return Controllers\TransfersController The *Singleton* instance
     */
    public function getTransfers()
    {
        return Controllers\TransfersController::getInstance();
    }
}
