
<!-- Modal -->
<div class="modal fade" id="modal-cadastro-usuarios" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="px-4 pt-4">
        <div class="row">
            <div class="col-md-11">
                <h1 class="modal-title fs-5 text-center main-color" id="exampleModalLabel">Cadastre-se</h1>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
      </div>
      <div class="modal-body px-4">
        <form method="POST" action="{{ url('/user') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mb-3">
              <label for="nome_completo" class="form-label dark-gray">Nome Completo</label>
              <input type="text" class="form-control light-gray" id="full_name" name="full_name" placeholder="Insira o nome completo">
            </div>
            <div class="row">
                <div class="col-7">
                  <div class="mb-3">
                    <label class="form-label dark-gray">CPF</label>
                    <input type="text" class="form-control light-gray" name="cpf" placeholder="Insira o CPF">
                  </div>
                </div>
                <div class="col-5">
                  <div class="mb-3">
                    <label for="telefone" class="form-label dark-gray">Telefone</label>
                    <input type="text" pattern="^[0-9\s\(\)\-\+]{6,25}$" placeholder="Insira o telefone" maxlength="25" class="form-control light-gray" id="phone" name="phone">
                  </div>
                </div>
            </div>
            <div class="mb-3">
                <h2 class="fs-5 sec-color">Endereço</h2>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label dark-gray">CEP</label>
                        <input type="text" class="form-control light-gray" name="cep" placeholder="Insira o CEP">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label dark-gray">Rua</label>
                        <input type="text" class="form-control light-gray" name="street" placeholder="Insira a rua">
                    </div>
                </div>
                <div class="col-4">
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
                <div class="col-3">
                    <div class="mb-3">
                        <label class="form-label dark-gray">Estado</label>
                        <select class="form-select light-gray uf-field" name="state" placeholder="Insira o estado"></select>
                    </div>
                </div>
                <div class="col-9">
                    <div class="mb-3">
                        <label class="form-label dark-gray">Cidade</label>
                        <select class="form-select light-gray city-field" name="city" placeholder="Insira a cidade"></select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label dark-gray">E-mail</label>
                <input type="email" class="form-control light-gray" id="email" name="email" placeholder="Insira seu e-mail">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="senha" class="form-label dark-gray">Senha</label>
                        <input type="password" class="form-control light-gray" id="password" name="password" placeholder="Insira sua senha">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="confirmacao_senha" class="form-label dark-gray">Confirmação de Senha</label>
                        <input type="password" class="form-control light-gray" id="password_confirm" name="password_confirm" placeholder="Confirme sua senha">
                    </div>
                </div>
            </div>

            @include('alerts/error-message')
            @include('alerts/error-validation')

            <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-primary form-control custom-button-change">Cadastrar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

