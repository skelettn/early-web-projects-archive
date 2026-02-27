/**
 * Met à jour le modal avec les informations
 *
 * @param {Object} data - Informations du modal
 *
 * @returns {void}
 */
export function updateModalContent(data) {
    $('#modal-title').text(data.name);
    $('#modal-description').text(data.description);
    $('#paquet-id-input').val(data.idPacket);

    var keywordsContainer = $('#keys');
    keywordsContainer.empty();

    if (data.keywords && data.keywords.length > 0) {
        $.each(data.keywords, function (index, keyword) {
            var span = $('<strong></strong>').addClass('key').attr('id', 'modal-key' + (index + 1)).text(keyword.word);
            keywordsContainer.append(span);
        });
    }

    var flashcardsTable = $('#flashcards-table');
    flashcardsTable.empty();

    if (data.flashcards && data.flashcards.length > 0) {
        $.each(data.flashcards, function (index, flashcard) {
            var divFlashcards = $('<div>').addClass('flashcard');
            var divQuestion = $('<div>').addClass('question').text(flashcard.question);
            var divAnswer = $('<div>').addClass('answer');
            var divContent = $('<div>').addClass('content show').text(flashcard.answer);
            var divActions = $('<div>').addClass('import-actions');
            var divAction = $('<div>').addClass('action');
            var inputAction = $('<input>').attr({
                'type': 'checkbox',
                'name': 'flashcardCheckbox[]',
                'value': flashcard.idFlashCard,
                'id': 'flashcardCheckbox' + (index + 1)
            });

            divAnswer.append(divContent);
            divFlashcards.append(divQuestion, divAnswer, divActions.append(divAction.append(inputAction)));
            flashcardsTable.append(divFlashcards);
        });
    }

    var userPackets = data.userPackets;
    var titlePaquetUser = $('#user-paquet');
    titlePaquetUser.empty();

    if (userPackets && userPackets.length > 0) {
        $.each(userPackets, function (index, userPacket) {
            var option = $('<option>').attr('value', userPacket.idPacket).text(userPacket.name);
            titlePaquetUser.append(option);
        });
    }
}

/**
 * Met à jour la recherche avec les nouveaux éléments
 *
 * @param {Object} data - Informations de recherche
 *
 * @returns {void}
 */
export function updateSearch(data) {
    var sidebarContainer = $("#tab-paquets");
    sidebarContainer.empty();

    if (data.length === 0) {
        var noResultElement = $('<span></span>').text('Aucun résultat trouvé');
        sidebarContainer.append(noResultElement);
        return;
    }

    $.each(data, function (index, paquet) {
        var divPaquetSearch = $('<div></div>').addClass('paquet-search');
        var label = $('<label></label>').attr('for', 'paquet-title');
        var image = $('<img></img>').attr({
            'src': 'https://assets.kiju.me/leitlearn/img/icons/search.svg',
            'alt': 'Recherche'
        }).addClass('icon');
        var paquetElement = $('<span></span>').addClass('paquet-title sidebar-item').attr({
            'data-paquet-id': paquet.idPacket,
            'style': 'cursor: pointer'
        }).text(paquet.name);

        label.append(image);
        divPaquetSearch.append(label, paquetElement);
        sidebarContainer.append(divPaquetSearch);

        divPaquetSearch.on('click', function () {
            var paquetId = paquetElement.attr('data-paquet-id');

            $.ajax({
                url: '/public/ajax/getPaquetDetails.php?id=' + paquetId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    updateModalContent(data);

                    var modal = $('#detail-modal');
                    modal.addClass('show');
                },
                error: function (error) {
                    console.error('Erreur lors de la récupération des détails du paquet :', error);
                }
            });
        });
    });
}
