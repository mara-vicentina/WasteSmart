<!DOCTYPE html> 
<html lang="pt-br">

@include('head')

    <body>
        @include('landing-page/menu')
        @include('landing-page/inicio')
        @include('landing-page/funcionalidades')
        @include('landing-page/contato')
        @include('landing-page/proposito')
        @include('landing-page/rodape')

        @include('landing-page/modal-login')
        @include('landing-page/modal-cadastro-usuarios')

        @include('js-content')
    </body>
</html>