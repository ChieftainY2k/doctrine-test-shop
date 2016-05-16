<?php
namespace Dto;

/**
 * DTO for barcode
 */
class BarcodeDto
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}