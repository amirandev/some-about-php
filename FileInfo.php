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
        $sizeInBytes = filesize($this->path);
        $sizeInMB = $sizeInBytes / (1024 * 1024); // Convert bytes to megabytes
        
        return round($sizeInMB, 2);
    }
    
    public function getLastModified()
    {
        $timestamp = filemtime($this->path);
        return date('Y-m-d H:i:s', $timestamp);
    }
    
    public function getExtension()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }
}
