window.onload = function (){
    document.getElementById('inscription').addEventListener('click', function(){
        document.location.href="?action=subscription";
    });

    document.getElementById('connexion').addEventListener('click', function(){
        document.location.href="?action=login";
    });
};