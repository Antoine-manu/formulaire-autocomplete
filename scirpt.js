new Vue({
    el: '#app',
    data() {
        return {
            info: null,
            search: '',
            city: '',
            cp: '',
            isloading: false
        }
    },
    methods: {
        adressefunction(e) {
            //on prends les données correspondantes a l'adresse sur laquelle on clique 
            let adresse = event.target.textContent
            this.info = null
            this.isloading = false
            //je mets les données reccupérés dans un tableau
            let adresselist = adresse.split(' ')
            //on split les données recuperés dans des variables 
            let town = adresselist.pop()
            let pc = adresselist.pop()
            let street = adresselist.join(' ')
            //j'ecrase les données pour remplacer les bonnes données dans les zones de text
            this.search = street
            this.city = town
            this.cp = pc


        },
        getapi() {
            axios
                //ici on lie l'API 
                .get('https://api-adresse.data.gouv.fr/search/?q=' + this.search)
                .then(response => {
                    this.info = response.data
                    this.isloading = true
                })
        }
    }
})

$(function () {

    let actu = 0
    pagesbase()
    $('#page1').on('click', pagesbase)
    $('#page2').on('click', pagessec)
    $('#page3').on('click', pagesthird)


    function pagesbase() {
        $('#pageinfouser').show();
        $('#pageinfoformation').hide();
        $('#pageinfoelse').hide();
        $('#submit').hide();
        $('#page1').parent().addClass('active')
        $('#page2').parent().removeClass('active')
        $('#page3').parent().removeClass('active')
    }

    function pagessec() {
        $('#pageinfouser').hide();
        $('#pageinfoformation').show();
        $('#pageinfoelse').hide();
        $('#submit').hide();
        $('#page1').parent().removeClass('active')
        $('#page2').parent().addClass('active')
        $('#page3').parent().removeClass('active')
    }

    function pagesthird() {
        $('#pageinfouser').hide();
        $('#pageinfoformation').hide();
        $('#pageinfoelse').show();
        $('#submit').show();
        $('#page1').parent().removeClass('active')
        $('#page2').parent().removeClass('active')
        $('#page3').parent().addClass('active')
    }


})