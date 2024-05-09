<!-- Form per la ricerca di annunci -->
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <form class="d-flex mx-auto my-2 my-lg-0" action="{{ route('announcement.search') }}" method="GET">
                <!-- Bottone per la ricerca -->
                <input name="searched" class="form-control me-2 text-center" type="search" placeholder="{{__('ui.Digita qui per la ricerca')}}"
                    aria-label="search">
                <button class="btn btn-warning p-3 mr-3" type="submit">{{__('ui.Ricerca')}}</button>
            </form>
        </div>
    </div>
</div>
