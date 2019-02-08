<?php
namespace App\Models;

class ProductVariant{
    
    const TABLENAME   = "PRODUCT_VARIANTS";
    const SKUID       = "PRODUCT_VARIANTS.sku_id";
    const VALUEID     = "PRODUCT_VARIANTS.value_id";
    
    private $skuId,$valueId;


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
     * Get the value of valueId
     */ 
    public function getValueId()
    {
        return $this->valueId;
    }

    /**
     * Set the value of valueId
     *
     * @return  self
     */ 
    public function setValueId($valueId)
    {
        $this->valueId = (int)$valueId;

        return $this;
    }
}

?>