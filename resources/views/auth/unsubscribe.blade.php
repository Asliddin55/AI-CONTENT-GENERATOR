@extends('layouts.auth')



@section('content')
    <div class="container-fluid">                
        <div class="row login-background justify-content-center">

            <div class="col-sm-12"> 
                <div class="row justify-content-center subscribe-registration-background">
                    <div class="col-lg-8 col-md-12 col-sm-12 mx-auto">
                        <div class="card-body pt-8">

                            <a class="navbar-brand register-logo" href="{{ url('/') }}"><img id="brand-img"  src="{{ URL::asset('img/brand/logo.png') }}" alt=""></a>
                    
                            <div class="dropdown header-locale" id="frontend-local-login">
                                <a class="icon" data-bs-toggle="dropdown">
                                    <span class="fs-12 mr-4"><i class="fa-solid text-black fs-16 mr-2 fa-globe"></i>{{ ucfirst(Config::get('locale')[App::getLocale()]['code']) }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                                    <div class="local-menu">
                                        @foreach (Config::get('locale') as $lang => $language)
                                            @if ($lang != App::getLocale())
                                                <a href="{{ route('locale', $lang) }}" class="dropdown-item d-flex">
                                                    <div class="text-info"><i class="flag flag-{{ $language['flag'] }} mr-3"></i></div>
                                                    <div>
                                                        <span class="font-weight-normal fs-12">{{ $language['display'] }}</span>
                                                    </div>
                                                </a>                                        
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            <form method="POST" action="{{ route('email.unsubscribe.process', $email) }}" class="subscribe-first-step mt-24" id="registration-form" onsubmit="process()">
                                @csrf                                
                                
                                <h3 class="text-center login-title mb-2 mt-9">{{__('Newsletters Unsubscribe Request')}}</h3>
                                <p class="fs-14 text-muted text-center mb-8">{{ __('Are you sure you want to stop receiving our newsletters?') }}</p>
                                <p class="fs-14 text-muted text-center">{{ __('You are requesting to unsubscribe') }} <span class="font-weight-bold">{{ $email }}</span> {{ __('from receiving further newsletter emails') }}</p>
                                <p class="fs-14 text-muted text-center">{{ __('Please click the unsubscribe button below if it is correct') }}</p>

                                <div class="row">
                                <div class="text-center">
                                    <div class="form-group mt-4">                        
                                        <button type="submit" class="btn btn-cancel ripple font-weight-bold register-continue-button" id="continue">{{ __('Unsubscribe') }}</button>              
                                    </div>                                                                   
                                </div>
                            </form>
                        </div> 
                    </div>      
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        let loading = `<span class="loading">
					<span style="background-color: #fff;"></span>
					<span style="background-color: #fff;"></span>
					<span style="background-color: #fff;"></span>
					</span>`;

        function process() {
            $('#continue').prop('disabled', true);
            let btn = document.getElementById('continue');					
            btn.innerHTML = loading;  
            document.querySelector('#loader-line')?.classList?.remove('hidden'); 
            return; 
        }

    </script>   
@endsection
