<x-layout>
    <div class="container mt-6">
        <div class="row justify-content-center text-center">
            <div class="col-sm-10 col-md-8 col-lg-6 mt-5"> <!-- Utilizzate le classi col-sm-10 per dispositivi piccoli, col-md-8 per dispositivi medi e col-lg-6 per dispositivi grandi -->
                <!-- Verifica degli errori di validazione -->
                
                
                <form class="formLogin mt-5" method="POST" action="{{ route('login') }}">
                    @csrf <!-- Protezione CSRF -->
                    <h2>{{__('ui.Accedi')}} </h2>
                    <div class="form-group">
                        <label class="mylabel @error('email') is-invalid @enderror" for="email">Email</label>
                        <input class="myinput form-control" placeholder="@error('email') {{$message}} @enderror" name="email" type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label class="mylabel @error('password') is-invalid @enderror" for="password">Password</label>
                        <input class="myinput form-control" name="password" placeholder="@error('password') {{$message}} @enderror" type="password" id="passwordField">
                    </div>
                    <div class="form-group form-check d-flex justify-content-center">
                        <input type="checkbox" class="form-check-input" id="showPasswordCheckbox">
                        <label class="form-check-label" for="showPasswordCheckbox">Mostra Password</label>                        
                    </div>
                    
                    
                    
                    
                    <!-- Pulsante di accesso -->
                    <button type="submit" class="btn mybottone btn-warning mt-3">{{__('ui.Accedi')}}</button>
                    <div class="mt-3">
                        <a class="text-decoration-none anchorRegister" href="{{ route('register') }}">Se non sei registrato clicca qui</a>
                    </div>
                </form>
            </div> <!-- Fine colonna -->
        </div>
    </div>
    <!-- Fine riga -->
</div>


<script>
    document.getElementById("showPasswordCheckbox").addEventListener("change", function() {
        var passwordField = document.getElementById("passwordField");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    });
</script>


</x-layout>