<x-layout>
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        
        
        <!-- Carousel per le immagini dell'annuncio -->
        <div id="carouselExampleAutoplaying" class="carousel slide mb-4" data-bs-ride="carousel">
          <div class="carousel-inner">
            @if($announcement->images)
            @foreach ($announcement->images as $image)
            <div class="carousel-item @if($loop->first)active @endif">
              <img src="{{$announcement->images()->first()->getUrl(400,300)}}" class="d-block w-100" alt="">
              
            </div>
            @endforeach
            @else
            <div class="carousel-item active">
              <img src="https://picsum.photos/800/601" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://picsum.photos/800/602" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://picsum.photos/800/603" class="d-block w-100" alt="...">
            </div>
            @endif
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!-- Dettagli dell'annuncio -->
        
        
        {{-- card prova --}}
        
        
      </div>
      <div class="col-12 col-md-4">
        <section class="mx-auto my-5" style="max-width: 30rem;">
          
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title font-weight-bold"><a>{{ $announcement->title }}</a></h5>
              <ul class="list-unstyled list-inline mb-0">
                <li class="list-inline-item me-0">
                  <i class="fas fa-star text-warning fa-xs"> </i>
                </li>
                <li class="list-inline-item me-0">
                  <i class="fas fa-star text-warning fa-xs"></i>
                </li>
                <li class="list-inline-item me-0">
                  <i class="fas fa-star text-warning fa-xs"></i>
                </li>
                <li class="list-inline-item me-0">
                  <i class="fas fa-star text-warning fa-xs"></i>
                </li>
                <li class="list-inline-item">
                  <i class="fas fa-star-half-alt text-warning fa-xs"></i>
                </li>
                <li class="list-inline-item">
                  <p class="text-muted">4.5 (413)</p>
                </li>
              </ul>
              <h3><p class="mb-2 badge bg-warning">{{__('ui.Prezzo')}}:   {{$announcement->price}}€</p></h3>
              
              <hr class="my-4" />
              <p class="card-text">
                {{ $announcement->description }}
              </p>
              <p class="lead"><strong> <a href="{{ route('categoryShow', ['category' => $announcement->category]) }}" class="text-decoration-none   mb-3 mybottone">{{ __('ui.' . $announcement->category->name) }}</a></strong></p>
              <ul class="list-unstyled list-inline d-flex justify-content-between">
                <p class="card-text text-center mt-3">{{ __('ui.Publicato') }}: {{ $announcement->user->name }} {{ $announcement->created_at->format('d/m/Y') }}</p>
              </ul>
              <a href="{{ route('announcements.index') }}" class="btn btn-warning">{{ __('ui.Torna indietro') }}</a>
            </div>
          </div>
          
        </section>
      </div>
      
      
      
    </div>
  </div>
  
</x-layout>
