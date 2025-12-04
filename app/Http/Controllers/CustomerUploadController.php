<?php
namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class CustomerUploadController extends Controller
{
    /**
     * Serve customer uploaded files safely.
     *
     * @param  string  $filename
     * @return \Illuminate\Http\Response
     */
    public function show(string $filename): Response
    {
        // Build the storage path
        $path = storage_path('app/public/uploads/customer/' . $filename);

        // Check if file exists
        if (! file_exists($path)) {
            abort(404, 'File not found');
        }

        // Return file as response
        return response()->file($path);
    }
}
