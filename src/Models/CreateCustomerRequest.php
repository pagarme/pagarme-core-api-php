<?php
/*
 * PagarmeCoreApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace PagarmeCoreApiLib\Models;

use JsonSerializable;

/**
 *Request for creating a new customer
 */
class CreateCustomerRequest implements JsonSerializable
{
    /**
     * Name
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * Email
     * @required
     * @var string $email public property
     */
    public $email;

    /**
     * Document number. Only numbers, no special characters.
     * @required
     * @var string $document public property
     */
    public $document;

    /**
     * Person type. Can be either 'individual' or 'company'
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * The customer's address
     * @required
     * @var \PagarmeCoreApiLib\Models\CreateAddressRequest $address public property
     */
    public $address;

    /**
     * Metadata
     * @required
     * @var array $metadata public property
     */
    public $metadata;

    /**
     * @todo Write general description for this property
     * @required
     * @var \PagarmeCoreApiLib\Models\CreatePhonesRequest $phones public property
     */
    public $phones;

    /**
     * Customer code
     * @required
     * @var string $code public property
     */
    public $code;

    /**
     * Customer Gender
     * @var string|null $gender public property
     */
    public $gender;

    /**
     * @todo Write general description for this property
     * @maps document_type
     * @var string|null $documentType public property
     */
    public $documentType;

    /**
     * Constructor to set initial or default values of member properties
     * @param string               $name         Initialization value for $this->name
     * @param string               $email        Initialization value for $this->email
     * @param string               $document     Initialization value for $this->document
     * @param string               $type         Initialization value for $this->type
     * @param CreateAddressRequest $address      Initialization value for $this->address
     * @param array                $metadata     Initialization value for $this->metadata
     * @param CreatePhonesRequest  $phones       Initialization value for $this->phones
     * @param string               $code         Initialization value for $this->code
     * @param string               $gender       Initialization value for $this->gender
     * @param string               $documentType Initialization value for $this->documentType
     */
    public function __construct()
    {
        if (10 == func_num_args()) {
            $this->name         = func_get_arg(0);
            $this->email        = func_get_arg(1);
            $this->document     = func_get_arg(2);
            $this->type         = func_get_arg(3);
            $this->address      = func_get_arg(4);
            $this->metadata     = func_get_arg(5);
            $this->phones       = func_get_arg(6);
            $this->code         = func_get_arg(7);
            $this->gender       = func_get_arg(8);
            $this->documentType = func_get_arg(9);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): mixed
    {
        $json = array();
        $json['name']          = $this->name;
        $json['email']         = $this->email;
        $json['document']      = $this->document;
        $json['type']          = $this->type;
        $json['address']       = $this->address;
        $json['metadata']      = $this->metadata;
        $json['phones']        = $this->phones;
        $json['code']          = $this->code;
        $json['gender']        = $this->gender;
        $json['document_type'] = $this->documentType;

        return $json;
    }
}
