<?php

namespace App\Services;

class HelperService
{
    public static function get_photo_path($request, $path): string|null
    {
        $photoPath = null;
        if (isset($request['photo']) && $request['photo']->isValid()) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path($path), $photoName);
            $photoPath = $path . '/' . $photoName;
        }
        return $photoPath;
    }
}
