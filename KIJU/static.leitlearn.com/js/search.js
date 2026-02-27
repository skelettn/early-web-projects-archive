/*
    * Leitlearn - search.js
    * Gestion de la recherche
*/

import { updateSearch } from './game/paquetsFunctions.js';

$(document).ready(function () {
    var searchInput = $("#search-input");
    var inputRecherche = $("#search-input");
    var divResultat = $("#tab-paquets");

    searchInput.on('input', function () {
        var keyword = searchInput.val();

        $.ajax({
            url: '/public/ajax/searchMarket.php?keyword=' + encodeURIComponent(keyword),
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                updateSearch(data);
            },
            error: function (error) {
                console.error('Erreur lors de la recherche :', error);
            }
        });
    });

    inputRecherche.on('click', function () {
        inputRecherche.addClass('active');
        divResultat.show();
        var keyword = searchInput.val();

        $.ajax({
            url: '/public/ajax/searchMarket.php?keyword=' + encodeURIComponent(keyword),
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                updateSearch(data);
            },
            error: function (error) {
                console.error('Erreur lors de la recherche :', error);
            }
        });
    });
});