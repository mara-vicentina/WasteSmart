<section id="contact" class="section-contact bg-body-tertiary">
    <div class="container-fluid">
        <div class="container py-5">
        <div class="row row-cols-1 g-4">
                <div class="col-12">
                    <p class="text-center main-color fs-2 m-0 fw-bold">Contato</p>
                    <p class="text-center main-color fs-5 pt-0 mt-3">Entre em contato conosco para receber atendimento personalizado e solucionar todas as suas dúvidas.</p>
                </div>
                <div class="col-12 mt-0">
                    <form method="" action="" class="w-50 form-contact">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="mb-2">
                            <label for="nome_completo" class="form-label mb-1 sec-color">Nome Completo</label>
                            <input type="text" class="form-control sec-color" id="nome_completo" name="nome_completo" placeholder="Insira seu nome completo">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label mb-1 sec-color">E-mail</label>
                            <input type="email" class="form-control sec-color" id="email" name="email" placeholder="Insira seu e-mail">
                        </div>
                        <div class="mb-2">
                            <label for="telefone" class="form-label mb-1 sec-color">Telefone</label>
                            <input type="text" pattern="^[0-9\s\(\)\-\+]{6,25}$" placeholder="Insira seu telefone" maxlength="25" class="form-control sec-color" id="telefone" name="telefone">
                        </div>
                        <div class="mb-2">
                            <label for="mensagem" class="form-label mb-1 sec-color">Mensagem</label>
                            <textarea placeholder="Mensagem" rows="1" maxlength="500" class="form-control sec-color text-area-contact" name="mensagem" id="mensagem"></textarea>
                        </div>
                        <div class="mt-3 mb-3">
                            <button type="submit" class="btn btn-primary form-control custom-button-change">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
