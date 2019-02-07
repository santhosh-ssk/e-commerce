<?php
namespace App\Models;

class Variant{
    
    const TABLENAME   = "VARIANT";
    const VARIANTID   = "VARIANT.variant_id";
    const NAME        = "VARIANT.variant_name";
    
    private $variantId,$name;

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}

?>