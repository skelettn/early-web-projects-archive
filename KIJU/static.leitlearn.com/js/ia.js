// Leitlearn AI v0.3

$(document).ready(function() {
    
    // Déclaration des constantes
    const ia_open = $(".ia-open");
    const ia = $(".ia-chatbot");
    const ia_hide = $("#ia-hide");

    $('#ai-create-submit').hide();

    /**
     * Gère l'ouverture et la fermeture du modal de Leitlearn AI
     * @param {string} nom - Le nom de la personne à saluer.
     * @throws {Error} Si le nom n'est pas fourni.
     */
    function eventOpeningAI() {
        if (ia_open.length > 0 && ia_hide.length > 0 && ia.length > 0) {
            ia_open.on('click', function() {
                ia.addClass('show');
            });

            ia_hide.on('click', function() {
                ia.removeClass('show');
            });
        }
    }

    /**
     * Gestion de l'animation des messages
     * @param {string} element - Message à animer
     * @throws {Error} Aucun message n'a été fourni
     */
    function animateMessage(element) {
        var message = $(element).text();
        $(element).empty();
        for (var i = 0; i < message.length; i++) {
            $(element).append('<span style="display: none;">' + message[i] + '</span>');
            $(element).find('span:last').delay(50 * i).fadeIn(50);
        }
    }

     /**
     * Création du message
     * @param {string} className - Classe du message
     * @param {boolean} isAI - Si le message est une réponse de l'IA
     * @param {string} text - Contenu du message
     * @throws {Error} Aucun message n'a été fourni
     */
    function createMessage(className, isAI, text) {
        var messageContainer = $('<div>').addClass('message').addClass(className);
        var userSection = $('<div>').addClass('user');
        var profilePictureClass = isAI ? 'profile-picture user-ia' : 'profile-picture';
        var profilePicture = $('<div>').addClass(profilePictureClass);
        userSection.append(profilePicture);
        var contentSection = $('<div>').addClass('content message-animation').text(text);
        messageContainer.append(userSection);
        messageContainer.append(contentSection);
        
        return messageContainer;
    }

    /**
     * Création de la flashcard
     * @param {string} question - Question de la flashcard
     * @param {boolean} answer - Réponse de la flashcard
     * @throws {Error} Une erreur est survenue
     */
    function createFlashcard(question, answer) {
        var messageContainer = $('<div>').addClass('ai-flashcard');
        var questionSection = $('<div>').addClass('ai-flashcard-content').addClass('ai-flashcard-question').text('Question: ' + question);
        var answerSection = $('<div>').addClass('ai-flashcard-content').addClass('ai-flashcard-answer').text('Answer: ' + answer);
    
        messageContainer.append(questionSection, answerSection);
        
        return messageContainer;
    }

    /**
     * Ajoute le message au chat
     * @param {string} messageElement - Message
     * @throws {Error} Aucun message n'a été fourni
     */
    function appendMessageToChat(messageElement) {
        $('.chat').append(messageElement);
        animateMessage(messageElement.find('.content'));
    }

    function appendFlashcardToChat(flashcard) {
        $('.chat').append(flashcard);
    }

    /**
     * Envoie un message en attente de la réponse
     */
    function waitingMessage() {
        var messageText = "...";
        var newMessageAI = createMessage('message-left', true, messageText);
        appendMessageToChat(newMessageAI);
    }

    function errorMessage() {
        var messageText = "Un problème est survenue avec votre demande, merci de recharger la page.";
        var newMessageAI = createMessage('message-left', true, messageText);
        appendMessageToChat(newMessageAI);
    }
    
    // Message d'accueil
    var messageText = "Bienvenue sur Leitlearn AI, indiquez-moi sur quel sujet vous souhaitez obtenir votre paquet (par exemple : Seconde Guerre Mondiale, Fonctions mathématiques...)";
    var newMessageAI = createMessage('message-left', true, messageText);
    appendMessageToChat(newMessageAI);
    
    // Message d'exemple pour l'utilisateur
    $("#ai-request-submit").click(function(event) {
        event.preventDefault();
        var aiRequestValue = $("#ai-request").val();
        var aiRequestNumber = $("#ai-number-requested").val();
        var userMessageText = "Je veux " + aiRequestNumber + " flashcards pour le sujet : " + aiRequestValue;
        var newUserMessage = createMessage('message-right', false, userMessageText);
        appendMessageToChat(newUserMessage);

        $('#ai-input-group').hide();
        $('#ai-request-submit').hide();
        $('#ai-create-submit').show();
        $('#ai-create-submit').prop('disabled', true);

        setTimeout(waitingMessage, 4000);
        // Réponse de l'IA

        var formData = {
            message: aiRequestValue,
            nbFlashcard: aiRequestNumber
        };

        if(aiRequestNumber <= 10) {
            $.ajax({
                type: "POST",  
                url: "/public/ajax/ia.php",
                data: formData,
                success: function(response) {   
                    if (response && response.length > 0) {
                        function displayResponses() {
                            $.each(response, function(index, element) {
                                var flashcard = createFlashcard(element.Question, element.Reponse);
                                appendFlashcardToChat(flashcard);
                                $('#ai-create-submit').prop('disabled', false);
                            });
                        }           
                        setTimeout(displayResponses, 5000);
                    } else {
                        errorMessage();
                    }
                },
            });
        } else {
            errorMessage();
        }
    });

    $("#ai-create-submit").click(function(event){
        var tableFlashcard = [];
        var aiFlashcards = $('[class^="ai-flashcard"]');
    
        aiFlashcards.each(function(index, flashcard){
            var question = $(flashcard).find('.ai-flashcard-question').text().trim();
            var reponse = $(flashcard).find('.ai-flashcard-answer').text().trim();
            question = question.replace('Question:', '').trim();
            reponse = reponse.replace('Answer:', '').trim();
    
            if (question !== "" && reponse !== "") {
                var flashcardObject = {
                    question: question,
                    reponse: reponse
                };
                tableFlashcard.push(flashcardObject);
            }
        });
 
        var inputValue = $("#ai-request").val(); 
        var dataToSend = {
            flashcardsArray: JSON.stringify(tableFlashcard),
            input: inputValue
        };

        $.ajax({
            type: "POST",  
            url: "/public/ajax/import-ai-flashcard.php",
            data: dataToSend,
            success: function(response) {

                window.location.href = "/dashboard";

            },
        });
    });
    
    eventOpeningAI();
});