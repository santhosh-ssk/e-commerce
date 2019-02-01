<?php
namespace App\Models;

class Brand{
    
    const TABLENAME = "BRAND";
    const BRANDID = "brand_id";
    const BRANDNAME = "name";
    
    private $brandId,$brandName;


    /**
     * Get the value of brandId
     */ 
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * Set the value of brandId
     *
     * @return  self
     */ 
    public function setBrandId($brandId)
    {
        $this->brandId = (int)$brandId;

        return $this;
    }

    /**
     * Get the value of brandName
     */ 
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * Set the value of brandName
     *
     * @return  self
     */ 
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;

        return $this;
    }
}

?>