<?php


namespace App\Services;


use Illuminate\Http\Request;

class FileUploadService
{
    /**
     * @param Request $request
     * @return string
     * @throws \Exception
     */
    public function upload(Request $request): string
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $originalExtension = $file->getClientOriginalExtension();
            $originalFileName = $file->getClientOriginalName();

            $fileUploaded = $file->storeAs('/news', $originalFileName, 'public');

            if ($fileUploaded) {
                return $fileUploaded;
            } else {
                throw new \Exception('File upload error');
            }
        } else {
            throw new \Exception('File upload error');
        }
    }
}
