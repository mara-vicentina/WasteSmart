var baseUrl = $('meta[name="base-url"]').attr('content');
var csrfToken = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function() {
    let currentUrl = new URL(window.location.href);

    let paramOpenCreateModalTicket = currentUrl.searchParams.get("open_create_modal_ticket");
    let paramOpenCreateModalTicketMessage = currentUrl.searchParams.get("open_create_modal_ticket_message");
    // let paramOpenEditModalTicket = currentUrl.searchParams.get("open_edit_modal_ticket");

    let paramOpenCreateModalLogin = currentUrl.searchParams.get("open_create_modal_login");
    let paramOpenCreateModalUsuario = currentUrl.searchParams.get("open_create_modal_usuario");

    if (paramOpenCreateModalTicket) {
        const modal = new bootstrap.Modal($('#ticket'), {});
        modal.show();
    }

    if (paramOpenCreateModalTicketMessage) {
        const modal = new bootstrap.Modal($('#ticket-message'), {});
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

    if ($('.uf-field').length > 0) {
        $.get(baseUrl + "/states").done(function(states){
            let options = "";
            states.forEach((state) => {
                options += `<option value="${state.uf}">${state.uf}</option>`;
            });

            $('.uf-field').prepend(options);
            $('.uf-field').change();
        });
    }

    $('.uf-field').on('change', () => {
        let ufSelected = $('.uf-field').val();

        $.get(baseUrl + `/cities/${ufSelected}`).done(function(cities){
            let options = "";
            cities.forEach((city) => {
                options += `<option value="${city.id}">${city.name}</option>`;
            });

            $('.city-field').empty();
            $('.city-field').prepend(options);
        });
    });
});

function openTicketMessages(ticketId) {
    $.get(baseUrl + `/ticket/${ticketId}`).done(function(ticket){
        console.log(ticket)

        $('#ticket-message input[name="sector"]').val(ticket.sector);
        $('#ticket-message input[name="subject"]').val(ticket.subject);
        $('#ticket-message input[name="id"]').val(ticket.id);

        loadTicketMessages(ticket.messages);

        const modalTicketMessage = new bootstrap.Modal($('#ticket-message'), {});
        modalTicketMessage.show();
    });
}

function sendTicketMessage() {

    let id = $('#ticket-message input[name="id"]').val();
    let message = $('#ticket-message textarea[name="message"]').val();

    if (!message) {
        return;
    }

    $.post(baseUrl + `/ticket/message`, {
        '_token': csrfToken,
        'id': id,
        'message': message
    }).done(function(data){
        loadTicketMessages(data.messages);
        $('#ticket-message textarea[name="message"]').val('');
    });
}

function loadTicketMessages(messages) {

    $('#ticket-message .messages').empty();

    messages.forEach((message) => {
        $('#ticket-message .messages').append(`<div class="card mt-2">
            <div class="card-header">
                Data: ${message.created_at_formated}
                <br/>
                Usuário:  ${message.user_name}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>${message.message}</p>
                </blockquote>
            </div>
        </div>`);
    });
}