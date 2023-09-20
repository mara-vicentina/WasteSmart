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
        $('#ticket').modal('show');
    }

    if (paramOpenCreateModalTicketMessage) {
        $('#ticket-message').modal('show');
    }

    // if (paramOpenEditModalTicket) {
    //     const button = $('#button-edit-ticket-' + paramOpenEditModalTicket);
    //     button.click();
    // }

    if (paramOpenCreateModalLogin) {
        console.log('aqui',paramOpenCreateModalLogin)
        $('#modal-login').modal('show');
    }

    if (paramOpenCreateModalUsuario) {
        $('#modal-cadastro-usuarios').modal('show');
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

        $('#ticket-message input[name="sector"]').val(ticket.sector);
        $('#ticket-message input[name="subject"]').val(ticket.subject);
        $('#ticket-message input[name="id"]').val(ticket.id);
        $(`#ticket-message select[name="situation"] option[value="${ticket.situation}"]`).prop('selected', true);

        loadTicketMessages(ticket.messages);

        $('#ticket-message').modal('show');
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
        let label = message.user_type == 'user' ? "Usuário" : "Administrador";
        let cardColor = message.user_type == 'user' ? "bg-main-color" : "bg-sec-color";

        $('#ticket-message .messages').append(`<div class="card mt-2">
            <div class="card-header ${cardColor}">
                <p class="m-0 text-white">${label}:  ${message.user_name}</p>
                <p class="m-0 text-white">Data: ${message.created_at_formated}</p>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p class="fs-6">${message.message}</p>
                </blockquote>
            </div>
        </div>`);
    });
}

$('#ticket-message select[name="situation"]').on('change', function(){
    let ticketId = $('#ticket-message input[name="id"]').val();
    let situation = $('#ticket-message select[name="situation"]').val();

    $.post(baseUrl + `/ticket`, {
        '_token': csrfToken,
        '_method': 'PUT',
        'id': ticketId,
        'situation': situation
    }).done(function(data) {
        if (data.success) {
            location.reload();
        }
    });
});

function openFeedback(ticketId) {
console.log(ticketId)
    $('#feedback input[name="id"]').val(ticketId);
    $.get(baseUrl + `/feedback/${ticketId}`).done(function(data){
        console.log(data)
        if (data.feedback) {
            $('#feedback input[name="id_feedback"]').val(data.feedback.id);
            $('#feedback select[name="evaluation"]').val(data.feedback.evaluation);
            $('#feedback select[name="evaluation"]').prop('disabled', true);
            $('#feedback textarea[name="feedback_message"]').val(data.feedback.feedback_message);
            $('#feedback textarea[name="feedback_message"]').prop('disabled', true);
            $('#feedback .send-feedback').css('display', 'none');
            $('#feedback .remove-feedback').css('display', 'block');
            $('#feedback .error-message').text('');
        } else {
            $('#feedback textarea[name="feedback_message"]').val('');
            $('#feedback select[name="evaluation"]').val('1');
            $('#feedback select[name="evaluation"]').prop('disabled', false);
            $('#feedback textarea[name="feedback_message"]').prop('disabled', false);
            $('#feedback .remove-feedback').css('display', 'none');
            $('#feedback .send-feedback').css('display', 'block');
            $('#feedback .error-message').text('');
        }

        $('#feedback').modal('show');
    });
}

function sendFeedback() {

    let ticketId = $('#feedback input[name="id"]').val();
    let message = $('#feedback textarea[name="feedback_message"]').val();
    let evaluation = $('#feedback select[name="evaluation"]').val();

    if (!message) {
        console.log('teste')
        $('#feedback .error-message').text('O campo mensagem do feedback é obrigatório.');
        console.log('teste2')
        return;
    }

    $.post(baseUrl + `/feedback`, {
        '_token': csrfToken,
        'ticket_id': ticketId,
        'evaluation': evaluation,
        'feedback_message': message
    }).done(function(data){
        if (data.success) {
            $('#feedback').modal('hide');
        }
    });
}

function removeFeedback() {
    let feedback_id = $('#feedback input[name="id_feedback"]').val();

    $.post(baseUrl + `/feedback`, {
        '_token': csrfToken,
        '_method': 'DELETE',
        'feedback_id': feedback_id,
    }).done(function(data){
        if (data.success) {
            $('#feedback').modal('hide');
        }
    });
}



