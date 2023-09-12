@extends('painel/template')
 
@section('page-content')
<div class="card m-5 shadow">
    <div class="row">
        <div class="col-md-9 col-sm-7">
            <div class="card-body fs-5 main-color">
                Dashboard
            </div>
        </div>
        <div class="col-md-3 col-sm-5">
            <div class="card-body fs-5">
            </div>
        </div>
    </div>
</div>

<div class="card mx-5 p-2 shadow overflow-auto custom-card pr-5 py-2">
    <div class="row">
        <div class="col-sm-4 mb-3 mb-sm-0">
        <div class="card border-left-info shadow py-2">
            <div class="card-body">
                <p class="text-xs text-uppercase text-info">Tickets Em Aberto</p>
                <p class="card-text">{{ $aberto }}</p>
            </div>
        </div>
        </div>
        <div class="col-sm-4 mb-3 mb-sm-0">
        <div class="card border-left-warning shadow py-2">
            <div class="card-body">
                <p class="text-xs text-uppercase text-warning">Tickets Em Andamento</p>
                <p class="card-text">{{ $andamento }}</p>
            </div>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="card border-left-success shadow py-2">
            <div class="card-body">
                <p class="text-xs text-uppercase text-success">Tickets Fechados</p>
                <p class="card-text">{{ $fechado }}</p>
            </div>
        </div>
        </div>
    </div>

    <div class="card shadow py-2 px-2 mt-4">
        <p class="fs-5">Dados</p>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Tickets</th>
                    <td>Total</td>
                    <td>Setor</td>
                    <td>Total por setor</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Em Aberto</td>
                    <td>{{ $aberto }}</td>
                    <td>Infraestrutura</td>
                    <td>{{ $setorInfra }}</td>
                </tr>
                <tr>
                    <td>Em Andamento</td>
                    <td>{{ $andamento }}</td>
                    <td>Acessibilidade</td>
                    <td>{{ $setorAccessi }}</td>
                </tr>
                <tr>
                    <td>Fechado</td>
                    <td>{{ $fechado }}</td>
                    <td>Iluminação Pública</td>
                    <td>{{ $setorPublic }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Trânsito e Segurança</td>
                    <td>{{ $setorTraffic }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="card shadow py-2 px-2 mt-4">
        <p class="fs-5">Feedbacks</p>
        <table class="table table-striped table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col">Tickets</th>
                    <th scope="col">Total</th>
                    <th>Setor</th>
                    <th>Total por setor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Em Aberto</td>
                    <td>{{ $aberto }}</td>
                    <td>Infraestrutura</td>
                    <td>{{ $setorInfra }}</td>

                </tr>
                <tr>
                    <td>Em Andamento</td>
                    <td>{{ $andamento }}</td>
                    <td>Acessibilidade</td>
                    <td>{{ $setorAccessi }}</td>
                </tr>
                <tr>
                    <td>Fechado</td>
                    <td>{{ $fechado }}</td>
                    <td>Iluminação Pública</td>
                    <td>{{ $setorPublic }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Trânsito e Segurança</td>
                    <td>{{ $setorTraffic }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection