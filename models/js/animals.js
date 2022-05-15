$(document).ready(function() {
    $('#animals').load('models/animalsContent/index.php');

    $('div#filter a').click(function() {
        var page = $(this).attr('href');
        $('#animals').load('models/animalsContent/' + page + '.php');


        return false;

    });
});





