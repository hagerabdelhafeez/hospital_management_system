<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadTrait
{
    public function verifyAndStoreImage(Request $request, $inputName, $folderName, $disk, $imageable_id, $imageable_type)
    {
        if ($request->hasFile($inputName)) {
            if (!$request->file($inputName)->isValid()) {
                session()->flash('error', 'Invalid Image!');

                return redirect()->back()->withInput();
            }

            $photo = $request->file($inputName);
            $name = Str::slug($request->input('name'));
            $fileName = $name.'.'.$photo->getClientOriginalExtension();

            $image = new Image();
            $image->filename = $fileName;
            $image->imageable_id = $imageable_id;
            $image->imageable_type = $imageable_type;
            $image->save();

            return $request->file($inputName)->storeAs($folderName, $fileName, $disk);
        }

        return null;
    }

    public function Delete_attachment($disk, $path, $id)
    {
        Storage::disk($disk)->delete($path);
        Image::where('imageable_id', $id)->delete();
    }
}
