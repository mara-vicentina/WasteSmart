$(document).ready(function() {
    let currentUrl = new URL(window.location.href);

    let paramOpenCreateModalTicket = currentUrl.searchParams.get("open_create_modal_ticket");
    // let paramOpenEditModalTicket = currentUrl.searchParams.get("open_edit_modal_ticket");

    let paramOpenCreateModalLogin = currentUrl.searchParams.get("open_create_modal_login");
    let paramOpenCreateModalUsuario = currentUrl.searchParams.get("open_create_modal_usuario");

    if (paramOpenCreateModalTicket) {
        const modal = new bootstrap.Modal($('#ticket'), {});
        modal.show();
    }

    // if (paramOpenEditModalTicket) {
    //     const button = $('#button-edit-ticket-' + paramOpenEditModalTicket);
    //     button.click();
    // }

    if (paramOpenCreateModalLogin) {
        const modal = new bootstrap.Modal($('#modal-login'), {});
        modal.show();
    }

    if (paramOpenCreateModalUsuario) {
        const modal = new bootstrap.Modal($('#modal-cadastro-usuarios'), {});
        modal.show();
    }

});

// function editClient(clienteId, data) {
//     data = JSON.parse(data);
//     $('#edicao-clientes input[name="client_id"]').val(clienteId);
//     $('#edicao-clientes input[name="nome_completo"]').val(data.name);
//     $('#edicao-clientes input[name="email"]').val(data.email);
//     $('#edicao-clientes input[name="cpf"]').val(data.cpf);
//     $('#edicao-clientes input[name="telefone"]').val(data.phone);
//     $('#edicao-clientes input[name="cep"]').val(data.cep);
//     $('#edicao-clientes input[name="rua"]').val(data.street);
//     $('#edicao-clientes input[name="numero"]').val(data.number);
//     $('#edicao-clientes input[name="complemento"]').val(data.complement);
//     $('#edicao-clientes input[name="bairro"]').val(data.neighborhood);
//     $('#edicao-clientes input[name="cidade"]').val(data.city);
//     $('#edicao-clientes input[name="estado"]').val(data.state);

//     const modalEdicao = new bootstrap.Modal($('#edicao-clientes'), {});
//     modalEdicao.show();
// }