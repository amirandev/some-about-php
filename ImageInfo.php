<?php
class ImageInfo extends FileInfo
{
    public function getWidth()
    {
        if ($this->getExtension() === 'jpg' || $this->getExtension() === 'jpeg') {
            $imageSize = getimagesize($this->getPath());
            return $imageSize[0]; // Width is at index 0
        }
        
        return null;
    }
    
    public function getHeight()
    {
        if ($this->getExtension() === 'jpg' || $this->getExtension() === 'jpeg') {
            $imageSize = getimagesize($this->getPath());
            return $imageSize[1]; // Height is at index 1
        }
        
        return null;
    }
    
    public function getDimensions()
    {
        $width = $this->getWidth();
        $height = $this->getHeight();
        
        if ($width && $height) {
            return $width . 'x' . $height;
        }
        
        return null;
    }
}
