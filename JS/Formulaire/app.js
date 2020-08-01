// Définitions :
// DOM : https://fr.wikipedia.org/wiki/Document_Object_Model
// CallBack : https://developer.mozilla.org/fr/docs/Glossaire/Fonction_de_rappel


// L'objet app est un module contenant tout mon application Formulaire
let app = {

    // méthode initialiser au lancement de mon application
    init: function() {
        
        // document.getElementById me permet de cibler le formulaire contenu dans mon DOM grâce à son id
        // Doc : https://developer.mozilla.org/fr/docs/Web/API/Document/getElementById
        let formElement = document.getElementById('login-form');
        
        // addEventListener me permet "d'accrocher" à mon formulaire un écouteur d'évènement
        // précisé dans le 1er argument dans l'exemple ci-dessous c'est l'évènement submit qui va être écouter
        // et quand il va être déclencher, le second argument est un callback qui va déclencher la méthode précisé
        // Doc : https://developer.mozilla.org/fr/docs/Web/API/EventTarget/addEventListener
        formElement.addEventListener('submit', app.handleSubmit);
        
    },

    handleSubmit : function(evt) {
        // evt contient des information lié à l'événement déclenché par l'écouteur d'événement
        // cela permet de faire plein de manipulation utile
        console.log(evt);


        // Dans le cas d'un formulaire preventDefault est trés utile car il permet
        // d'annuler le comportement par défaut d'un formulaire qui est de recharger la page à sa soumission
        //! Doc :
        evt.preventDefault();
    },
}

// Cette écouteur d'évenment permet au chargement de la page de lancer la méthode init dans l'objet app
document.addEventListener('DOMContentLoaded', app.init);