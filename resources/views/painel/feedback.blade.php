<!-- Modal -->
<div class="modal fade" id="feedback" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="px-4 pt-4">
        <div class="row">
            <div class="col-md-11">
                <h1 class="modal-title fs-4 text-center sec-color">{{ Auth::user()->type === 'admin' ? 'Feedback do Cliente' : 'Feedback do Ticket' }}</h1>
                <p class="fs-6 text-center main-color">Envie suas susgestões, reclamações ou agradecimentos relacionadas a esse ticket ou atendimento</p>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
      </div>
      <div class="modal-body px-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id">
        <div class="row justify-content-center text-center">
            <div class="col-4">
                <div class="mb-3">
                    <i data-feather="smile" class="d-inline text-success"></i>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <i data-feather="meh" class="d-inline text-warning"></i>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <i data-feather="frown" class="d-inline text-danger"></i>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <label class="form-label dark-gray">{{ Auth::user()->type === 'admin' ? 'Avaliação do Usuário:' : 'Sua Avaliação:' }}</label>
                <select class="form-select light-gray mb-3" name="evaluation">
                    <option value="1">Satisfeito</option>
                    <option value="2">Neutro</option>
                    <option value="3">Infeliz</option>
                </select>
            </div>
        </div>
        
        <p class="form-label dark-gray mt-3 mb-0">{{ Auth::user()->type === 'admin' ? 'Feedback do Usuário' : 'Mensagem do feedback:' }}</p>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <textarea rows="3" maxlength="500" class="form-control light-gray" name="feedback_message" placeholder="Insira sua mensagem"></textarea>
                </div>
            </div>
            <div class="col-12">
                <div>
                    <p class="text-danger error-message"></p>
                </div>
            </div>
            <div class="col-4">
                <div class="">
                    <button class="btn btn-primary form-control custom-button send-feedback" onclick="sendFeedback()">Enviar</button>
                </div>
            </div>
        </div>
        @if (Auth::user()->type === 'user')
        <div class="row">
            <div class="col-4">
                <div class="">
                    <input type="hidden" name="id_feedback">
                    <button type="submit" class="btn btn-danger form-control remove-feedback" onclick="removeFeedback()">Remover</button>
                </div>
            </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

