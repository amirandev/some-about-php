**1. Downloading Files from Another Server:**

To download files from another server in PHP, you can use the `file_get_contents()` function along with the `file_put_contents()` function. The `file_get_contents()` function retrieves the contents of the file from the remote server, and `file_put_contents()` saves the contents to a file on your server.

Example:
```php
$remoteFile = 'http://example.com/path/to/remote/file.pdf';
$localFile = 'path/to/local/file.pdf';

// Download the file
$fileContents = file_get_contents($remoteFile);

// Save the file locally
file_put_contents($localFile, $fileContents);

echo "File downloaded successfully.";
```

In this example, the `file_get_contents()` function retrieves the contents of the remote file specified by the `$remoteFile` URL. The `file_put_contents()` function then saves the contents to the file specified by the `$localFile` path on your server.

**2. Creating a New Text File, Adding Text, and Saving:**

To create a new text file, add some text to it, and save it, you can use the `file_put_contents()` function with the desired file path and content.

Example:
```php
$filePath = 'path/to/new/file.txt';
$content = "This is the content to be added to the file.";

// Create and write to the file
file_put_contents($filePath, $content);

echo "File created and saved successfully.";
```

In this example, the `file_put_contents()` function creates a new file specified by the `$filePath` path if it doesn't exist and writes the `$content` to it. If the file already exists, its contents will be overwritten. If you want to append content to an existing file, you can use the `FILE_APPEND` flag as the third argument.

Remember to ensure that you have the necessary file permissions to create and write to files in the specified directory.
