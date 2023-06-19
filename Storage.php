<?php
define('STORAGE_DIR', __DIR__ . '/storage');

class Storage
{
    static public $saveTo = STORAGE_DIR;
    static public $out = [
        'message' => null,
        'status' => 0,
        'name' => null
    ];

    static function upload($directory, $input_name)
    {
        self::$saveTo = self::$saveTo . '/' . $directory;

        // if input was removed manually
        if (isset($_FILES[$input_name]) == false) {
            self::$out['message'] = 'Input were not found';
            self::$out['status'] = 0;
        }

        // input tag with that name were found
        $file = $_FILES[$input_name];

        if ($file['tmp_name'] == "") {
            self::$out['message'] = 'File were not selected';
            self::$out['status'] = 0;
        } else {
            // image/jpeg => image
            $info = explode('/', $file['type']);

            $type = $info[0];
            $extension = $info[1];

            if ($type != 'image') {
                self::$out['message'] = 'დაშვებულია მხოლოდ ფოტოები!';
                self::$out['status'] = 0;
            }

            $allowed = ['png', 'jpg', 'jpeg', 'gif'];

            if (in_array($extension, $allowed) == false) {
                self::$out['message'] = 'აკრძალულია ' . $extension . ' ფაილის ატვირთვა!';
                self::$out['status'] = 0;
            } else {
                self::$out['message'] = 'ფაილი წარმატებით აიტვირთა';
                self::$out['status'] = 1;

                // set new name to the file
                self::$out['name'] = time() . '.' . $extension;

                // new file full path
                $saveAs = self::$saveTo . '/' . self::$out['name'];
                
                $run = move_uploaded_file($file['tmp_name'], $saveAs);

                if (!$run) {
                    self::$out['message'] = 'მოცხდა შეცდომა, ფაიოლი ვერ აიტვირთა!';
                    self::$out['status'] = 0;
                }
            }
        }

        return (object)self::$out;
    }
}

if (isset($_POST['title'])) {

    
    $upload = Storage::upload('images', 'file_upload');
    $color = $upload->status ? 'lime' : 'red';

    echo '<span style="color: '.$color.'">'.$upload->message.'</span>';


    // echo  '<pre>';
    // print_r($upload);
    // echo  '</pre>';
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="title">
    <br>
    <input type="file" name="file_upload" accept="image/*">
    <br>
    <button type="submit">Upload</button>
</form>
