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
        $users = User::all(); // Récupérer tous les utilisateurs
        $files = File::all();// Récupérer tous les documents
        $files = File::simplePaginate(2);// pagination 2 items par page
        return view('files.index', compact('files', 'users')); // Afficher la vue index avec les fichiers et les utilisateurs
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
            $request->validate([
                'file' => 'required|mimes:pdf,zip,doc,docx|max:2048', /* specifications du format et de la tailles accepter */
                'name' => 'required|max:25|unique:files,name' , /* oublige un nom unique -> plus simple que de crypter */
            ]);
        
            $uploadedFile = $request->file('file'); // Récupérer le fichier téléchargé et le nom de fichier
            $fileTitle = $request->input('name'); /* Creer un titre sans extension pour la BD -> pour comparer unique */
            $fileName = $request->input('name') . '.' . $uploadedFile->getClientOriginalExtension(); /* Creer nom unique mais avec l'extension du document. (simplifie le retrieve) */
            $filePath = $uploadedFile->storeAs('uploads', $fileName, 'uploads');    // Enregistrer le fichier dans le dossier /uploads et stocker son chemin dans la DB
            /* va se retrouver dans deux dossier du a un lien symblolique entre app/storage et publique via la commande -> php artisan storage:link */
        
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
