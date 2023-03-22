<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index()
    {
        $users = User::all();
        $files = File::all();
        $files = File::simplePaginate(2);      
        return view('files.index', compact('files', 'users'));
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

    public function destroy(File $file, Request $request)
    {
       // Récupérer le fichier avec l'id spécifié
       $file = File::find($request->id);      
       // Supprimer le fichier  avec l'id spécifié
       $file::destroy([$request->id]);    
    
        $file->delete();
    
       
        return redirect()->route('files.index')
                         ->with('success', 'File deleted successfully.');
    }

  
}
