<template>
  <NavComp></NavComp>


  <div class="home min-h-screen   w-100">
    <div class=" w-lg-100  contenant ">

      <!-- margin-bottom: 50px; -->
      <img src='@/assets/img/accueil_application.jpg' style="  
    width: 100%;
    height:400px;
     z-index:-1;
      padding: 0px;
      background-size: cover;
      background-repeat: no-repeat;
     
     " alt="">

    </div>
    <!--  background-image: url( '@/assets/img/accuel_application.png'  ); -->
    <div class="container ">
      <div class="text-xl font-mono font-semibold mt-3 text-slate-700 text-capitalize">
        <p>ça se passe à la résidence :</p>
      </div>
      <div class="d-flex flex-column flex-lg-row justify-content-evenly align-items-center ">
        <select class="text-white indigo  bg-color_allo_blue rounded taille p-2 my-2" name="L_publication"
          @change="onChange($event)">
          <option value="">---Choisir----</option>
          <option value="">Toutes les publications</option>
          <option value="Annonce">Annonces</option>
          <option value="Animation">Animation</option>
          <option value="Evenement">Evenement</option>
        </select>

        <select class="text-white indigo  bg-color_allo_blue rounded taille p-2 " id="liste_genre"
          @change="onChange2($event)">

          <option value="O_decroissant">publication la plus récente</option>
          <option value="O_croissant">publication la plus ancienne </option>

        </select>

      </div>


      <div class="flex justify-center items-center w-full flex-col">
        <div class="publication bg-white flex-col  md:flex-row  md:border-b-0 border-b border-gray-20"
          v-for="annonce in publication  " :key="annonce.id">

          <div class=" RS ">
            <img :src="annonce.image" class=" t_image" />

          </div>

          <div class="LSS pt-1  pr-2 flex flex-col  md:border-l border-gray-50 bg-white ">
            <div class="flex flex-col items-end">

              <button id="profil.id" v-on:click="afficheProfil(annonce)">
                <img class="userimage"
                  :src="annonce.image_user_annonce ? annonce.image_user_annonce : require('@/assets/img/icone.jpg')"
                  alt="" />
              </button>
              <!--  -->
              <div class="profil">{{ annonce.nom_user_annonce }}</div>
              <div class="profil">{{ annonce.type_annonce }}</div>

            </div>
            <div class="top ">
              <div class="text-center fs-3 f_titre c_titre">{{ annonce.titre }}</div>
              <span class="flex flex-col items-center">
                <div class=" text-center font-bold fs-4 f_titre2 c_lieu"> {{ annonce.lieu }} </div>
                <!-- <div class=" font-bold fs-4 f_titre2" v-if='annonce.date != ""'> à </div> -->
                <div class=" font-bold fs-5 f_titre2 c_date"> {{ annonce.date }} </div>
              </span>

            </div>
            <div class="my-2 rating   ">
              <span class="font-bold f_titre "> Presentation de l'evenement</span>
              <router-link to="/affiche" id="profil.id" v-on:click="affichePublication(annonce)">
                <div class=" text-sm f_titre c_description  trunc-txt "> {{
                  annonce.description
                }} </div>
              </router-link>
              <!-- <span>Number of lines: {{ lineCount }}</span>  -->
            </div>



          </div>
        </div>
      </div>

    </div>
  </div>

















  <FooterMain></FooterMain>

</template>

<script>
import NavComp from '@/components/NavComp.vue';
import FooterMain from '@/components/FooterMain.vue';
import ApiService2 from '@/service/ApiService2.js';

//import NavComp from '@/components/NavComp.vue';




export default {
  name: "AccueilView",
  components: {
    // CarouselComp,
    NavComp,
    FooterMain,
  },
  // components: { Modal },
  data() {
    return {
      user: JSON.parse(localStorage.getItem('user')),
      publication: [],
      evenement: [],
      annonces: [],
      annoncesdesc: [],
      annonces_user: [],
      photo_user: [],
      affiches: [],
      image: null,
      image2: null,
      filtre: null,
      filtre2: 'O_decroissant',
      colorful: null,

    };
  },



  methods: {

    async displayAnnonces() {

      ApiService2.get("getannoncedesc").then(this.manageResults);
    }, manageResults(results) {


      console.log(results)
      const annoncesdesc = results.data;

      console.log(annoncesdesc);
      let photo_user = []
      this.annoncesdesc = annoncesdesc

      let annonces_user = [];

      annoncesdesc.forEach((annonce) => {
        photo_user.push(annonce.image_user_annonce);
        //  console.log(photo_user)
        let photo = annonce.image_user_annonce
        //  console.log(photo.length)
        if (photo.length <= 20 && photo.length !== 0) {
          const image2 = "http://localhost/allo_resident/back-end/class/uploads/" + annonce.image_user_annonce
          annonce.image_user_annonce = image2
          annonces_user.push(annonce);
        }

        if (annonce.image == '') {
          annonce.image = "http://localhost/allo_resident/back-end/class/uploads_annonce/image-annonce.png"

          annonces_user.push(annonce)
        }
        else {
          const image = "http://localhost/allo_resident/back-end/class/uploads_annonce/" + annonce.image
          annonce.image = image
          annonces_user.push(annonce);
        }
      })
      this.annonces_user = annonces_user
      this.publication = this.annoncesdesc
      console.log(annonces_user)

      ApiService2.get("getannonce").then(this.manageResults2);
    }, manageResults2(results2) {


      console.log(results2)
      const annonces = results2.data;

      console.log(annonces);
      let photo_user = []
      this.annonces = annonces

      let annonces_user = [];

      annonces.forEach((annonce) => {
        photo_user.push(annonce.image_user_annonce);
        //  console.log(photo_user)
        let photo = annonce.image_user_annonce
        //  console.log(photo.length)
        if (photo.length <= 20 && photo.length !== 0) {
          const image2 = "http://localhost/allo_resident/back-end/class/uploads/" + annonce.image_user_annonce
          annonce.image_user_annonce = image2
          annonces_user.push(annonce);
        }
        // else {
        //   annonces_user.push(annonce);
        // }|| photo.length == 0
        if (annonce.image == '') {
          annonce.image = "http://localhost/allo_resident/back-end/class/uploads_annonce/image-annonce.png"
          // annonce.image_user_annonce = "http://localhost/Allo_resident/back-end/class/uploads/icone.jpg"
          annonces_user.push(annonce)
        }
        else {
          const image = "http://localhost/allo_resident/back-end/class/uploads_annonce/" + annonce.image
          annonce.image = image
          annonces_user.push(annonce);
        }
      })
      this.annonces_user = annonces_user
      // this.publication = annonces_user
      console.log(annonces_user)

    },

    afficheProfil: function (annonce) {
      console.log(annonce)
      localStorage.setItem("profil_id", JSON.stringify(annonce));
      if (this.user != null) {
        this.$router.replace({ path: '/profil' })

      }

      else {
        alert("Veuillez se connceter à l'application");
        console.log("Veuillez se connceter à l'application")
      }
    },
    affichePublication: function (annonce) {
      console.log(annonce)
      localStorage.setItem("affiche", JSON.stringify(annonce));
    },
    onChange: function (e) {
      this.filtre = e.target.value;
      // console.log(this.pub)
      // console.log(this.annonces)
      let evenement = []
      // let affiches = []

      if (this.filtre2 == 'O_decroissant') {

        this.affiches = this.annoncesdesc
        console.log(this.affiches)
        let evenement = []
        this.affiches.forEach((annonce) => {
          console.log(annonce.type_annonce)
          console.log(this.filtre)
          if (this.filtre == annonce.type_annonce) {
            evenement.push(annonce);
          }
        })
        this.evenement = evenement
        console.log(evenement)
        this.publication = evenement
        if (this.filtre == '')
          this.publication = this.annoncesdesc
      }
      else if (this.filtre2 == 'O_croissant') {
        console.log(this.annonces)
        console.log(this.filtre2)
        this.affiches = this.annonces

        console.log(this.affiches)
        this.affiches.forEach((annonce) => {
          console.log(annonce.type_annonce)
          console.log(this.filtre)
          if (this.filtre == annonce.type_annonce) {
            evenement.push(annonce);
          }
        })
        this.evenement = evenement
        console.log(evenement)
        this.publication = evenement
        if (this.filtre == '')
          this.publication = this.annonces
      }
    },

    onChange2: function (e) {
      this.filtre2 = e.target.value;
      console.log(this.filtre2)

      if (this.filtre2 == 'O_croissant') {
        console.log("yes")
        this.publication = this.annonces
        console.log(this.annonces)
      }
      else {
        this.publication = this.annoncesdesc

      }

    }



  },

  created() {
    this.displayAnnonces();
    console.log(this.filtre2)
    this.affiches = this.annoncesdesc
    console.log(this.affiches)

  },
}
</script>

<style>
.trunc-txt {
  width: 320px;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;
  overflow: hidden;
}

.t_image {
  object-fit: fill;
}

.publication {
  transition-duration: 600ms;
  transition-timing-function: ease;
  display: inline-flex;
  justify-content: center;
  align-items: center;

  box-shadow: rgb(50 50 93) 0px 50px 100px -20px, rgb(0 0 0 / 39%) 0px 30px 60px -30px, rgb(10 37 64 / 35%) 0px -2px 6px 0px inset;
  margin: 20px;

}

.publication {
  transition-property: transform;
}

.publication:is(:hover, :focus) {
  transform: scale(1.1);
  /* background-color: cornflowerblue; */
}

.RS {
  display: flex;
  width: 280px;
  height: 280px;
  justify-content: center;
  align-items: center;
  /* border-top-left-radius: 10px;
  border-bottom-left-radius: 10px; */
}

.LSS {
  width: 360px;
  height: 280px;
  /* border-top-right-radius: 10px;
  border-bottom-right-radius: 10px; */
}

.userimg {
  width: 40px;
  height: 40px;
  object-fit: contain;
  border: 1px solid black;
  border-radius: 50%;
  object-fit: cover;
  margin-left: 2%;
}

.profil {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  /* margin-top: 5%; */
  font-size: 0.75rem;
  font-weight: bold;
  font-family: "Signika" !important;
}

.title {
  font-weight: 600;
}

.rating {
  display: flex;
  margin-left: 4%;
  flex-direction: column;


}



.top {
  width: 100%;
  display: flex;
  flex-direction: column;
  z-index: 0;
  margin-top: -10px;
  align-items: center;
}

.test {
  height: 150px;

  overflow-y: scroll;

}

.titre {
  font-size: 0.2em;
}

.content {
  margin-left: auto;
  margin-right: auto;
  width: 60px;
}

.userimage {
  width: 40px;
  height: 40px;

  border-radius: 50%;
  /* object-fit: cover; */
  /* margin-left: 2%; */
}

.card_photo {
  /* height: 380px; */
  background-size: cover;

}


.contenant {
  position: relative;
}

.texte_centrer {
  /* color: red; */
  /* z-index: -2; */
  /* position: absolute; */
  top: 108%;
  /* left: 52%; */
  transform: translate(0%, -1884%);

}

.min-h-screen {
  min-height: 100vh;
}

.min-h-screen2 {
  min-height: 45vh;
}

body {
  margin: 0;
  padding: 0;
}

.page-holder {

  width: 800px;
  height: 600px;

  opacity: 0.33;

}

a:hover {
  text-decoration: none;
}


.f_titre {
  font-family: "Signika" !important;
}

.c_titre {
  color: #A41A3D;
}

.c_date {
  color: #907AE9
}

.c_lieu {
  color: #9D6DA3
}

.f_titre2 {
  font-family: "Satisfy" !important;
}

.c_description {
  color: #2C608C
}
</style>
