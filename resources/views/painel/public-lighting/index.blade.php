@extends('painel/template')
 
@section('page-content')
<div class="card m-5 shadow">
    <div class="row">
        <div class="col-md-10 col-sm-7">
            <div class="card-body fs-5 main-color">
                Iluminação Pública
            </div>
        </div>
        <div class="col-md-2 col-sm-5">
            <div class="card-body fs-5">
                <button type="button" class="btn btn-primary custom-button" data-bs-toggle="modal" data-bs-target="#ticket">
                <i data-feather="plus" style="width:19px; height:19px;"></i>    
                Cadastrar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="card mx-5 p-2 shadow overflow-auto custom-card pr-5 py-2">
    <p class="fs-5 sec-color mb-2">Acompanhamento dos Tickets</p>
    <table class="table">
        <thead>
            <tr>
                <th class="col title-head text-left">ID Ticket</th>
                <th class="col title-head text-left">Assunto</th>
                <th class="col title-head text-left">CEP</th>
                <th class="col title-head text-left">Rua</th>
                <th class="col title-head text-left">Número</th>
                <th class="col title-head text-left">Bairro</th>
                <th class="col title-head text-left">Cidade</th>
                <th class="col title-head text-left">Estado</th>
                <th class="col title-head text-left">Situação</th>
                <th class="col title-head text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <td class="col subtitle-list text-left">{{ $ticket->id }}</td>
                <td class="col subtitle-list text-left">{{ $ticket->subject }}</td>
                <td class="col subtitle-list text-left">{{ $ticket->cep }}</td>
                <td class="col subtitle-list text-left">{{ $ticket->street }}</td>
                <td class="col subtitle-list text-left">{{ $ticket->number }}</td>
                <td class="col subtitle-list text-left">{{ $ticket->neighborhood }}</td>
                <td class="col subtitle-list text-left">{{ $ticket->city_name }}</td>
                <td class="col subtitle-list text-left">{{ $ticket->uf }}</td>
                <td class="col subtitle-list text-left">{{ $ticket->situation }}</td>
                <td class="col subtitle-list text-left">
                    <div class="row">
                        <div class="col-6 p-0">
                            <button id="button-see-ticket" class="btn btn-link" onclick="openTicketMessages({{ $ticket->id }})">
                                <i data-feather="message-square" class="d-inline edit-info"></i>
                            </button>
                        </div>
                        <div class="col-6 p-0">
                            <form method="POST" action="{{ url('/ticket') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="{{ $ticket->id }}">
                                <button type="submit" class="btn btn-link">
                                    <i data-feather="trash-2" class="d-inline delete-info"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('painel\ticket', ['sectorId' => 1, 'sectorName' => "Iluminação Pública"])
@include('painel/ticket-messages')
@endsection