var reponse = document.querySelector('#reponse');

var connexion ={};
var load = {};
var cookie = document.cookie;


        function getCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');

                for(var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                        }
                }
                return "";
        };

        function checkCookie() {
                var user = getCookie("User");
                if (user != "") {
                        window.location.replace('index.php');
                }
                else{
                        reponse.innerText ='accès refusé' ;
                }
        };


load.resetCookie = function() {
                var user = getCookie("User");
                if (user != "") {
                        document.cookie = "User=; ";
                }
        };


connexion.start = function()
{
    var listeSelection = document.querySelectorAll('form.ajax');
    listeSelection.forEach(function(balise)
    {
            balise.addEventListener('submit',connexion.cbAjax); //cb = call back
    });

}

connexion.cbAjax = function (event)
{
    event.preventDefault();

    var formulaire = event.target;
    var formData = new FormData(formulaire);
    fetch('api.php',{
            method: 'POST',
            body: formData
    })
    
    .then(checkCookie)
}
