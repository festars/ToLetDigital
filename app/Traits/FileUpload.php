<?php 

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

/**
 * File upload helpers
 */
trait FileUpload
{
    public function upload($folder, $file)
    {
        $filename = $this->fileName($file);

        $path = Storage::disk('spaces')->url($folder . '/' . $filename);

        $t = Storage::disk('spaces')->put($folder . '/' . $filename, file_get_contents($file), 'public');

        $imageName = Storage::disk('spaces')->url($folder . '/' . $filename);

        return $imageName;

    }

    /**
     * Make a file file name
     *
     * @return String
     */
    protected function fileName($file)
    {
        $name = sha1(
            time() . $file->getClientOriginalName()
        );
        $extension = $file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }

    public function deleteFile($filename)
    {
        Storage::disk('spaces')->delete($filename);
    }

}
