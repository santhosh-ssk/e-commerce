<?php
namespace App\Models;

class ProductImage{
    
    const TABLENAME   = "PRODUCT_IMAGES";
    const SKUID       = "PRODUCT_IMAGES.sku_id";
    const URL         = "PRODUCT_IMAGES.url";

    private $skuId,$url;

    /**
     * Get the value of skuId
     */ 
    public function getSkuId()
    {
        return $this->skuId;
    }

    /**
     * Set the value of skuId
     *
     * @return  self
     */ 
    public function setSkuId($skuId)
    {
        $this->skuId = (int)$skuId;

        return $this;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
}