<?php
namespace App\Models;

class Tag{
    
    const TABLENAME = "TAG";
    const TAGID     = "TAG.tag_id";
    const NAME      = "TAG.name";
    
    private $tagId,$name;

    

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