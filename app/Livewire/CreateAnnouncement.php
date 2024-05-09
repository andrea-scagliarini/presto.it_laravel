<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Validation;
use App\Models\Announcement;
use Livewire\Attributes\Validate;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateAnnouncement extends Component
{
    
    use WithFileUploads;
    
    public $image;
    public $temporary_images;
    public $images = [];
    
    
    #[Validate('required', message: "Il campo è obbligatorio")]
    public $title;
    
    #[Validate('required', message: "Il campo è obbligatorio")]
    #[Validate('max:500', message: "Il campo è di massimo 500 caratteri")]
    public $description;
    
    
    #[Validate('required', message: "Il campo è obbligatorio")]
    #[Validate('numeric', message: "Il prezzo deve essere un numero")]
    #[Validate('min:1', message: "Il prezzo deve essere minimo 1")]
    public $price;
    // #[Validate('max:1000', message: "Il prezzo deve essere massimo 1000")]
    
    
    #[Validate('required', message: "Il campo è obbligatorio")]
    public $category;
    
    
    
    protected $rules = [
        
        'images.*' => 'image|max:2048',
        'temporary_images.*' => 'image|max:2048'
    ];
    
    protected $messages = [
        
        'images.max' => "l'immagine deve essere massimo di 2MB",
        'temporary_images.*.required' => "L' immagine è richiesta",
        'temporary_images.*.image' => "i file devono essere immagini",
        'temporary_images.*.max' => "l'immagine deve essere massimo di 2MB",
    ];
    
    
    
    public $announcement;
    
    public function store(){
        $this->validate();
        
        
        
        
        
        $this->announcement= Category::find($this->category)->announcements()->create([
            
            
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            
            
            
            
        ]);
        
        if(count($this->images)){
            foreach($this->images as $image){
                // $this->announcement->images()->create(['path'=>$image->store('images','public')]);
                $newFileName = "announcement/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id),
                new ResizeImage($newImage->path, 400 , 300 ),

                ])->dispatch($newImage->id);
                
                
            }
            
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
            
        }
        
        $this->announcement->user()->associate(Auth::user());
        
        $this->announcement->save();
        
        
        
        $this->cleanForm();
        
        session()->flash('message','Annuncio inserito correttamente');
    }
    
    protected function cleanForm(){
        $this->title = "";
        $this->description = "";
        $this->price = "";
        $this->category ="";
        $this->images=[];
        $this->temporary_images=[];
    }
    public function updatedTemporaryImages()
    {
        if(
            $this->validate([
                'temporary_images.*' => 'image|max:2048',
                ])
                ){
                    foreach ($this->temporary_images as $image) {
                        $this->images[] = $image;
                    }
                }
            }
            
            public function removeImage($key)
            {
                if (in_array($key, array_keys($this->images))) {
                    unset($this->images[$key]);
                }
            }
            
            
            
            public function render()
            {
                return view('livewire.create-announcement');
            }
            
            
        }
        