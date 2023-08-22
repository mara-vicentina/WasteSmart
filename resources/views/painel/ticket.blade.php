<!-- Modal -->
<div class="modal fade" id="ticket" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="px-4 pt-4">
        <div class="row">
            <div class="col-md-11">
                <h1 class="modal-title fs-4 text-center sec-color"">Abertura de Ticket</h1>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
      </div>
      <div class="modal-body px-4">
        <form method="POST" action="{{ url('/client') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-3">
                <label class="form-label dark-gray">Setor</label>
                <input type="text" class="form-control light-gray" name="sector" disabled value="{{ $sectorName }}">
            </div>
            <div class="mb-3">
                <label class="form-label dark-gray">Assunto</label>
                <input type="text" class="form-control light-gray" name="subject" placeholder="Insira o assunto">
            </div>
            <div class="mb-3">
                <label class="form-label dark-gray">Mensagem</label>
                <textarea rows="3" maxlength="500" class="form-control light-gray" name="message" placeholder="Insira sua mensagem"></textarea>
            </div>
            <div class="mb-3">
                <h2 class="fs-5 sec-color">Referente ao local</h2>
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="mb-3">
                        <label class="form-label dark-gray">Endereço</label>
                        <input type="text" class="form-control light-gray" name="street" placeholder="Insira o endereço">
                    </div>
                </div>
                <div class="col-5">
                    <div class="mb-3">
                        <label class="form-label dark-gray">Número</label>
                        <input type="text" class="form-control light-gray" name="number" placeholder="Insira o número">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="mb-3">
                        <label class="form-label dark-gray">Complemento/Referência</label>
                        <input type="text" class="form-control light-gray" name="complement" placeholder="Insira o complemento/referência">
                    </div>
                </div>
                <div class="col-5">
                    <div class="mb-3">
                        <label class="form-label dark-gray">Bairro</label>
                        <input type="text" class="form-control light-gray" name="neighborhood" placeholder="Insira o bairro">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="mb-3">
                        <label class="form-label dark-gray">Cidade</label>
                        <input type="text" class="form-control light-gray" name="city" placeholder="Insira a cidade">
                    </div>
                </div>
                <div class="col-5">
                    <div class="mb-3">
                        <label class="form-label dark-gray">Estado</label>
                        <input type="text" class="form-control light-gray" name="state" placeholder="Insira o estado">
                    </div>
                </div>
            </div>
            <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-primary form-control custom-button">Cadastrar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

