<?php


namespace App\Traits;

trait UploadTrait
{

    private function imgUpload($images, $imageColumn = null)
    {
        $uploadedImg = [];

        if (is_array($images)) {
            foreach ($images as $img) {
                $uploadedImg[] = [$imageColumn => $img->store('products', 'public')];
            }
        } else {
            $uploadedImg = $images->store('logo', 'public');
        }
        return $uploadedImg;

    }

}
