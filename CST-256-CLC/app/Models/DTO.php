<?php
/*
 *  Project Name: CST-256-CLC - Version: 2.0 The End
 *    Group Name: IDK
 *   Module Name: Data Module
 *   Programmers: Safa Bayraktar & Jacob Cauthren
 *          Date: 4/17/2021
 *
 *      DTO service that serializes the data. Used in Rest API services to json serialize the data.
 */
namespace App\Models;

use JsonSerializable;

class DTO implements JsonSerializable
{
    private $errorCode, $errorMessage, $data;
    
    public function __construct($errorCode, $errorMessage, $data){
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;
        $this->data = $data;
    }
    
    public function jsonSerialize(){
        return get_object_vars($this);
    }
}