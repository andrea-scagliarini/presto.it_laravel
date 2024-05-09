<x-layout>
    <x-header></x-header>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10"> <!-- Utilizzo delle classi bootstrap per gestire il layout -->
                <h2 class="text-center animated-title  ">{{__('ui.our latest announcements')}}</h2>

                <div class="row row-cols-1 row-cols-md-3 g-4 text-center"> <!-- Utilizzo delle classi bootstrap per gestire il layout delle card -->
                    @foreach ($announcements as $announcement)
                    <div class="col">
                        <div class="card h-100 shadow-sm  ">
                            
                            <img src="{{ !$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/800/603' }}" class="card-img-top" alt="...">
                            
                            <div class="card-body">
                                <h5 class="card-title text-center animated-title3">{{$announcement->title}}</h5>
                                <div class="clearfix mb-2">
                                    <span class=" badge rounded-pill bg-warning mb-3 textcustom1">{{$announcement->price}}€</span>
                                    
                                </div>
                                <span class="card-title mt-5"></span> <span class="badge rounded-pill bg-info mb-3 textcustom1">
                                    <a class="text-decoration-none" href="{{ route('categoryShow', ['category' => $announcement->category]) }}">{{__('ui.'. $announcement->category->name )}}</a>
                                 </span>
                               
                                <div class="d-grid gap-2 my-4"><a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-warning">{{__('ui.Vai al dettaglio')}}</a></div>
                                <p class="card-title text-center"> {{__('ui.Publicato')}} : {{ $announcement->user->name }} <br> {{$announcement->created_at->format('d/m/Y')}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <x-aboutUs />
            </div>
        </div>
    </div>
</x-layout>
