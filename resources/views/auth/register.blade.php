<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center text-center mt-5">
            <div class="col-md-8">
                <div class="custom-bg">
                    <div class="form-container">
                        <div class="container">
                            <div class="row justify-content-center text-center align-items-center">
                                <div class="col-lg-7 mt-5">
                                    <form class="formRegister" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <h2>{{__('ui.Registrati')}}</h2>
                                        <div class="mb-3">
                                            <label for="name" class="form-label mylabel @error('name') is-invalid @enderror"><h4>{{__('ui.Nome')}}</h4></label>
                                            <input class="myinput form-control" name="name" placeholder="@error('name'){{$message}} @enderror" type="text" id="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label mylabel @error('email') is-invalid @enderror"><h4>Email</h4></label>
                                            <input class="myinput form-control" name="email" placeholder="@error('email') {{$message}} @enderror" type="email" id="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label mylabel @error('password') is-invalid @enderror"><h4>Password</h4></label>
                                            <div class="input-group">
                                                <input class="myinput form-control" name="password" placeholder="@error('password') {{$message}} @enderror" type="password" id="passwordField">
                                            </div>
                                            <input type="checkbox" id="showPasswordCheckbox">
                                            <label for="showPasswordCheckbox">Mostra Password</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label mylabel @error('password') is-invalid @enderror"><h4>{{__('ui.Conferma Password')}}</h4></label>
                                            <div class="input-group">
                                                <input class="myinput form-control" name="password_confirmation" placeholder="@error('password') {{$message}} @enderror" type="password" id="passwordField">
                                            </div>
                                            
                                        </div>
                                        <button class="mybottone btn btn-warning mt-3" type="submit">{{__('ui.Invia')}}</button>
                                        <div class="mt-3">
                                            <a class="text-decoration-none anchorRegister" href="{{ route('login') }}">Se sei già registrato clicca qui</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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


