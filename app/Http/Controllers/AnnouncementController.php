<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function create(){
        
        return view('annunci.create');
        
    }
    public function showAnnouncement (Announcement $announcement) {
        
        return view('annunci.show',compact('announcement'));
    }
    public function index (Announcement $announcement) {
        $announcements=Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(10);
        
        return view('annunci.index',compact('announcements'));
    }



   


    public function destroy(Announcement $announcement)
    {
       
        
        Storage::delete(Image::class);
        $announcement->category()->dissociate();
        $announcement->delete();

        return redirect(route('home'))->with('message', 'Annuncio eliminato con successo');
    }

    

    
}
