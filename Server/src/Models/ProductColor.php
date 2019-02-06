<?php
namespace App\Models;

class ProductColor{
    
    const TABLENAME     = "PRODUCT_COLOR";
    const COLORID       = "PRODUCT_COLOR.color_id";
    const PRODUCTID     = "PRODUCT_COLOR.prod_id";

    private $prodId,$colorId;

    /**
     * Get the value of prodId
     */ 
    public function getProdId()
    {
        return $this->prodId;
    }

    /**
     * Set the value of prodId
     *
     * @return  self
     */ 
    public function setProdId($prodId)
    {
        $this->prodId = (int)$prodId;

        return $this;
    }

    /**
     * Get the value of colorId
     */ 
    public function getColorId()
    {
        return $this->colorId;
    }

    /**
     * Set the value of colorId
     *
     * @return  self
     */ 
    public function setColorId($colorId)
    {
        $this->colorId = (int)$colorId;

        return $this;
    }
}