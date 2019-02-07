<?php
namespace App\Models;

class Product{

    const TABLENAME      = "PRODUCT";
    const PRODID         = "PRODUCT.prod_id";
    const CATEGORYID     = "PRODUCT.category_id";
    const NAME           = "PRODUCT.name";
    const DESCRIPTION    = "PRODUCT.description";
    const BRANDID        = "PRODUCT.brand_id";
    /*
    const STOCK          = "PRODUCT.stock";
    const RETAILPRICE    = "PRODUCT.retail_price";
    const IMAGES         = "PRODUCT.images";
    const ISACTIVE       = "PRODUCT.is_active";
    const VIEWS          = "PRODUCT.views";
    const RATING         = "PRODUCT.rating";
    const RATINGCOUNT    = "PRODUCT.rating_count";
    */
    
    private $prodId,$categoryId,$name, $description,$brandId;
    private  $size, $netWeight, $mrpPrice,$stock,$retailPrice,$images,$isActive,$views,$rating,$ratingCount;

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
    
}

?>