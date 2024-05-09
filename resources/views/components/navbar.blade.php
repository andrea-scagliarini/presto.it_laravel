<!-- Contenitore principale della navbar -->
<div class="container-fluid ">
    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg bg-navbar bg-dark fixed-top mynavbar">
        <!-- Logo del sito nella navbar -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img id="logo" class="imagelogo" src="/img/logo_presto.png" alt="logo del sito">
        </a>
        <!-- Bottone per il toggle della navbar su dispositivi mobili -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Contenitore per i link della navbar -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Lista dei link principali della navbar -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- Link per la homepage -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fa-solid fa-house "></i>{{__('ui.Home')}}
                </a>
            </li>
            <!-- Link per gli annunci -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('announcements.index') }}">
                    <i class="fa-solid fa-bullhorn" style="color: black"  ></i> {{__('ui.Annunci')}}
                </a>
            </li>
            <!-- Link per diventare revisore -->
            
            @auth
            <!-- Link per creare un annuncio -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('create') }}">
                    <i class="fa-solid fa-plus" style="color: #01060e;"></i>
                    {{__('ui.Crea annunci')}}
                </a>
            </li>
            @if (!Auth::user()->is_revisor)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('become.revisor') }}">
                    <i class="fa-solid fa-list-check"></i> {{__('ui.Diventa revisore')}}
                </a>
            </li>
            @endif
            @endauth
            
            
            
            
            <!-- Dropdown per le categorie -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-list"></i> 
                {{__('ui.Categorie')}}</a>
                <!-- Menu a tendina con le categorie -->
                <ul class="dropdown-menu" aria-="navbarDropdown">
                    <!-- Loop attraverso le categorie -->
                    @foreach ($categories as $category)
                    <li>
                        
                        <a class="dropdown-item " href="{{ route('categoryShow', compact('category')) }}">{{__('ui.'. $category->name )}}</a>
                        
                    </li>
                    @endforeach
                </ul>
            </li>
            
            
        </ul>
        @auth
        <li class="nav-item dropdown drop">
            <a class="nav-link dropdown-toggle" id="navbarDropdownUser" role="button"
            data-bs-toggle="dropdown">
            <i class="fa-solid fa-user">  {{ Auth::user()->name }}</i>
        </a>
        <!-- Menu a tendina con le categorie -->
        <ul class="dropdown-menu about" >
            <li>
                <!-- Link per accedere al proprio profilo -->
                <a class="dropdown-item" href="{{ route('profile.profile') }}">{{__('ui.Profilo')}} </a>
            </li>
            <li class="my-2 revisor mx-2 ">
                
                <!-- Se l'utente è un revisore, mostra il link alla sezione revisore -->
                @if (Auth::user() && Auth::user()->is_revisor)
                <a href="{{ route('revisor.index') }}" class="badge bg-dark me-3"> {{__('ui.Da Revisionare')}}
                    <span>{{ App\Models\Announcement::toBeRevisionedCount() }}</span>
                </a>
                @endif
            </li>
            <li>
                <!-- Form per il logout -->
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            <li class="p-0 m-0">
                <!-- Form per cancellare l'account -->
                <form method="POST" action="{{ route('profile.delete') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> {{__('ui.Cancella account')}}</button>
                </form>
            </li>
        </ul>
    </li>
    
    
    
    
    
    
    
    
    @endauth  
    
    <!-- Sezione per gli utenti non autenticati -->
    @guest
    <div class="d-flex">
        <!-- Bottone per registrarsi -->
        <a href="{{ route('register') }}" class="btn btn-outline-dark me-3"> {{__('ui.Registrati')}}</a>
        <!-- Bottone per accedere -->
        <a href="{{ route('login') }}" class="btn btn-outline-dark me-3">{{__('ui.Accedi')}}</a>
    </div>
    
    @endguest 
    <li class="nav-item dropdown drop me-3">
        <a class="nav-link dropdown-toggle" id="navbarDropdownUser" role="button"
        data-bs-toggle="dropdown">
        <i class="fa-solid fa-globe"></i> {{__('ui.Seleziona la lingua')}}
    </a>
    <!-- Menu a tendina per le lingue -->
    <ul class="dropdown-menu about languages-container" >
        
        <li class="">
            
            <x-language lang="it"/> <span>Italiano</span>
            
            
        </li>
        <li class="">
            <x-language lang="en" /><span>English</span>
            
        </li>
        <li>
            <x-language lang="es" /><span>Español</span>
            
        </li>
        
    </ul>
</li>


</div>
</nav>
</div>
