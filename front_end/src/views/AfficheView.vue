<template>
  <!-- <NavComp></NavComp> -->


  <div class="home min-h-screen   w-100">

    <div class="container pt-5">


      <div class="flex justify-center items-center w-full flex-col mt-5">
        <div class="publication  flex-col  md:flex-row  md:border-b-0 border-b border-gray-20">

          <div class=" RS ">
            <img :src="affiche.image" class=" t_image" />

          </div>

          <div class="LS p-2 flex flex-col  md:border-l border-gray-50 bg-white ">
            <div class="flex flex-col items-end">


              <img class="userimage"
                :src="affiche.image_user_annonce ? affiche.image_user_annonce : require('@/assets/img/icone.jpg')"
                alt="" />

              <!--  -->
              <div class="profil">{{ affiche.nom_user_annonce }}</div>
              <div class="profil">{{ affiche.type_annonce }}</div>
            </div>
            <div class="top mt-1">
              <div class="text-center fs-3 f_titre c_titre">{{ affiche.titre }}</div>

              <span class="flex flex-col items-center">
                <div class=" font-bold fs-3 f_titre2 c_lieu"> {{ affiche.lieu }} </div>
                <div class=" font-bold fs-3 f_titre2"> à </div>
                <div class=" font-bold fs-4 f_titre2 c_date"> {{ affiche.date }} </div>
              </span>

            </div>
            <div class="my-3 rating mb-3  ">
              <span class="font-bold f_titre"> Presentation de l'evenement</span>
              <div class="pb-5 text-sm f_titre c_description "> {{ affiche.description }} </div>
            </div>



          </div>
        </div>
      </div>

    </div>
    <div class="flex flex-col items-end mr-5 mb-5">

      <router-link to="/">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
          class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
          <path
            d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
        </svg>
      </router-link>

    </div>
  </div>

















  <!-- <FooterMain></FooterMain> -->

</template>

<script>





export default {
  name: "afficheView",
  components: {

  },

  data() {
    return {
      affiche: JSON.parse(localStorage.getItem('affiche')),


    };
  },




}
</script>

<style>
.t_image {
  width: 100%;
  height: 100%;
  object-fit: cover;

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
  width: 360px;
  justify-content: center;
  align-items: center;

}

.LS {
  width: 360px;
  height: 360px;

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





.min-h-screen {

  min-height: 50vh;
}



body {
  margin: 0;
  padding: 0;
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
