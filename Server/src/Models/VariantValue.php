<?php
namespace App\Models;

class VariantValue{
    
    const TABLENAME   = "VARIANT_VALUE";
    const VALUEID     = "VARIANT_VALUE.value_id";
    const VARIANTID   = "VARIANT_VALUE.variant_id";
    const VALUE       = "VARIANT_VALUE.variant_value";
    
    private $variantId,$value;

    /**
     * Get the value of variantId
     */ 
    public function getVariantId()
    {
        return $this->variantId;
    }

    /**
     * Set the value of variantId
     *
     * @return  self
     */ 
    public function setVariantId($variantId)
    {
        $this->variantId = (int)$variantId;
        return $this;
    }



    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}

?>