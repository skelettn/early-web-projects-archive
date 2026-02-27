/*
    * Leitlearn - main.js
    * Gestion des éléments visuels du site, incluant les animations
*/

import { setupScrollMenu } from './base/utils.js';
import { changeCard, flipCard } from './game/gameFunctions.js';

$(document).ready(function() {
    //////////// Déclaration des constantes

    // Gestion du bouton de redirection vers le haut
    const $btnRedirection = $(".redirect");

    // Gestion des subsidebars
    const $subsidebarsBtns = $(".subsidebar-btn");
    const $subsidebars = $(".subsidebar");
    const $sidebar = $(".sidebar");

    // Gestion des modals
    const $modalBtns = $(".modal-btn");
    const $modals = $(".modal");
    const $closeBtns = $(".modal-close");

    // Gestion des fenêtres
    const $tabButtons = $(".switch-tab");
    const $tabs = $(".tab");

    // Gestion de l'ouverture de la sidebar du dashboard
    var $openSidebarButton = $('.open-sidebar');
    var $dashboardSidebar = $('.dashboard-sidebar');

    // Gestion des constantes de l'affichage de la flashcard sur la visualisation du dashboard
    let currentCardIndex = 0;
    const $cards = $('.game .card');
    const $progressBar = $('#progressBar');

    // Gestion de l'édition des flashcards
    const edit_flashcard_btn  = $(".edit-flashcard-btn");

    //////////// Déclaration des constantes

    //////////// Gestion de la redirection des pages
    $('.page-redirect[data-redirection]').on('click', function() {
        const redirectionURL = $(this).data('redirection');
        window.location.href = redirectionURL;
    });

    //////////// Sidebar (OK)
    $subsidebarsBtns.on("click", function() {
        const subsidebarId = $(this).data("subsidebar");
        const $subsidebar = $("#" + subsidebarId);

        $subsidebars.removeClass("show");

        if ($(this).hasClass("return-btn")) {
            $(this).removeClass("return-btn");
            $subsidebar.removeClass("show");
            $sidebar.removeClass("subsi-active");
        } else {
            $(this).addClass("return-btn");
            $subsidebar.addClass("show");
            $sidebar.addClass("subsi-active");
        }
    });

    //////////// Modals (Ok)
    $modalBtns.on("click", function() {
        const modalId = $(this).data("modal");
        const $modal = $("#" + modalId);

        $modals.removeClass("show");
        $modal.addClass("show");
    });

    $closeBtns.on("click", function() {
        const index = $closeBtns.index(this);
        $modals.eq(index).removeClass("show");
    });

    $(window).on("click", function(event) {
        $modals.each(function() {
            if ($(event.target).is($(this))) {
                $(this).removeClass("show");
            }
        });
    });

    //////////// Tabs (Ok)
    $tabButtons.on("click", function() {
        $tabButtons.removeClass("active");
        $tabs.hide();

        $(this).addClass("active");

        const targetTabId = $(this).data("tab");
        const $targetTab = $("#" + targetTabId);

        if (targetTabId === "detail-tab-flashcards" || targetTabId === "dashboard-flashcards-tab") {
            $targetTab.show();
        } else {
            $targetTab.css("display", "flex");
        }
    });

    //////////// Redirection vers le haut (Ok)
    $(document).on("click", ".redirect", function() {
        $("html, body").animate({
            scrollTop: 0
        }, "smooth");
    });

    $(document).on("scroll", function() {
        if ($(window).scrollTop() > 50) {
            $btnRedirection.addClass("show");
        } else {
            $btnRedirection.removeClass("show");
        }
    });

    $('.scroll-menu').each(function() {
        setupScrollMenu($(this));
    });

    //////////// Sidebar du dashboard (Erreur)
    if ($openSidebarButton.length && $dashboardSidebar.length) {
        $openSidebarButton.on('click', function() {
            if ($dashboardSidebar.hasClass('hidden')) {
                $dashboardSidebar.css('marginLeft', '0');
                $dashboardSidebar.removeClass('hidden');
            } else {
                $dashboardSidebar.css('marginLeft', '-100%');
                $dashboardSidebar.addClass('hidden');
            }
        });
    }

      //////////// Gestion du changement de carte (Ok)
    $('.change-card').on('click', function() {
        const index = $(this).data("change-card");
        changeCard($cards, currentCardIndex, $progressBar, index);
        currentCardIndex++;
    });

    //////////// Gestion du retournement de carte (Ok)
    $('.flipped-card').on('click', function() {
        flipCard(this);
    });

    //////////// Affichage des flashcard avec le bouton (Ok)
    $('.show-btn').on('click', function() {
        $(this).closest('.flashcard').find('.content').toggleClass('show');
    });

    //////////// Edition des flashcards (Ok)
    edit_flashcard_btn.click(function(event) {
        const flashcardId = $(this).data("flashcard-id");
        const flashcardDiv = $('.flashcard').filter(function() {
            return $(this).data("flashcard-id") === flashcardId;
        });

        const form = flashcardDiv.find('form[action="../modify-flashcard"]');
        const flashcard_actions = flashcardDiv.find('.actions');
        const question = flashcardDiv.find('.question').text();
        const answer = flashcardDiv.find('.answer .content').text();
        const saveButton = $('<button>', { class: 'action done-flashcard-btn' });
        const saveSpan = $('<span>', { class: 'material-symbols-rounded done-btn save',text : 'done'});
        const cancelButton = $('<button>', { class: 'action cancel-flashcard-btn',type:'button' });
        const cancelSpan = $('<span>', { class: 'material-symbols-rounded cancel-btn cancel', text: 'cancel' });
        const inputQuestion = $('<input>', { type: 'text', class: 'question-input', value: question,name:'newQuestion' });
        const inputAnswer = $('<input>', { type: 'text', class: 'answer-input', value: answer,name:'newAnswer' });

        $(this).hide();

        saveButton.append(saveSpan);
        saveButton.appendTo(flashcard_actions);
        cancelButton.append(cancelSpan);
        cancelButton.appendTo(flashcard_actions);

        flashcardDiv.find('.question').replaceWith(inputQuestion);
        flashcardDiv.find('.answer').replaceWith(inputAnswer);

        cancelButton.click(function() {
            location.reload();
        });
    });

});