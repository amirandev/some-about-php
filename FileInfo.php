<?php
class FileInfo
{
    private $path;
    
    public function __construct($path)
    {
        $this->path = $path;
    }
    
    public function getPath()
    {
        return $this->path;
    }
    
    public function getSize()
    {
        return filesize($this->path);
    }
    
    public function getLastModified()
    {
        return filemtime($this->path);
    }
    
    public function getExtension()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }
}
