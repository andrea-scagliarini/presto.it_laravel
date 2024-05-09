<x-layout>
   <h1 class="card-title text-center animated-title">{{__('ui.Categoria')}}  </h1>
   
    
        <div class="container-fluid bg-trasparent my-4 p-3">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3"> <!-- Riga centrata orizzontalmente -->
        @forelse ($category->announcements as $announcement)
        <div class="col-12 col-md-4"> <!-- Colonne per gestire il layout responsivo -->
            <div class="card h-100 shadow-sm"> 
                <div class="card-img">
                    <img src={{!$announcement->images()->get()->isEmpty() ?  $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/800/603'}} class="card-img-top" alt="...">
                </div>
                <div class="card-body text-center"> 
                    <h4 class=" text-center">{{$announcement->title}}</h4>
                    <div class="clearfix mb-2">
                        <span class=" badge rounded-pill bg-success">{{$announcement->price}}€</span> 
                    </div>
                    <span class="card-title mt-5"></span> <span class="badge rounded-pill bg-info mb-3 textcustom1">
                        <a class="text-decoration-none" href="{{ route('categoryShow', ['category' => $announcement->category]) }}">{{$announcement->category->name}}</a>
                    </span>
                    <div class="d-grid gap-2 my-4">
                        <a href="{{ route('announcements.show', compact('announcement')) }}"  class="btn btn-warning">{{__('ui.Vai al dettaglio')}}</a>
                    </div>
                    <p class="card-text">{{__('ui.Publicato')}}: <br>  {{$announcement->user->name}} {{$announcement->created_at->format('d/m/Y')}}</p>
                </div>
            </div> 
        </div>
        @empty
        <div class="col-12 text-center"> <!-- Se non ci sono annunci, centra il testo -->
            <h2>{{__('ui.Non sono ancora presenti degli annunci!')}}</h2>
            <h3>{{__('ui.Pubblicane uno')}}  <a href="{{ route('create') }}">{{__('ui.Nuovo annuncio')}}</a></h3>
        </div>
        @endforelse
    </div>
</div>

        
        
</x-layout>