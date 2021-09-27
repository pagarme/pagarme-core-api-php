<?php
/*
 * PagarmeCoreApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace PagarmeCoreApiLib\Models;

use JsonSerializable;

/**
 *Subscription's Split
 */
class CreateSubscriptionSplitRequest implements JsonSerializable
{
    /**
     * Defines if the split is enabled
     * @required
     * @var bool $enable public property
     */
    public $enable;

    /**
     * Split
     * @required
     * @var \PagarmeCoreApiLib\Models\CreateSplitRequest $rules public property
     */
    public $rules;

    /**
     * Constructor to set initial or default values of member properties
     * @param bool               $enable Initialization value for $this->enable
     * @param CreateSplitRequest $rules  Initialization value for $this->rules
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->enable = func_get_arg(0);
            $this->rules  = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['enable'] = $this->enable;
        $json['rules']  = $this->rules;

        return $json;
    }
}
