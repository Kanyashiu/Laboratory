// Définitions :
// DOM : https://fr.wikipedia.org/wiki/Document_Object_Model
// CallBack : https://developer.mozilla.org/fr/docs/Glossaire/Fonction_de_rappel


// L'objet app est un module contenant tout mon application Formulaire
let app = {

    // méthode initialiser au lancement de mon application
    init: function() {
        
        // document.getElementById me permet de cibler le formulaire contenu dans mon DOM grâce à son id
        // Documentation : https://developer.mozilla.org/fr/docs/Web/API/Document/getElementById
        let formElement = document.getElementById('login-form');
        
        // addEventListener me permet "d'accrocher" à mon formulaire un écouteur d'évènement
        // précisé dans le 1er argument dans l'exemple ci-dessous c'est l'évènement submit qui va être écouter
        // et quand il va être déclencher, le second argument est un callback qui va déclencher la méthode précisé
        // Documentation : https://developer.mozilla.org/fr/docs/Web/API/EventTarget/addEventListener
        formElement.addEventListener('submit', app.handleSubmit);

    },

    handleSubmit : function(evt) {
        // evt contient des information lié à l'événement déclenché par l'écouteur d'événement
        // cela permet de faire plein de manipulation utile
        // console.log(evt);

        // On récupère les input dans le formulaire avec leur #id
        let usernameInput = document.getElementById('field-username');
        let passwordInput = document.getElementById('field-password');

        let checkUsername = app.handleUsername(usernameInput);
        let checkPassword = app.handlePassword(passwordInput);

        app.cleanErrorMessage();
        
        if (!checkUsername) {
            // Dans le cas d'un formulaire preventDefault est trés utile car il permet
            // d'annuler le comportement par défaut d'un formulaire qui est de recharger la page à sa soumission
            // Documentation : https://developer.mozilla.org/fr/docs/Web/API/Event/preventDefault
            app.errorMessage("Votre identifiant contient moins de 5 caractères");
            evt.preventDefault();
        }

        if (!checkPassword) {
            app.errorMessage("Votre mot de passe n'est pas conforme");
            evt.preventDefault();
        }
    },

    handleUsername : function(usernameElement) {

        if (usernameElement.value.length >= 5) {
            usernameElement.style.borderColor ='#4CAF50';
            usernameElement.style.borderWidth ='5px';
            return true;
        }
        else {
            usernameElement.style.borderColor ='#bc0000';
            usernameElement.style.borderWidth ='5px';
            return false;
        }
    },

    handlePassword : function(passwordElement) {

        // L'objet RegExp contient des méthodes qui permet de décrire un pattern que l'on cherche
        // dans une chaine de caractère
        // Documentation : https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/RegExp
        let regex = new RegExp(/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/, 'gm');

        if (regex.test(passwordElement.value)) {

            // Element.style permet d'affecter le style d'un element dans le dom afin de lui appliquer
            // un nouveau style ou d'en modifier un
            // Documentation : https://developer.mozilla.org/fr/docs/Web/API/HTMLElement/style
            passwordElement.style.borderColor ='#4CAF50';
            passwordElement.style.borderWidth ='5px';
            return true;
        }
        else {
            passwordElement.style.borderColor ='#bc0000';
            passwordElement.style.borderWidth ='5px';
            return false;
        }
    },

    //! FAIRE LES COMMENTAIRES
    errorMessage : function(message) {

        parentDivElement = document.getElementById('errors');

        divElement = document.createElement('div');
        divElement.classList.add("field-error");
        divElement.textContent = message;
        
        parentDivElement.append(divElement);
    },

    cleanErrorMessage : function() {
        
        parentDivElement = document.getElementById('errors');

        parentDivElement.innerHTML = '';

        console.log(parentDivElement);
    }
}

// Cette écouteur d'évenment permet au chargement de la page de lancer la méthode init dans l'objet app
document.addEventListener('DOMContentLoaded', app.init);