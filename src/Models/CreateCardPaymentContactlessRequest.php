<?php
/*
 * PagarmeCoreApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace PagarmeCoreApiLib\Models;

use JsonSerializable;

/**
 *The card payment contactless request
 */
class CreateCardPaymentContactlessRequest implements JsonSerializable
{
    /**
     * The authentication type
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The ApplePay encrypted request
     * @maps apple_pay
     * @var \PagarmeCoreApiLib\Models\CreateApplePayRequest|null $applePay public property
     */
    public $applePay;

    /**
     * The GooglePay encrypted request
     * @maps google_pay
     * @var \PagarmeCoreApiLib\Models\CreateGooglePayRequest|null $googlePay public property
     */
    public $googlePay;

    /**
     * The Emv encrypted request
     * @var \PagarmeCoreApiLib\Models\CreateEmvDecryptRequest|null $emv public property
     */
    public $emv;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                  $type      Initialization value for $this->type
     * @param CreateApplePayRequest   $applePay  Initialization value for $this->applePay
     * @param CreateGooglePayRequest  $googlePay Initialization value for $this->googlePay
     * @param CreateEmvDecryptRequest $emv       Initialization value for $this->emv
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->type      = func_get_arg(0);
            $this->applePay  = func_get_arg(1);
            $this->googlePay = func_get_arg(2);
            $this->emv       = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): mixed
    {
        $json = array();
        $json['type']       = $this->type;
        $json['apple_pay']  = $this->applePay;
        $json['google_pay'] = $this->googlePay;
        $json['emv']        = $this->emv;

        return $json;
    }
}
