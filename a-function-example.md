### Funcyion example
```php
function convertToMB($bytes) {
    $megabytes = $bytes / (1024 * 1024);
    return $megabytes;
}

// Usage example
$sizeInBytes = 5242880; // 5 MB
$sizeInMB = convertToMB($sizeInBytes);

echo "Size in MB: " . $sizeInMB . " MB";
```
