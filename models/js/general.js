$(document).ready(function() {
    $('#content').load('content/index.php');

    $('ul#nav li a').click(function() {
        var page = $(this).attr('href');
        $('#content').load('content/' + page + '.php');

        if(page == "index") {
            var ob = document.getElementById("index");
            ob.classList.add("active");

            document.getElementById("usersManager").classList.remove("active");
            document.getElementById("issuesManager").classList.remove("active");
            document.getElementById("ticketOrders").classList.remove("active");
            document.getElementById("shopOrders").classList.remove("active");

            
        }
        
        else if(page == "usersManager") {
            var ob = document.getElementById("usersManager");
            ob.classList.add("active");

            document.getElementById("index").classList.remove("active");
            document.getElementById("issuesManager").classList.remove("active");
            document.getElementById("ticketOrders").classList.remove("active");
            document.getElementById("shopOrders").classList.remove("active");

        } 
        
        else if(page == "issuesManager") {
            var ob = document.getElementById("issuesManager");
            ob.classList.add("active");

            document.getElementById("usersManager").classList.remove("active");
            document.getElementById("index").classList.remove("active");
            document.getElementById("ticketOrders").classList.remove("active");
            document.getElementById("shopOrders").classList.remove("active");

        } 
        
        else if(page == "ticketOrders") {
            var ob = document.getElementById("ticketOrders");
            ob.classList.add("active");

            document.getElementById("usersManager").classList.remove("active");
            document.getElementById("issuesManager").classList.remove("active");
            document.getElementById("index").classList.remove("active");
            document.getElementById("shopOrders").classList.remove("active");


        } 
        else if (page == "shopOrders" ){
            var ob = document.getElementById("shopOrders");
            ob.classList.add("active");

            document.getElementById("usersManager").classList.remove("active");
            document.getElementById("issuesManager").classList.remove("active");
            document.getElementById("ticketOrders").classList.remove("active");
            document.getElementById("index").classList.remove("active");

        }
        
        return false;

    });
});





