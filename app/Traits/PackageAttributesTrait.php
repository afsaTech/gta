<?php

namespace App\Traits;

trait PackageAttributesTrait
{
    // Setter and getter methods for 'size' attribute
    public function setSizeAttribute($value)
    {
        $this->attributes["size"] = intval($value);
    }

    public function getSizeAttribute($value)
    {
        return intval($value);
    }

    // Setter and getter methods for 'days' attribute
    public function setDaysAttribute($value)
    {
        $this->attributes["days"] = intval($value);
    }

    public function getDaysAttribute($value)
    {
        return intval($value);
    }

    // Setter and getter methods for 'nights' attribute
    public function setNightsAttribute($value)
    {
        $this->attributes["nights"] = intval($value);
    }

    public function getNightsAttribute($value)
    {
        return intval($value);
    }

    // Setter and getter methods for 'regular_price' attribute
    public function setRegularPriceAttribute($value)
    {
        $this->attributes["regular_price"] = floatval($value);
    }

    public function getRegularPriceAttribute($value)
    {
        return floatval($value);
    }

    // Setter and getter methods for 'sales_price' attribute
    public function setSalesPriceAttribute($value)
    {
        $this->attributes["sales_price"] =
            $value !== null ? floatval($value) : null;
    }

    public function getSalesPriceAttribute($value)
    {
        return $value !== null ? floatval($value) : null;
    }

    // Setter and getter methods for 'discount' attribute
    public function setDiscountAttribute($value)
    {
        $this->attributes["discount"] = $value !== null ? intval($value) : null;
    }

    public function getDiscountAttribute($value)
    {
        return $value !== null ? intval($value) : null;
    }

    // Setter and getter methods for 'date' attribute (formatting to MySQL format)
    public function setDateAttribute($value)
    {
        $this->attributes["date"] = date("Y-m-d", strtotime($value));
    }

    public function getDateAttribute($value)
    {
        return $value !== null ? date("Y-m-d", strtotime($value)) : null;
    }

    // Setter and getter methods for 'is_popular' attribute
    public function setIsPopularAttribute($value)
    {
        $this->attributes["is_popular"] = strtolower($value);
    }

    public function getIsPopularAttribute($value)
    {
        return  strtolower($value);
    }

    // Setter and getter methods for 'status' attribute
    public function setStatusAttribute($value)
    {
        $this->attributes["status"] = strtolower($value);
    }

    public function getStatusAttribute($value)
    {
        return strtolower($value);
    }
}
