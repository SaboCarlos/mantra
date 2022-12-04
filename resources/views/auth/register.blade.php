@extends('layouts.log')

@section('title','Registar')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="margin-top: 4rem;
         margin-bottom: 5rem; 
         border-radius: 15px;
         box-shadow: 0 6px 8px rgba(21, 105, 65, 0.5);
         border-top: 2px rgba(18,120,71,.3);
         border-left: 2px rgba(18,120,71,.3);">

            <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="tab-register">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="text-center mb-3">
                        <p>{{ __('Register') }} with:</p>
                
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>
        
                    </div>
            
                    <p class="text-center">or:</p>
            
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" 
                        name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Digite seu nome" autofocus />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
        
            
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                       
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Digite seu email" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
            
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                        name="password" required autocomplete="new-password" placeholder="Digite seu password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
            
                    <!-- Repeat Password input -->
                    <div class="form-outline mb-4">
                        
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation"
                        placeholder="Confirma seu password "
                         required autocomplete="new-password" />
                    
                    </div>
            
                    <!-- Checkbox -->
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
                                {{ __('Register') }}
                            </button>  
                        </div>
                    </div>
            
                <!-- Register buttons -->
                <div class="text-center">
                    <p>Já Sou Membro! <a href="{{url('login')}}" style="text-decoration: none; color:hsl(353, 100%, 78%);">Login</a></p>
                </div>
       
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
