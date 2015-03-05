window.onload = function (){
    document.getElementById('inscription').addEventListener('click', function(){
        document.location.href="?action=subscription";
    });

    document.getElementById('connexion').addEventListener('click', function(){
        document.location.href="?action=login";
    });


    var price = document.getElementById('price');
    var commandQuantity = document.getElementById('commandQuantity');
    var finalPrice = document.getElementById('finalPrice');

    price.innerHTML = 10;

    commandQuantity.change = function(){
        finalPrice.innerHTML = commandQuantity.value * 10;
    }
};