<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;

class ProductRepository
{
    public function handleImageUpload($request, $currentImage = null): ?string
    {
        if ($request->hasFile('image')) {
            if ($currentImage) {
                File::delete(public_path('products_images/' . $currentImage));
            }

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('products_images', $imageName);
            return $imageName;
        }

        return $currentImage;
    }
}
