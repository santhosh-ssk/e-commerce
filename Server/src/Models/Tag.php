<?php
namespace App\Models;

class Tag{
    
    const TABLENAME = "TAG";
    const TAGID     = "TAG.tag_id";
    const TAGNAME   = "TAG.name";
    
    private $tagId,$tagName;



    /**
     * Get the value of tagId
     */ 
    public function getTagId()
    {
        return $this->tagId;
    }

    /**
     * Set the value of tagId
     *
     * @return  self
     */ 
    public function setTagId($tagId)
    {
        $this->tagId = (int)$tagId;

        return $this;
    }

    /**
     * Get the value of tagName
     */ 
    public function getTagName()
    {
        return $this->tagName;
    }

    /**
     * Set the value of tagName
     *
     * @return  self
     */ 
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;

        return $this;
    }
}

?>