<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public $user;
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
        
    }
    
    
    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti hai accettato l\'annuncio');
    }
    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Complimenti hai rifiutato l\'annuncio');
    }
    
    public function becomeRevisor(Request $request){
        
        $name = $request->name;
        $email = $request->email;
        $body = $request->body;
        
        Mail::to('revidor@presto.it')->send(new BecomeRevisor(Auth::user(),$body));
        
        
        //Riportando alla vista homepage tramite l'helper di laravel che ci reindirizza ad una rotta di tipo get quindi ad un qualcosa di visionabile
        return redirect(route('home'))->with('message','Ti abbiamo mandato una mail, controlla la casella di posta elettronica');
        
        
        
    }
    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor',["email"=>$user->email]);
        return redirect()->back()->with('revisor','Complimenti, sei diventato revisore');
    }
  
    
    
    
    
    
    
}