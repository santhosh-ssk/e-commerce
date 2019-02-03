<?php
namespace App\Models;

class Product{

    const TABLENAME      = "PRODUCT";
    const PRODID         = "PRODUCT.prod_id";
    const SHOPID         = "PRODUCT.shop_id";
    const NAME           = "PRODUCT.name";
    const DESCRIPTION    = "PRODUCT.description";
    const COLOR          = "PRODUCT.color";
    const SIZE           = "PRODUCT.size";
    const NETWEIGHT      = "PRODUCT.netweight";
    const MRPPRICE       = "PRODUCT.mrpprice";
    const BRANDID        = "PRODUCT.brand_id";
    const STOCK          = "PRODUCT.stock";
    const RETAILPRICE    = "PRODUCT.retail_price";
    const IMAGES         = "PRODUCT.images";
    
    private $prodId,$shopId,$name, $description, $color, $size, $netWeight, $mrpPrice;
    private $brand_id,$stock,$retailPrice,$images;

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
     * Get the value of shopId
     */ 
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * Set the value of shopId
     *
     * @return  self
     */ 
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;

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
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

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
        $this->mrpPrice = $mrpPrice;

        return $this;
    }

    

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

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
        $this->stock = $stock;

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
        $this->retailPrice = $retailPrice;

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
}

?>