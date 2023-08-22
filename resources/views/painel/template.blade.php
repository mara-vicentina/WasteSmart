<!DOCTYPE html>
<html lang="pt-br">
    
    @include('head')

    <body>
        <div class="container-fluid g-0 overflow-hidden">
            <div class="row g-0">
                <div class="col-md-4 col-lg-3 col-xs-4 col-sm-4 custom-height">
                    @include('painel/sidebar/sidebar')
                </div>
                <div class="col-md-8 col-lg-9 col-xs-8 col-sm-8 custom-height">
                    <div class="row flex-nowrap g-0 bg-light w-100">
                        <div class="col-12">
                            <div class="min-vh-100 d-flex flex-column">
                                <div class="col-12">
                                    <div class="card rounded-0 border-0 shadow-sm">
                                        <div class="card-body fs-5 main-color">
                                            Olá, {{ Auth::user()->name }}.
                                        </div>
                                    </div>
                            
                                    @yield('page-content')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('js-content')
    </body>
</html>