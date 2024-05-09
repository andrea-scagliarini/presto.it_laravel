<div>
    <!-- Messaggio di successo mostrato se presente nella sessione -->
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    
    <!-- Spazio vuoto per separare il contenuto superiore -->
    <div style="height: 60px"></div>
    
    <!-- Contenitore principale -->
    <div class="container">
        <!-- Riga per allineare il contenuto al centro -->
        <div class="row justify-content-center">
            <!-- Colonna che occupa 8 su 12 colonne su schermi medi e grandi -->
            <div class="text-center col-md-8">
                <!-- Form per l'invio dei dati -->
                <form class="formAnnouncement" wire:submit='store' enctype="multipart/form-data">
                    <!-- Campo Titolo -->
                    <h2>{{__('ui.Nuovo annuncio')}} </h2>
                    <div class="mb-3">
                        <label class="mylabel" for="title " class="form-label"><h4>{{__('ui.Titolo')}}</h4></label>
                        <input  class="myinput" wire:model.live='title' type="text" class="form-control shadow @error('title') is-invalid @enderror" id="title">
                        @error('title')
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <!-- Campo Prezzo -->
                    <div class="mb-3">
                        <label class="mylabel" for="price" class="form-label"><h4>{{__('ui.Prezzo')}}</h4></label>
                        <input  class="myinput"  wire:model.live='price' type="number" class="form-control shadow @error('price') is-invalid @enderror" id="price">
                        @error('price')
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <!-- Campo Descrizione -->
                    <div class="mb-3">
                        <label class="mylabel" for="description" class="form-label "><h4>{{__('ui.Descrizione')}}</h4></label>
                        <textarea  class="myinput"  wire:model.live='description' class="form-control shadow @error('description') is-invalid @enderror" id="description" cols="50" rows="10" style="height: 100px"></textarea>
                        @error('description')
                        <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <!-- Campo Categoria -->
                    <div class="mb-3">
                        <label class="mylabel" for="category"><h4>{{__('ui.Categoria')}}</h4></label>
                        <select  class="myinput"  wire:model.defer="category" id="category" class="form-control shadow">
                            <option value="">{{__('ui.Scegli la categoria')}}</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="mb-3">
                            <label  class="mylabel" for="img"><h4>{{__('ui.Immagine')}}</h4></label>
                            <input  class="form-control"  wire:model="temporary_images" name="images" multiple
                            class="form-control shadow @error('temporary_images.*')is-invalid
                            @enderror"
                            type="file" placeholder="Img" />
                            @error('temporary_images.*')
                            <p class="text-danger mt-2">{{ $messages }}</p>
                            @enderror
                        </div>
                        @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>anteprima immagine</p>
                                <div class="row border border-4 border-info rounded shadow py-4">
                                    
                                    @foreach ($images as $key => $image)
                                    
                                    <div class="col my-3">
                                        <div class="img-preview mx-auto  rounded"  style="background-image: url({{$image->temporaryUrl()}});">
                                            
                                        </div>
                                        <button type="button"
                                        class="btn btn-danger shadow d-block text-center mt-2 mx-auto"
                                        wire:click="removeImage({{$key}})">Cancella</button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- Bottone di invio -->
                        <button type="submit" class="mybottone btn btn-primary"><h3>{{__('ui.Invia')}}</h3></button>
                    </form>
                </div>
            </div>
        </div>
    </div>