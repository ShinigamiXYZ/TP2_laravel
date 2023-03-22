<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('files.index', compact('files'));
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,zip,doc,docx|max:2048',
        ]);
    
        $uploadedFile = $request->file('file');
        $fileName = $uploadedFile->getClientOriginalName();
        $filePath = $uploadedFile->store('uploads', 'uploads');
    
        $file = File::create([
            'name' => $fileName,
            'file_path' => $filePath,
            'user_id' => Auth::id(),
        ]);
    
        return redirect()->route('files.index');
    }

  
}
