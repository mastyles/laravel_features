<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->file) {

            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:txt|max:100000'
            ]);

            if ($validator->fails())
            {
                return response()->json([
                    'message' => 'Internal server error. Please try again.',
                    'status_code' => 'INTERNAL_SERVER_ERROR'
                ], 500);

            } else {
                $file = $request->file;
                $fileName = $file->getClientOriginalName();
                $file->move(base_path(UPLOAD_DIR), $fileName);

                return response()->json([
                    'message' => 'File has been uploaded.',
                    'status_code' => 201
                ], 201);

            }
        }

        return response()->json([
            'message' => 'No file has been uploaded.'
        ], 400);
    }

    public function download(Request $request) {

        $fileName = $request->fileName;
        $path = base_path(UPLOAD_DIR . '\\' . $fileName);

        if (file_exists($path)) {
            return response()->json([
                'fileName' => $fileName,
                'message' => 'The file exists.',
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'The file does not exist.',
                'status_code' => 404
            ], 404);
        }
    }

}
