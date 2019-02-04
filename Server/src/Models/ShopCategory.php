<?php
namespace App\Models;

class ShopCategory{
    
    const TABLENAME      = "SHOP_CATEGORY";
    const SHOPCATEGORYID = "SHOP_CATEGORY._id"; 
    const SHOPID         = "SHOP_CATEGORY.shop_id";
    const CATEGORYID     = "SHOP_CATEGORY.category_id";
    
    
    private $shopId,$categoryId,$shopCategoryId;

   
    /**
     * Get the value of shopCategoryId
     */ 
    public function getShopCategoryId()
    {
        return $this->shopCategoryId;
    }

    /**
     * Set the value of shopCategoryId
     *
     * @return  self
     */ 
    public function setShopCategoryId($shopCategoryId)
    {
        $this->shopCategoryId = (int)$shopCategoryId;

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
        $this->shopId = (int)$shopId;

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


}