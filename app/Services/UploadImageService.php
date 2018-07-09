<?php

namespace App\Services;


class UploadImageService
{
    /**
     * @param $image_obj
     * @param $upload_dir
     * @return null|string
     */
    public static function uploadImage($image_obj, $upload_dir)
    {
        if (!$image_obj['size'] == 0) {
            //uploading image to uploads and change it's name
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            $extension = explode(".", $image_obj['name']);
            $photo_name = $upload_dir . '/' . date("Ymdhis") . '.' . end($extension); // renaming image
            move_uploaded_file($image_obj['tmp_name'], $photo_name);
            return $photo_name;
        }
        return null;
    }

}