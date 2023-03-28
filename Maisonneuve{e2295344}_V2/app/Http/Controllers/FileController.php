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
                'name' => 'required|max:25|unique:files,name' , /* oublige un nom unique -> plus simple que de crypter */
            ]);
        
            $uploadedFile = $request->file('file'); 
            $fileTitle = $request->input('name'); /* Creer un titre sans extension pour la BD -> pour comparer unique */
            $fileName = $request->input('name') . '.' . $uploadedFile->getClientOriginalExtension(); /* Creer nom unique mais avec l'extension du document. (simplifie le retrieve) */
            $filePath = $uploadedFile->storeAs('uploads', $fileName, 'uploads'); 
        
            $file = File::create([
                'name' => $fileTitle,
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


    public function update(Request $request)
    {
        $file = File::find($request->id);
        $file->name = $request->name;
        $file->save();
        return redirect()->route('files.index');
    }
  
    public function download($id)
    {
        $file = File::find($id);
        $file_path = $file->file_path;
        
    
        $file_path = 'public/uploads/' . $file_path;
        $file_path = str_replace('/', '\\', $file_path);

      
    
        return Storage::download($file_path);
    }
    
}
