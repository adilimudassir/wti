<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    public function storeFile($file, $location)
    {
        $path = $location.'/'.date('F').date('Y').'/';

        $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());

        $filename_counter = 1;

        // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
        while (Storage::disk($this->fileSystem())->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
            $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).(string) ($filename_counter++);
        }

        $filename = $filename.'.'.$file->getClientOriginalExtension();

        $fullPath = $path.$filename;
        $file->storeAs($path, $filename, $this->fileSystem());

        return $fullPath;
    }

    public function updateFile($model, $field, $data, $location)
    {
        Storage::disk($this->fileSystem())->delete($model->$field);

        $file = $this->storeFile($data, $location);

        $model->$field = $file;

        $model->save();
    }

    private function fileSystem()
    {
        return app()->environment('production') ? 'public' : 'public';
    }
}
