<?php
/*
 * PagarmeCoreApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace PagarmeCoreApiLib\Models;

use JsonSerializable;
use PagarmeCoreApiLib\Utils\DateTimeHelper;

/**
 *Generic response object for getting a transaction.
 *
 * @discriminator transaction_type
 * @discriminatorType transaction
 */
class GetTransactionResponse implements JsonSerializable
{
    /**
     * Gateway transaction id
     * @required
     * @maps gateway_id
     * @var string $gatewayId public property
     */
    public $gatewayId;

    /**
     * Amount in cents
     * @required
     * @var integer $amount public property
     */
    public $amount;

    /**
     * Transaction status
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * Indicates if the transaction ocurred successfuly
     * @required
     * @var bool $success public property
     */
    public $success;

    /**
     * Creation date
     * @required
     * @maps created_at
     * @factory \PagarmeCoreApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $createdAt public property
     */
    public $createdAt;

    /**
     * Last update date
     * @required
     * @maps updated_at
     * @factory \PagarmeCoreApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $updatedAt public property
     */
    public $updatedAt;

    /**
     * Number of attempts tried
     * @required
     * @maps attempt_count
     * @var integer $attemptCount public property
     */
    public $attemptCount;

    /**
     * Max attempts
     * @required
     * @maps max_attempts
     * @var integer $maxAttempts public property
     */
    public $maxAttempts;

    /**
     * Splits
     * @required
     * @var \PagarmeCoreApiLib\Models\GetSplitResponse[] $splits public property
     */
    public $splits;

    /**
     * Date and time of the next attempt
     * @maps next_attempt
     * @factory \PagarmeCoreApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $nextAttempt public property
     */
    public $nextAttempt;

    /**
     * @todo Write general description for this property
     * @maps transaction_type
     * @var string|null $transactionType public property
     */
    public $transactionType;

    /**
     * Código da transação
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * The Gateway Response
     * @required
     * @maps gateway_response
     * @var \PagarmeCoreApiLib\Models\GetGatewayResponseResponse $gatewayResponse public property
     */
    public $gatewayResponse;

    /**
     * @todo Write general description for this property
     * @required
     * @maps antifraud_response
     * @var \PagarmeCoreApiLib\Models\GetAntifraudResponse $antifraudResponse public property
     */
    public $antifraudResponse;

    /**
     * @todo Write general description for this property
     * @var array|null $metadata public property
     */
    public $metadata;

    /**
     * @todo Write general description for this property
     * @required
     * @var \PagarmeCoreApiLib\Models\GetSplitResponse[] $split public property
     */
    public $split;

    /**
     * @todo Write general description for this property
     * @var \PagarmeCoreApiLib\Models\GetInterestResponse|null $interest public property
     */
    public $interest;

    /**
     * @todo Write general description for this property
     * @var \PagarmeCoreApiLib\Models\GetFineResponse|null $fine public property
     */
    public $fine;

    /**
     * @todo Write general description for this property
     * @maps max_days_to_pay_past_due
     * @var integer|null $maxDaysToPayPastDue public property
     */
    public $maxDaysToPayPastDue;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                      $gatewayId           Initialization value for $this->gatewayId
     * @param integer                     $amount              Initialization value for $this->amount
     * @param string                      $status              Initialization value for $this->status
     * @param bool                        $success             Initialization value for $this->success
     * @param \DateTime                   $createdAt           Initialization value for $this->createdAt
     * @param \DateTime                   $updatedAt           Initialization value for $this->updatedAt
     * @param integer                     $attemptCount        Initialization value for $this->attemptCount
     * @param integer                     $maxAttempts         Initialization value for $this->maxAttempts
     * @param array                       $splits              Initialization value for $this->splits
     * @param \DateTime                   $nextAttempt         Initialization value for $this->nextAttempt
     * @param string                      $transactionType     Initialization value for $this->transactionType
     * @param string                      $id                  Initialization value for $this->id
     * @param GetGatewayResponseResponse  $gatewayResponse     Initialization value for $this->gatewayResponse
     * @param GetAntifraudResponse        $antifraudResponse   Initialization value for $this->antifraudResponse
     * @param array                       $metadata            Initialization value for $this->metadata
     * @param array                       $split               Initialization value for $this->split
     * @param GetInterestResponse         $interest            Initialization value for $this->interest
     * @param GetFineResponse             $fine                Initialization value for $this->fine
     * @param integer                     $maxDaysToPayPastDue Initialization value for $this->maxDaysToPayPastDue
     */
    public function __construct()
    {
        if (19 == func_num_args()) {
            $this->gatewayId           = func_get_arg(0);
            $this->amount              = func_get_arg(1);
            $this->status              = func_get_arg(2);
            $this->success             = func_get_arg(3);
            $this->createdAt           = func_get_arg(4);
            $this->updatedAt           = func_get_arg(5);
            $this->attemptCount        = func_get_arg(6);
            $this->maxAttempts         = func_get_arg(7);
            $this->splits              = func_get_arg(8);
            $this->nextAttempt         = func_get_arg(9);
            $this->transactionType     = func_get_arg(10);
            $this->id                  = func_get_arg(11);
            $this->gatewayResponse     = func_get_arg(12);
            $this->antifraudResponse   = func_get_arg(13);
            $this->metadata            = func_get_arg(14);
            $this->split               = func_get_arg(15);
            $this->interest            = func_get_arg(16);
            $this->fine                = func_get_arg(17);
            $this->maxDaysToPayPastDue = func_get_arg(18);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['gateway_id']               = $this->gatewayId;
        $json['amount']                   = $this->amount;
        $json['status']                   = $this->status;
        $json['success']                  = $this->success;
        $json['created_at']               = DateTimeHelper::toRfc3339DateTime($this->createdAt);
        $json['updated_at']               = DateTimeHelper::toRfc3339DateTime($this->updatedAt);
        $json['attempt_count']            = $this->attemptCount;
        $json['max_attempts']             = $this->maxAttempts;
        $json['splits']                   = $this->splits;
        $json['next_attempt']             = isset($this->nextAttempt) ?
            DateTimeHelper::toRfc3339DateTime($this->nextAttempt) : null;
        $json['transaction_type']         = $this->transactionType;
        $json['id']                       = $this->id;
        $json['gateway_response']         = $this->gatewayResponse;
        $json['antifraud_response']       = $this->antifraudResponse;
        $json['metadata']                 = $this->metadata;
        $json['split']                    = $this->split;
        $json['interest']                 = $this->interest;
        $json['fine']                     = $this->fine;
        $json['max_days_to_pay_past_due'] = $this->maxDaysToPayPastDue;

        return $json;
    }
}
