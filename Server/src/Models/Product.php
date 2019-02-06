<?php
namespace App\Models;

class Product{

    const TABLENAME      = "PRODUCT";
    const PRODID         = "PRODUCT.prod_id";
    const CATEGORYID     = "PRODUCT.category_id";
    const NAME           = "PRODUCT.name";
    const DESCRIPTION    = "PRODUCT.description";
    const SIZE           = "PRODUCT.size";
    const NETWEIGHT      = "PRODUCT.netweight";
    const MRPPRICE       = "PRODUCT.mrpprice";
    const BRANDID        = "PRODUCT.brand_id";
    const STOCK          = "PRODUCT.stock";
    const RETAILPRICE    = "PRODUCT.retail_price";
    const IMAGES         = "PRODUCT.images";
    const ISACTIVE       = "PRODUCT.is_active";
    const VIEWS          = "PRODUCT.views";
    const RATING         = "PRODUCT.rating";
    const RATINGCOUNT    = "PRODUCT.rating_count";

    
    private $prodId,$categoryId,$name, $description, $size, $netWeight, $mrpPrice;
    private $brandId,$stock,$retailPrice,$images,$isActive,$views,$rating,$ratingCount;

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
     * Get the value of categoryId
     */ 
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set the value of categoryId
     *
     * @return  self
     */ 
    public function setCategoryId($categoryId)
    {
        $this->categoryId = (int)$categoryId;

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

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get the value of netWeight
     */ 
    public function getNetWeight()
    {
        return $this->netWeight;
    }

    /**
     * Set the value of netWeight
     *
     * @return  self
     */ 
    public function setNetWeight($netWeight)
    {
        $this->netWeight = $netWeight;

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
     * Get the value of images
     */ 
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set the value of images
     *
     * @return  self
     */ 
    public function setImages($images)
    {
        $this->images = $images;

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