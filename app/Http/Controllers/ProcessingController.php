<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Imagick;
use ZipArchive;
use File;
use Intervention\Image\Facades\Image;

class ProcessingController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function imagePost(Request $request)
    {
        $folderName = 'images-' . rand();
        Storage::disk('public')->makeDirectory('/images/' . $folderName);
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                Image::make($image->getRealPath())
                    ->save(public_path('/uploads/images/' . $folderName . '/') . $image->getClientOriginalName());
            }
            return redirect()->route('processing', ['file' => $folderName]);
        }
    }

    public function processing(Request $request)
    {
        $files = Storage::disk('public')->files('/images/' . $request->file . '/');
        foreach ($files as $file) {
            $imagec = new Imagick(public_path('/uploads/' . $file));
            $imagec->setImageResolution(96, 96);
            $imagec->setCompressionQuality('50');
            $imagec->writeImage(public_path('/uploads/' . $file));
        }
        return redirect()->route('download', ['file' => $request->file]);
    }

    public function download(Request $request)
    {
        $zip = new ZipArchive;
        $fileName = $request->file . '.zip';
        if ($zip->open(public_path('/uploads/zip/' . $fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::files(public_path('/uploads/images/' . $request->file . '/'));
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }
        return response()->download(public_path('/uploads/zip/' . $fileName));
    }
}
