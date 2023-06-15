<?php

class Storage
{
    private $rootDirectory;
    
    public function __construct()
    {
        $this->rootDirectory = __DIR__ . '/storage';
    }
    
    public static function disk($diskName)
    {
        return new self();
    }
    
    public function upload($file)
    {
        $destination = $this->rootDirectory . '/' . basename($file['name']);
        
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return true;
        }
        
        return false;
    }
    
    public function copy($source, $destination)
    {
        $sourcePath = $this->rootDirectory . '/' . $source;
        $destinationPath = $this->rootDirectory . '/' . $destination;
        
        if (copy($sourcePath, $destinationPath)) {
            return true;
        }
        
        return false;
    }
    
    public function rename($oldName, $newName)
    {
        $oldPath = $this->rootDirectory . '/' . $oldName;
        $newPath = $this->rootDirectory . '/' . $newName;
        
        if (rename($oldPath, $newPath)) {
            return true;
        }
        
        return false;
    }
    
    public function delete($file)
    {
        $filePath = $this->rootDirectory . '/' . $file;
        
        if (file_exists($filePath) && is_file($filePath)) {
            if (unlink($filePath)) {
                return true;
            }
        }
        
        return false;
    }
}
