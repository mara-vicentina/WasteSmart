<!-- Modal -->
<div class="modal fade" id="ticket-message" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="px-4 pt-4">
        <div class="row">
            <div class="col-md-11">
                <h1 class="modal-title fs-4 text-center sec-color">Mensagens do Ticket</h1>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
      </div>
      <div class="modal-body px-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label dark-gray">Setor:</label>
                    <input type="text" class="form-control light-gray" name="sector" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label dark-gray">Assunto:</label>
                    <input type="text" class="form-control light-gray" name="subject" disabled>
                </div>
            </div>
        </div>

        @if (Auth::user()->type === 'admin')
            <div class="row">
                <div class="col-6">
                    <label class="form-label dark-gray">Mudar Situação do Ticket:</label>
                    <select class="form-select light-gray mb-3" name="situation">
                        <option value="Aberto">Aberto</option>
                        <option value="Em Andamento">Em Andamento</option>
                        <option value="Fechado">Fechado</option>
                    </select>
                </div>
            </div>
        @endif

        <p class="form-label dark-graymb-0">Mensagens:</p>
        <div class="card px-3 py-3 card-ticket-messages">
            <div class="messages"></div>
        </div>
        
        <p class="form-label dark-gray mt-3 mb-0">Enviar nova mensagem:</p>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <textarea rows="3" maxlength="500" class="form-control light-gray" name="message" placeholder="Insira sua mensagem"></textarea>
                </div>
            </div>
            <div class="col-4">
                <div class="">
                    <button class="btn btn-primary form-control custom-button" onclick="sendTicketMessage()">Enviar</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

