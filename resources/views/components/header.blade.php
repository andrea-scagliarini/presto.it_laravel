{{-- <header class="container ">
  <div class="row ">
    
    <div class="col-12  d-flex justify-content-center"> --}}
      <!-- colonna di sinistra / titolo con due bottoni -->
      
      {{-- <x-research></x-research>
        
        
      </div>
    </div>
  </header> --}}
  
  <header>
    {{-- <div class="header-content">
      <h2  class="display-1 animated-title justify-content-center">{{__('ui.welcome')}}</h2>
      <img class="full-screen-image personalimage img-fluid" src="/img/sfondosuperiore.jpg" alt="">
      <div class="button-container">
        
        <x-research></x-research>
      </div>
    </div> --}}
    <div style="background: url(/img/sfondo.jpg)" class="page-holder bg-cover imgheader ">
      <div class="container">
        <div class="row">
          <div class="col-12">
            @if (session('access.denied'))
            <!-- Mostra un messaggio di errore se l'accesso è negato -->
            <div class="alert alert-danger">
              {{ session('access.denied') }}
            </div>
            @endif
            
            @if (session('message'))
            <!-- Mostra un messaggio di successo -->
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
            @endif
            
            @if (session('revisor'))
            <!-- Mostra un messaggio di successo specifico per i revisori -->
            <div class="alert alert-success">
              {{ session('revisor') }}
            </div>
            @endif
            
            @if ($errors->any())
            <!-- Mostra tutti gli errori di validazione -->
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="container mb-4 py-5">
              <header class="text-center text-white py-5">
                <h1  class="display-1 animated-title ">{{__('ui.welcome')}}</h1>
                <div class="col-12 d-flex justify-content-center"><x-research></x-research></div>
                
              </header>
              
              
              
            </div>
          </div>
        </div>
      </div>
    </header>