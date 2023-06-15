```php
$fileInfo = Storage::disk('local')->fileInfo('file.txt');
if ($fileInfo) {
    echo 'File path: ' . $fileInfo->getPath() . '<br>';
    echo 'File size: ' . $fileInfo->getSize() . ' MB<br>';
    echo 'Last modified: ' . $fileInfo->getLastModified() . '<br>';
    echo 'File extension: ' . $fileInfo->getExtension();
} else {
    echo 'File does not exist.';
}
```
