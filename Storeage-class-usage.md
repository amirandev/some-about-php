```php
// Assuming the file upload form has a file input field with name 'uploadFile'
$file = $_FILES['uploadFile'];

// Uploading a file
$result = Storage::disk('local')->upload($file);
if ($result) {
    echo 'File uploaded successfully.';
} else {
    echo 'Failed to upload file.';
}

// Copying a file
$result = Storage::disk('local')->copy('source.txt', 'destination.txt');
if ($result) {
    echo 'File copied successfully.';
} else {
    echo 'Failed to copy file.';
}

// Renaming a file
$result = Storage::disk('local')->rename('old.txt', 'new.txt');
if ($result) {
    echo 'File renamed successfully.';
} else {
    echo 'Failed to rename file.';
}

// Deleting a file
$result = Storage::disk('local')->delete('file.txt');
if ($result) {
    echo 'File deleted successfully.';
} else {
    echo 'Failed to delete file.';
}
```
