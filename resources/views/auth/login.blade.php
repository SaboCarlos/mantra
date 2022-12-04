@extends('layouts.log')

@section('title','Login')

@section('content')

<!-- Pills navs -->
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-6" style="margin-top: 4rem; 
        margin-bottom: 5rem; 
        border-radius: 15px;
        box-shadow: 0 6px 8px rgba(21, 105, 65, 0.5);
        border-top: 2px rgba(18,120,71,.3);
        border-left: 2px rgba(18,120,71,.3);">
            
            
            <!-- Pills navs -->
  
            <!-- Pills content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="tab-login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="text-center mb-3" >
                            <p>Sign in with:</p>
                    
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-google"></i>
                            </button>
                    
                        </div>
                
                        <p class="text-center">or:</p>
                
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                           
                             <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                             name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                             placeholder="Seu o email"
                             />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password" 
                            placeholder="Seu password"
                            />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                
                        <!-- 2 column grid layout -->
                        <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-3 mb-md-0">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
                            </div>
                        </div>
                
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Simple link -->
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="text-decoration: none">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" style=" width: 150px;
                                height: 50px;
                                border: none;
                                border-radius: 50px;
                                background: #19547b;
                                color: #fff;
                                font-weight: 600;
                                margin: 10px 0;
                                text-transform: uppercase;
                                cursor: pointer;">
                                    {{ __('Login') }}
                                </button>  
                            </div>
                        </div>
                
                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Não és Menbro? <a href="{{url('register')}}" style="text-decoration: none; color:hsl(353, 100%, 78%);">Registar</a></p>
                    </div>
                </form>
                    
            </div>
            <!-- Pills content -->
        </div>
    </div>
</div>
@endsection
