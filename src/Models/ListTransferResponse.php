<?php
/*
 * PagarmeCoreApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace PagarmeCoreApiLib\Models;

use JsonSerializable;

/**
 *List of paginated transfer objects
 */
class ListTransferResponse implements JsonSerializable
{
    /**
     * Transfers
     * @required
     * @var \PagarmeCoreApiLib\Models\GetTransferResponse[] $data public property
     */
    public $data;

    /**
     * Paging
     * @required
     * @var \PagarmeCoreApiLib\Models\PagingResponse $paging public property
     */
    public $paging;

    /**
     * Constructor to set initial or default values of member properties
     * @param array          $data   Initialization value for $this->data
     * @param PagingResponse $paging Initialization value for $this->paging
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->data   = func_get_arg(0);
            $this->paging = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): mixed
    {
        $json = array();
        $json['data']   = $this->data;
        $json['paging'] = $this->paging;

        return $json;
    }
}
