<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <h2 class="animated-title text-center display-1">Benvenuto {{ Auth::user()->name }}</h2>
            </div>
            <div class="col-4 col-md-4 text-center">
                <div class="card" style="max-width: 30rem ; ">
                    <div class="clearfix mb-1 p-2">
                        <span class=" badge square-pill bg-info mb-3 textcustom1">Username: {{Auth::user()->name}}</span>
                    </div>
                    <div class="clearfix mb-1">
                        <span class=" badge square-pill bg-info mb-3 textcustom1">Email: {{Auth::user()->email}}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container d-flex justify-content-center">
            <div class="row text-center">
                <!-- Titolo e link per creare un nuovo annuncio -->
                
                
                <h4 class="animated-title text-center display-1">I tuoi Annunci</h4> 
                
                <div class="col-12 text-center abc">
                    <div class="row">
                        <!-- Ciclo attraverso gli annunci -->
                        @forelse ($announcements as $announcement)
                        <div class="col-12 col-md-4 py-4"> <!-- Colonne per gestire il layout responsivo -->
                            <div class="card h-100 shadow-sm  ">
                                
                                <img src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/800/603' }}" class="card-img-top" alt="...">
                                
                                <div class="card-body">
                                    <h6 class="card-title text-center animated-title3 ">{{$announcement->title}}</h6>
                                    <div class="clearfix mb-2">
                                        <span class=" badge rounded-pill bg-warning mb-3 textcustom1">{{$announcement->price}}€</span>
                                        
                                    </div>
                                    <div>
                                        <span class="card-title "></span> <span class="badge rounded-pill bg-info mb-3 textcustom1">
                                            <a class="text-decoration-none text-black" href="{{ route('categoryShow', ['category' => $announcement->category]) }}">{{__('ui.'. $announcement->category->name )}}</a>
                                        </span>
                                    </div>
                                    <div class="">
                                        <span class="badge rounded-pill bg-warning mb-3 textcustom1"></span>
                                        <p class="description text-black">{{__('ui.Descrizione')}}: <br> {{ $announcement->description }}</p>
                                    </div>
                                    
                                </div>
                                <h6 class="d-flex justify-content-center  "> {{__('ui.Publicato')}} : {{ $announcement->user->name }}  {{$announcement->created_at->format('d/m/Y')}}</h6>
                                <form method="POST" action="{{route('announcement.delete',compact('announcement'))}}">
                                    @csrf
                                    @method("DELETE")
                                    
                                    <button type="submit" class="btn btn-danger">Cancella l'annuncio</button>
                                </form>
                            </div> 
                            
                        </div>
                        
                        @empty
                        <!-- Nessun annuncio trovato -->
                        <div class="col-12">
                            <div class="alert alert-warning py-3 shadow">    
                                <p>{{__('ui.Non abbiamo trovato annunci per questa ricerca')}}</p>
                            </div>
                        </div>
                        @endforelse
                        <a class="text-decoration-none "  href="{{ route('create') }}"><button class=" btn btn-warning mt-3 "><h3>{{__('ui.Publica Nuovo Annuncio')}}</h3></button></a> 
                        
                    </div>
                </div>
            </div>
        </div>
        
    </x-layout>
    