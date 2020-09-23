// On stocke notre instance dans une variable
let vm = new Vue({

    // Element à ciblé
    el: '#app',

    // Contient les données de notre composant
    data : {
        message : 'Salut tout le monde',
        link : '#',
        cls : 'success',
        persons : ['Jonathan', 'Marion', 'Marine', 'Karim', 'Tony'],
    },

    // Contient nos méthodes
    methods: {
        close: function() {
            this.success = false
        },
    }
})