<?php
namespace App\Models;

class ProductDescription{
    
    const TABLENAME    = "PRODUCT_DESCRIPTION";
    const PRODID       = "PRODUCT_DESCRIPTION.prod_id";
    const TITLE        = "PRODUCT_DESCRIPTION.title";
    const DESCRIPTION  = "PRODUCT_DESCRIPTION.description";
    
    private $prodId,$title,$description;

    

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
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

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
}