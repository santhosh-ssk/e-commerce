<?php
namespace App\Models;

class ProductSku{

    const TABLENAME      = "PRODUCT_SKU";
    const SKUID          = "PRODUCT_SKU.sku_id";
    const PRODID         = "PRODUCT_SKU.prod_id";
    const MRPPRICE       = "PRODUCT_SKU.mrp_price";
    const RETAILPRICE    = "PRODUCT_SKU.retail_price";
    const STOCK          = "PRODUCT_SKU.stock";
    const ISACTIVE       = "PRODUCT_SKU.is_active";
    const VIEWS          = "PRODUCT_SKU.views";
    const RATING         = "PRODUCT_SKU.rating";
    const RATINGCOUNT    = "PRODUCT_SKU.rating_count";

    
    private $prodId, $mrpPrice, $stock,$retailPrice,$isActive,$views,$rating,$ratingCount;

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
     * Get the value of mrpPrice
     */ 
    public function getMrpPrice()
    {
        return $this->mrpPrice;
    }

    /**
     * Set the value of mrpPrice
     *
     * @return  self
     */ 
    public function setMrpPrice($mrpPrice)
    {
        $this->mrpPrice = (float)$mrpPrice;

        return $this;
    }

    /**
     * Get the value of retailPrice
     */ 
    public function getRetailPrice()
    {
        return $this->retailPrice;
    }

    /**
     * Set the value of retailPrice
     *
     * @return  self
     */ 
    public function setRetailPrice($retailPrice)
    {
        $this->retailPrice = (float)$retailPrice;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = (int)$stock;

        return $this;
    }


    /**
     * Get the value of isActive
     */ 
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set the value of isActive
     *
     * @return  self
     */ 
    public function setIsActive($isActive)
    {
        $this->isActive = (int)$isActive;

        return $this;
    }

    /**
     * Get the value of views
     */ 
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set the value of views
     *
     * @return  self
     */ 
    public function setViews($views)
    {
        $this->views = (int)$views;

        return $this;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = (float)$rating;

        return $this;
    }

    /**
     * Get the value of ratingCount
     */ 
    public function getRatingCount()
    {
        return $this->ratingCount;
    }

    /**
     * Set the value of ratingCount
     *
     * @return  self
     */ 
    public function setRatingCount($ratingCount)
    {
        $this->ratingCount = (int)$ratingCount;

        return $this;
    }
}

?>