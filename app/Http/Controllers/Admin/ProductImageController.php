<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
//    public function removeImage(Request $request)
//    {
//        $imgName = $request->get('imgName');
//        if (Storage::disk('public')->exists($imgName)) {
//            Storage::disk('public')->delete($imgName);
//        }
//
//        $removeImg = ProductImage::where('image', $imgName);
//        $removeImg->delete();
//    }

    public function destroy($id)
    {
        $img = ProductImage::find($id);

        if (Storage::disk('public')->exists($img->image)) {
            print Storage::disk('public')->delete($img->image);
        }

        $img->delete();

        flash('Imagem removida')->warning();
        return redirect()->route('admin.products.edit', ['product' => $img->product_id]);
    }
}
