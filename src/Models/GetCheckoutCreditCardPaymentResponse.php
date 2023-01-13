<?php
/*
 * PagarmeCoreApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace PagarmeCoreApiLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GetCheckoutCreditCardPaymentResponse implements JsonSerializable
{
    /**
     * Descrição na fatura
     * @required
     * @var string $statementDescriptor public property
     */
    public $statementDescriptor;

    /**
     * Parcelas
     * @required
     * @var \PagarmeCoreApiLib\Models\GetCheckoutCardInstallmentOptionsResponse[] $installments public property
     */
    public $installments;

    /**
     * Payment Authentication response
     * @required
     * @var \PagarmeCoreApiLib\Models\GetPaymentAuthenticationResponse $authentication public property
     */
    public $authentication;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                           $statementDescriptor Initialization value for $this-
     *                                                                >statementDescriptor
     * @param array                            $installments        Initialization value for $this->installments
     * @param GetPaymentAuthenticationResponse $authentication      Initialization value for $this->authentication
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->statementDescriptor = func_get_arg(0);
            $this->installments        = func_get_arg(1);
            $this->authentication      = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): mixed
    {
        $json = array();
        $json['statementDescriptor'] = $this->statementDescriptor;
        $json['installments']        = $this->installments;
        $json['authentication']      = $this->authentication;

        return $json;
    }
}
