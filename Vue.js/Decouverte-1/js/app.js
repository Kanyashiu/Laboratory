new Vue({

    // Element à ciblé
    el: '#app',

    // Contient les données de notre composant
    data : {
        message : 'Salut tout le monde',
        link : '#',
        success: true,
        cls : 'success',
        persons : ['Jonathan', 'Marion', 'Marine', 'Karim', 'Tony'],
    },

    // Contient nos méthodes
    methods: {
        close: function() {
            this.success = false
        },
        style: function() {
            if(this.success) {
                return {background: '#f00'}
            } else {
                return {background: '#00f'}
            }
        }
    }
})