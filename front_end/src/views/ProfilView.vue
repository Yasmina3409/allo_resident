
<template>


  <NavComp></NavComp>


  <div class=" min-h-screen bg-gray-100" style="
      background-image: url(https://img.freepik.com/free-vector/white-abstract-background_23-2148804712.jpg?w=2000);
      margin: 0;
      padding: 0;
      background-size: cover;
      background-repeat: no-repeat;
     ">


    <div class="container-fluid px-lg-4 px-xl-5 contentDiv">

      <!-- Page Header-->

      <section>
        <!-- cadre profil -->
        <div class="row d-flex justify-content-center">
          <div class="col-lg-4 mt-5">


            <div class="card card-profile  contenant mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <div class="ml-3 py-3">
                  <h1 class="  font-bold"> {{ this.user.pseudo }} </h1>
                </div>
              </div>

              <img class="card_photo  mb-5  " :src="this.user.image ? user.image : require('@/assets/img/icone.jpg')"
                alt="Jassa Rich" />
              <!-- v-if='email ===""' -->
              <div class="d_bouton">

                <router-link to="profil2" v-if='user.user_id == profil_id.user_annonce || user.role == "superviseur"'>
                  <button id=""
                    class="   w-100 p-2 mt-2  font-medium text-black rounded bg-gray-100 border border-dark ">Mondifier
                    mon profil
                  </button>
                </router-link>

                <router-link to="annonceform"
                  v-if='user.user_id == profil_id.user_annonce || user.role == "superviseur"'>
                  <button id=""
                    class="   w-100 p-2 my-2   font-medium text-black rounded bg-gray-100 border border-dark ">Ajouter
                    une annonce

                  </button>
                </router-link>
              </div>


            </div>

          </div>
          <!-- colone de droite -->
          <div class="col-lg-5  mt-5 ">
            <ProfilOption></ProfilOption>
          </div>
        </div>
      </section>
      <section>
      </section>
    </div>
  </div>
</template>


<script>


//importing bootstrap 5 Modules
import "bootstrap/dist/css/bootstrap.min.css";
import NavComp from '@/components/NavComp.vue';

import ProfilOption from "@/components/ProfilOption.vue";









export default {
  name: 'ProfilView',
  components: {

    ProfilOption,
    // ProfilHisto,
    NavComp,
    // MyPubs,
    //   FooterMain
  },
  data() {
    return {

      admin: null,
      user: JSON.parse(localStorage.getItem('user')),
      profil_id: JSON.parse(localStorage.getItem('profil_id')),
      image: null,
      componentKey: 0,
      showmenu: false,
      isLoggedIn: localStorage.getItem("isLoggedIn") == "true",
      nav: [
        { id: 3, name: "deconnexion", click: this.logout },
      ]
    };
  },
  methods: {





    // },
  },
  created() {

    this.image = this.profil_id.image_user_annonce
    // console.log(this.profil_id.image_user_annonce)
    // console.log(this.profil_id.nom_user_annonce)
    if (this.profil_id.image_user_annonce != null) {
      this.user.image = this.profil_id.image_user_annonce
      console.log(this.user.image)
      this.user.pseudo = this.profil_id.nom_user_annonce
      console.log(this.user.pseudo)
    }

    else {
      return
    }
    if (this.user.user_id === this.profil_id.user_annonce) { this.admin == "true" }
    else { this.admin = "false" }
    //   window.location.reload();
  },
}

</script>


<style scoped>
.min-h-screen {
  min-height: 100vh;
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: none;
  box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%);
  border-radius: 0rem;
}

.contenant {
  position: relative;
}

.d_bouton {
  display: flex;
  justify-content: space-around;

}

.card_photo {

  height: 380px;
  background-size: cover;

}



.bg-gray-100 {
  background-color: #f8f9fa !important;
}

body {
  font-family: "Signika" !important;
}






a {
  cursor: pointer;
}



img,
svg {
  vertical-align: middle;
}


.page-heading {
  text-transform: uppercase;
  letter-spacing: 0.2em;
  font-weight: 300;
}

.contentDiv {
  padding-top: 4rem;
}
</style>