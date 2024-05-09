<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home () {
        $announcements = Announcement::where('is_accepted',true)->take(6)->get()->sortByDesc('created_at');
        return view('welcome',compact('announcements'));
    }
    
    public function categoryShow (Category $category) {
        
        return view('categoryShow',compact('category'));
    }
    
    
    public function index()
    {
        
        
        
        $announcements = Announcement::where('user_id',Auth::id()) //prendi gli album che corrispondono ad un utente specifico ovvero il loro id corrisponde a quello dell'utente autenticato
        ->orderBy('updated_at', 'DESC') //ordinameli per la colonna updated_at in modo decrescente
        ->take(10) //Prendine 1
        ->get(); //trasforma il tutto in una collezione di oggetti Album
        
        
        return view('profile.profile',compact('announcements'));
    }
    
    public function destroy()
    {
        // dd(Auth::user()->songs);
        $announcements = Auth::user()->announcements;
        
        foreach($announcements as $announcement){
            $announcement->update([
                'user_id' => NULL,
            ]);
        };
        
        
        
        Auth::user()->delete();
        
        return redirect(route('home'))->with('message', 'Ti sei cancellato con successo');
    }
    public function searchAnnouncement(Request $request ){
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('annunci.index', compact('announcements'));
    }
    
    public function setLanguage($lang){
        
        session()->put('locale' , $lang);
        
        return redirect()->back();
        
    }

    public function withus(){


    return view('work.withus');

    }
    
    
    
}
