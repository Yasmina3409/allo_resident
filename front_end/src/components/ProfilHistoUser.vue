<template>

  <div class=" list-group   taille_police style_font" v-for="annonce in annonces_user " :key="annonce.id">


    <div class="d-flex justify-content-end  ">
      <router-link to="/Annoncemodifier" id="annonce.id" v-on:click="EditAnnonce(annonce)">

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil mr-2"
          viewBox="0 0 16 16">
          <path
            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
        </svg>
      </router-link>


      <button id="annonce.id" v-on:click="DeleteAnnonce(annonce)">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" mr-2 bi bi-trash"
          viewBox="0 0 16 16">
          <path
            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
          <path fill-rule="evenodd"
            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
        </svg>

      </button>
    </div>
    <div class="border-bottom  pr-7">
      <div class="d-flex justify-content-beteween mb-2 ml-2">
        <h6 class="fw-semi-bold text-wrap mr-3 taille_police1  ">Titre de :<br>l'{{
          annonce.type_annonce
        }}&nbsp;&nbsp;
        </h6>
        <h2 class="fw-bold fs-5 ">{{ annonce.titre }}</h2>
      </div>


      <div class=" d-flex justify-content-end mr-1">
        <h6 class="fw-semi-bold  mr-3 taille_police1  ml-1">Date de l'{{ annonce.type_annonce }}:
        </h6>
        <small class=" font-semibold
    text-color_allo_blue   text-decoration  taille_police1 text-decoration-underline ">{{
      annonce.date
    }}</small>
      </div>
      <div class=" d-flex justify-content-end mr-1 ">
        <h6 class="fw-semi-bold text-wrap mr-3 taille_police1 "> Lieu de la publication :</h6>
        <small class=" font-semibold
    text-color_allo_blue   text-decoration text-md taille_police1 text-decoration-underline ">{{
      annonce.lieu
    }}</small>
      </div>
      <div class=" d-flex justify-content-end mr-2 mb-2">
        <h6 class="fw-semi-bold text-wrap mr-3 taille_police1  "> Type de publication :</h6>
        <small class=" font-semibold
    text-color_allo_blue   text-decoration text-decoration-underline taille_police1">{{
      annonce.type_annonce
    }}</small>
      </div>
    </div>


  </div>


</template>
  

<script>


//importing bootstrap 5 Modules

import ApiService2 from '@/service/ApiService2.js';
// import ProfilHisto from "@/components/ProfilHisto.vue";








export default {
  name: 'ProfilHistoUser',
  components: {

  },
  data() {
    return {

      user: JSON.parse(localStorage.getItem('user')),
      profil_id: JSON.parse(localStorage.getItem('profil_id')),
      //  annonces_user: JSON.parse(localStorage.getItem('annonces_user')),
      annonces_user: [],
      annonce_id: localStorage.getItem("annonce_id"),
      image: null,
      id: null,



    };
  },
  methods: {
    async displayannonces() {
      ApiService2.search("getannonce").then(this.manageResults);
    }, manageResults(results) {
      //console.log(results.data[0]);
      const annonces = results.data;
      // console.log(this.user.user_id)
      let annonces_user = [];

      annonces.forEach((annonce) => {
        // console.log(annonce);
        console.log(annonce.user_annonce);
        console.log(this.user.user_id);

        if (this.user.user_id == annonce.user_annonce) { this.id = this.user.user_id; }


        if (annonce.user_annonce == this.id) {
          if (annonce.image == '') {
            const image = "https://bhaj.fr/allo_resident/back-end/class/uploads_annonce/image-annonce.png"
            annonce.image = image
            annonces_user.push(annonce)
          }
          else {


            const image = "https://bhaj.fr/allo_resident/back-end/class/uploads_annonce/" + annonce.image
            console.log(image)
            annonce.image = image
            console.log(annonce.image)
            annonces_user.push(annonce);
            console.log(annonces_user);
          }
        }
      })
      console.log(annonces_user);


      this.annonces_user = annonces_user


    },


    EditAnnonce: function (annonce) {

      console.log(annonce)
      localStorage.setItem("annonce_id", JSON.stringify(annonce));
      // var string_a_stocker = JSON.strinfify(article);
      // console.log(string_a_stocker)



    },
    DeleteAnnonce: function (annonce) {

      // console.log(annonce)
      // console.log(annonce.annonce_id)
      var formData = new FormData();
      formData.append("annonce_id", annonce.annonce_id);
      ApiService2.postForm("deleteannonce", formData).then(this.manage);

    },
    manage(results) {
      console.log(results)
      window.location.reload();



    },



  },
  created() {
    this.displayannonces();
    //  
  },
}

</script>
  <!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped
>
.large {
  width: 360px;
}

.taille_police {
  font-size: 0.75em;
}

.taille_police1 {
  font-size: 1.25em;
}

.card {

  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: blue;

  border: none;


}

.style_font {
  font-family: "Signika" !important;
}

.affichage {
  display: flex;
  flex-direction: column;
}










.text-muted {
  color: #6c757d !important;
}


a {
  cursor: pointer;
}

img {
  vertical-align: middle;
}
</style>