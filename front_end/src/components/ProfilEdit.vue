<template>
  <div>

    <form class="card mb-4">
      <div class="card-header">

        <div class="card-body ">
          <div v-if="user">
            <img @click="$refs.image.click()" class="flex  justify-center items-center mx-5 mt-5 mb-2 userimg"
              :src="user.image ? user.image : require('@/assets/img/icone.jpg')">
            <i class="bi bi-camera-fill bg-danger"></i>
            <b-icon icon="camera" font-scale="7.5"></b-icon>
            <i class="fa-sharp fa-solid fa-camera"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
              @click="$refs.image.click()" class="bi bi-camera-fill" style="margin-top:-20px;margin-left:150px;"
              viewBox="0 0 16 16">
              <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
              <path
                d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
            </svg>
            <input ref="image" type="file" name="image" size="chars" class="invisible" accept="image/png, image/jpeg"
              @change="changeImage" />

            <h3 class="mb-3">{{ user.pseudo }} </h3>


          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <div class="mb-4 d-flex flex-column align-items-start">
                <label class="form-label text-decoration-underline">Pseudo</label>
                <input class=" border-bottom" type="text" placeholder="ex:Mina" name="pseudo" ref="pseudo"
                  v-model="user.pseudo" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-0">
                <!-- Bio visible que par le detenteur du profil -->
                <div class="mb-4 d-flex flex-column align-items-start">


                  <label class="form-label text-decoration-underline">Ma présentation</label>
                  <textarea class="border-bottom w-75 " ref="description" name="description" v-model="user.presentation"
                    placeholder=" ajouter une déscription à votre profil"></textarea>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-end bg-blue-800">
        <!-- <router-link to="profil"> -->

        <!-- <router-link  this.$router.go()to="profil"> -->
        <button class="btn btn-primary bg-bleufonce" type="button" @click="save">
          mettre à jour le profil
        </button>
        <!-- </router-link> -->

      </div>
    </form>
  </div>

</template>

<script>

import ApiService2 from '@/service/ApiService2.js';
export default {
  name: "ProfilEdit",
  data() {
    return {
      user: JSON.parse(localStorage.getItem('user')),

      user_old: localStorage.getItem('user'),
      user_profil: {}
    }
  },

  methods: {

    changeImage() {
      const [file] = this.$refs.image.files;
      console.log(file)
      if (file) {
        this.user.image = URL.createObjectURL(file);
        console.log(this.user.image);
      }
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
      formData.append("pseudo", this.$refs.pseudo.value);
      formData.append("user_id", this.user.user_id);
      //  formData.append("language", this.user.language);
      formData.append("description", this.$refs.description.value);
      ApiService2.postForm("saveprofil", formData).then(this.manage);

    },
    manage(results) {

      if (results.data) {

        this.user_profil = results.data;

        localStorage.setItem('user_test', (this.user_profil));
        localStorage.setItem('user', JSON.stringify(this.user_profil));
        localStorage.setItem('profil_id', JSON.stringify(this.user_profil));

        this.$router.replace({ path: '/profiluser' })
      }
    },
  }
}
</script>

<style scoped>
.card-header:first-child {
  border-radius: calc(1rem - 1px) calc(1rem - 1px) 0 0;
}

.userimg {
  width: 160px;
  height: 160px;
  object-fit: contain;
  border-radius: 50%;
  object-fit: cover;
  margin-left: 2%;
}

.card-header {
  position: relative;
  padding: 2rem 2rem;
  border-bottom: none;
  background-color: white;
  box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
  z-index: 2;
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
  border-radius: 1rem;
}

body {
  font-family: "Poppins" !important;
}
</style>
