<?php

class UploadFileManagement{
    private $file;

    public function __construct(array $file)
    {
        $this->file = $file;
    }

    public function accountAvatar(RoutingData $data){
        $file = $data->file['img'] ?? null;
        $this->checkFile($file);

        $fileExtension = strtoupper(getFileExtension($file['name']));
        if($fileExtension === 'JPG')
        {
            
        }
        else
        {
            return 'your picture must be JPG type';
        }
    }

    public function saveFile(string $path) : bool{
        $dir = getDirectory($path);
        if(!is_dir($dir))
        {
            mkdir($dir, 0777, true);
        }
        return move_uploaded_file($this->file["tmp_name"], $path);
    }

    public function checkFile(array $extensionList) : string{
        $success = 'success';
        $result = $success;

        if(isset($this->file['error']))
        {
            switch ($this->file['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $result = 'No file sent.';
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $result = 'Exceeded filesize limit.';
                default:
                    $result = 'Unknown errors.';
            }
        }

        if($result === $success)
        {
            $result = 'Your extension is not supported.';
            $extension = strtoupper(getFileExtension($this->file['name']));
            foreach ($extensionList as $value) {
                if(strtoupper($value) === $extension)
                {
                    $result = $success;
                    break;
                }
            }
        }
        
        return $result;
    }
}