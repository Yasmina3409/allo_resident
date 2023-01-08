<template>
  <div class="container-fluid min-h-screen flex flex-col items-center justify-center bg-gray-300">
    <div class="flex p-6 rounded-lg shadow-lg bg-white justify-center items-center flex-col w-96">
      <div class="text-center mb-12 items-start">Créez votre annonce</div>

      <div class="form-group mb-8 inline-flex items-center">
        <!-- <img class="w-8 h-8 mr-3" src="../assets/img/icones/titre.png"> -->
        <input type="text"
          class="form-control min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          id="exampleInput124" aria-describedby="emailHelp124" placeholder="Titre" ref="titre" name="titre" />
      </div>
      <input ref="id" type="text" name="id_user"
        class="invisible form-control min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
        v-model="user.user_id" />
      <div class="form-group mb-8 inline-flex items-center">
        <!-- <img class="w-8 h-8 mr-3" src="../assets/img/icones/titre.png"> -->
        <input type="text"
          class="form-control min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          id="exampleInput124" aria-describedby="emailHelp124" placeholder="annonce desitiner à ....." ref="destination"
          name="destination" />
      </div>
      <div class="form-group mb-8 inline-flex items-center">
        <!-- <img class="w-8 h-8 mr-3" src="../assets/img/icones/titre.png"> -->
        <input type="text"
          class="form-control min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          id="exampleInput124" aria-describedby="emailHelp124" placeholder="25/11/2022" ref="date" name="date" />
      </div>
      <div class="form-group mb-8 inline-flex items-center">

        <input type="text"
          class="form-control min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          id="exampleInput124" aria-describedby="emailHelp124" placeholder="exp:à l'amphi" ref="lieu" name="lieu" />
      </div>
      <div class="form-group mb-8 inline-flex items-center">
        <select
          class=" form-control min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          name="L_publication" @change="onChange($event)">
          <option value="">---Catégorie----</option>

          <option value="Annonce">Annonces</option>
          <option value="Animation">Animation</option>
          <option value="Evenement">Evenement</option>
        </select>
      </div>
      <div class="form-group mb-8 inline-flex items-center mr-2">
        <img class="w-8 h-8 mr-3" src="../assets/img/icones/description.png">
        <textarea required rows="3" cols="25"
          class="form-control block min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          id="exampleInput125" placeholder="Description" ref="description" name="description" />
      </div>

      <div class="form-group mb-8 inline-flex items-center">
        <img class="w-8 h-8 mr-3" src="../assets/img/icones/image.png">

        <input class="form-control" ref="image" type="file" name="image" size="chars" accept="image/png, image/jpeg"
          @change="changeImage" />
      </div>

      <div class="content-end">
        <!-- <router-link to="profil"> -->
        <!-- <router-link to="profil"> -->
        <button type="button" @click="save"
          class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
          Ajouter
        </button>
        <!-- </router-link> -->

      </div>

    </div>
  </div>

</template>
<script>
import ApiService2 from '@/service/ApiService2.js';
export default {
  name: "AnnonceformView",
  data() {
    return {
      user: JSON.parse(localStorage.getItem('user')),
      annonce: localStorage.getItem('annonce'),
      annonce_profil: {}
    }
  },

  methods: {
    changeImage() {
      const [file] = this.$refs.image.files;

      console.log(file)
      //if (file) {
      //   this.user.image = URL.createObjectURL(file);
      //   console.log(this.user.image);
      // }
    },
    // computed: {
    //   modified() {
    //     return this.user_old != JSON.stringify(this.user);
    //   }
    // },
    onChange: function (e) {
      this.filtre = e.target.value;
    },
    save() {
      console.log('ça marche')
      //if (!this.modified) return;
      var formData = new FormData();
      const [file] = this.$refs.image.files;
      if (file) {
        formData.append("image", file);
      }
      formData.append("titre", this.$refs.titre.value);
      formData.append("date", this.$refs.date.value);
      formData.append("lieu", this.$refs.lieu.value);
      formData.append("type_annonce", this.filtre);
      formData.append("user_annonce", this.user.user_id);
      formData.append("description_user_annonce", this.user.presentation);
      console.log(this.user.presentation)
      console.log(this.user.pseudo)
      console.log(this.user.user_id)
      console.log(this.filtre)
      formData.append("nom_user_annonce", this.user.pseudo);
      formData.append("image_user_annonce", this.user.image);
      formData.append("description", this.$refs.description.value);
      formData.append("destination", this.$refs.destination.value);
      ApiService2.postForm("saveannonce", formData).then(this.manage);

    },
    manage(results) {

      console.log(results.data)
      if (results.data) {
        this.annonce_profil = results.data;
        console.log(JSON.stringify(this.annonce_profil))
        localStorage.setItem('annonce', JSON.stringify(this.annonce_profil));


        this.$router.replace({ path: '/profiluser' })

      }
    },
  }
}
</script>
<style>

</style>


