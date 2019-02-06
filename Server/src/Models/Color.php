<?php
namespace App\Models;

class Color{
    
    const TABLENAME = "COLOR";
    const COLORID   = "COLOR.color_id";
    const COLOR     = "COLOR.color";
    
    private $colorId,$color;



    /**
     * Get the value of colorId
     */ 
    public function getColorId()
    {
        return $this->colorId;
    }

    /**
     * Set the value of colorId
     *
     * @return  self
     */ 
    public function setColorId($colorId)
    {
        $this->colorId = (int)$colorId;

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
}

?>