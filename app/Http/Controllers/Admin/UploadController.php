<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Upload;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function index()
    {
        $search = request()->input('search');

        $uploads = Upload::where('uploadUrl', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orderByDesc('created_at')
            ->paginate(25)
            ->withQueryString();
        
        return view('admin.uploads.index')
            ->with('uploads', $uploads);
    }

    public function create()
    {
        return view('admin.uploads.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'file' => ['required', 'file'],
        ]);

        $file = request('file')->store('uploads');

        $upload = new Upload();
        $upload->name = $attributes['name'];
        $upload->uploadUrl = 'storage/' . $file;
        $upload->user_id = request()->user()->id;

        $upload->save();

        return redirect(route('admin.uploads'));
    }

    public function edit(Upload $upload)
    {
        return view('admin.uploads.edit')->with('upload', $upload);
    }

    public function update(Upload $upload)
    {
        $attributes = request()->validate([
            'name' => ['required'],
        ]);

        $upload->name = $attributes['name'];

        $upload->save();

        return redirect(route('admin.uploads'));
    }


    public function destroy(Upload $upload)
    {
        $uploadFile = ltrim($upload->uploadUrl, 'storage/');

        if(Storage::exists($uploadFile)) {
            Storage::delete($uploadFile);
        }

        $upload->delete();

        return redirect(route('admin.uploads'));
    }
}
