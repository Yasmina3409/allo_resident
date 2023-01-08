<template>
  <div class="container-fluid min-h-screen flex flex-col items-center justify-center bg-gray-300">
    <div class="flex p-6 rounded-lg shadow-lg bg-white justify-center items-center flex-col w-96">
      <div class="text-center  items-start">Modifier votre annonce</div>
      <input ref="id" type="text" name="id_user"
        class=" invisible text-base font-normal text-gray-700 bg-white    transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
        v-model="annonce_id.annonce_id" />

      <img @click="$refs.image.click()" class="flex  justify-center items-center mx-5 userimg"
        :src="annonce_id.image ? annonce_id.image : require('@/assets/img/logo_blue.png')">
      <i class="bi bi-camera-fill bg-danger"></i>
      <b-icon icon="camera" font-scale="7.5"></b-icon>
      <i class="fa-sharp fa-solid fa-camera"></i>
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" @click="$refs.image.click()"
        class="bi bi-camera-fill" style="margin-top:-20px;margin-left:150px;" viewBox="0 0 16 16">
        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
        <path
          d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
      </svg>
      <input ref="image" type="file" name="image" size="chars" class="invisible" accept="image/png, image/jpeg"
        @change="changeImage" />
      <div class="form-group mb-8 inline-flex items-center">
        <!-- <img class="w-8 h-8 mr-3" src="../assets/img/icones/titre.png"> -->
        <input type="text"
          class="form-control min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          id="exampleInput124" aria-describedby="emailHelp124" placeholder="Titre" ref="titre" name="titre"
          v-model="annonce_id.titre" />
      </div>
      <div class="form-group mb-8 inline-flex items-center">
        <!-- <img class="w-8 h-8 mr-3" src="../assets/img/icones/titre.png"> -->
        <input type="text"
          class="form-control min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          id="exampleInput124" aria-describedby="emailHelp124" ref="date" name="date" v-model="annonce_id.date" />
      </div>
      <div class="form-group mb-8 inline-flex items-center">
        <!-- <img class="w-8 h-8 mr-3" src="../assets/img/icones/titre.png"> -->
        <input type="text"
          class="form-control min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          id="exampleInput124" aria-describedby="emailHelp124" ref="lieu" name="lieu" v-model="annonce_id.lieu" />
      </div>

      <div class="form-group mb-8 inline-flex items-center">
        <!-- <img class="w-8 h-8 mr-3" src="../assets/img/icones/titre.png"> -->
        <input type="text"
          class="form-control min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          id="exampleInput124" aria-describedby="emailHelp124" placeholder="annonce desitiner à ....." ref="destination"
          name="destination" v-model="annonce_id.destination" />
      </div>



      <div class="form-group mb-8 inline-flex items-center mr-2">
        <img class="w-8 h-8 mr-3" src="../assets/img/icones/description.png">
        <textarea required rows="3" cols="25"
          class="form-control block min-w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:shadow-lg focus:shadow-neutral-400 focus:outline-none"
          id="exampleInput125" placeholder="Description" ref="description" name="description"
          v-model="annonce_id.description" />
      </div>



      <div class="content-end">
        <!-- <router-link to="profil"> -->
        <!-- <router-link to="profil"> -->
        <button type="button" @click="save"
          class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
          enregister
        </button>
        <!-- </router-link> -->

      </div>

    </div>
  </div>

</template>
<script>
import ApiService2 from '@/service/ApiService2.js';
export default {
  name: "AnnoncemodifierView",
  data() {
    return {
      user: JSON.parse(localStorage.getItem('user')),
      annonce_id: JSON.parse(localStorage.getItem('annonce_id')),
      annonce_modifier: localStorage.getItem('annonce_modier'),
      // annonce_profil: {}
    }
  },

  methods: {
    changeImage() {
      const [file] = this.$refs.image.files;

      console.log(file)
      //if (file) {
      this.annonce_id.image = URL.createObjectURL(file);
      //   console.log(this.user.image);
      // }
    },
    // computed: {
    //   modified() {
    //     return this.user_old != JSON.stringify(this.user);
    //   }
    // },

    save() {
      console.log('ça marche')
      //if (!this.modified) return;
      var formData = new FormData();
      const [file] = this.$refs.image.files;
      if (file) {
        formData.append("image", file);
      }
      formData.append("titre", this.$refs.titre.value);
      formData.append("id", this.annonce_id.annonce_id);
      formData.append("date", this.$refs.date.value);
      formData.append("lieu", this.$refs.lieu.value);
      formData.append("description", this.$refs.description.value);
      formData.append("destination", this.$refs.destination.value);
      ApiService2.postForm("editannonce", formData).then(this.manage);

    },
    manage(results) {
      console.log(results.data)
      if (results.data) {

        this.annonce_profil = results.data;
        console.log(JSON.stringify(this.annonce_profil))
        this.$router.replace({ path: '/profiluser' })

      }
    },

  }
}
</script>
<style>
.userimg {
  width: 300px;
  height: 200px;
  object-fit: contain;

  object-fit: cover;

}

li button:after {
  display: flex;
  align-items: center;
  content: "x";
  margin: .25rem .25rem .25rem .75rem;
  padding-left: .4rem;
  border-left: .15rem solid rgb(240, 42, 223);
}
</style>


