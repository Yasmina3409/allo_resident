<template>
  <div class=" mb-5">


    <div class="card-header  ">
      <h4 class="  card-heading  text-lg font-mono font-semibold text-slate-700 text-left ml-2 mb-2"> Ma presentation
      </h4>
      <div class="text-left font-light  ml-2 text-sm"> {{ user.presentation }}</div>
      <!-- <div
        class="text-left link-primary font-normal  text-color_avis text-xs mt-3 text-decoration text-decoration-underline">
        <a href="/Avis">lire les avis</a>
      </div> -->
      <div class="d-flex justify-content-center ">
        <div class="card-body style_annonce mt-3 test">
          <h4
            class="   card-heading  text-lg font-mono font-semibold text-slate-700 text-left mb-2 ml-3 pb-3 mt-2 border-bottom  mr-5">
            Mes
            publications</h4>


          <ProfilHisto></ProfilHisto>


        </div>
      </div>

    </div>




  </div>

</template>

<script>
import ProfilHisto from "@/components/ProfilHisto.vue";

//import MyPubs from '@/components/MyPubs.vue';
export default {
  name: "ProfilOption",
  components: {
    ProfilHisto,
    //  MyPubs,
  },
  data() {
    return {
      image: { backgroundImage: "url(../assets/img/fond10.png)" },
      user: JSON.parse(localStorage.getItem('user')),
      profil_id: JSON.parse(localStorage.getItem('profil_id')),
      annonce: JSON.parse(localStorage.getItem('annonce')),
    };
  },
  methods: {
    changeImage() {

      const [file] = this.$refs.image;
      if (file) {
        this.user.image = URL.createObjectURL(file);
        console.log(this.user.image);
      }
    },
    save() {
      // if (!this.modified) return;
      var formData = new FormData();
      const [file] = this.$refs.image;
      if (file) {
        formData.append("image", file);
      }
    }
  },
  created() {


    if (this.profil_id.description_user_annonce != null) {
      this.user.presentation = this.profil_id.description_user_annonce

      console.log(this.user.image)

    }

    else {
      return
    }
    //   window.location.reload();
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.test {
  height: 600px;
  width: 600px;
  overflow-y: scroll;

}


.style_annonce {

  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: none;
  /* box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%); */
  /* border-radius: 1rem; */


}

.card-header {
  position: relative;
  /* padding: 2rem 2rem; */
  border-bottom: none;
  background-color: white;

  z-index: 2;
}



body {
  font-family: "Signika" !important;
}
</style>
