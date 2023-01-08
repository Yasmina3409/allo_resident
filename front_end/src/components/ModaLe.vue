<template>
  <div class="bloc-modale" v-if="revele">
    <div class="overlay" v-on:click="toggleModale"></div>

    <div class="modale card">
      <div v-on:click="toggleModale" class="btn-modale btn btn-danger">X</div>

      <div class="flex flex-col mb-6">
        <label for="email" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Pseudo_Admin:</label>
        <div class="relative">
          <input type="text" ref="pseudo_admin" placeholder="Admin" name="pseudo_admin"
            class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-bleufonce" />
        </div>
      </div>
      <div class="flex flex-col mb-6">
        <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Mot de passe:</label>
        <div class="relative">
          <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
            <span>
              <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path
                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </span>
          </div>

          <input type="password" ref="password" placeholder="Mot de passe" name="password"
            class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-bleufonce" />

        </div>
      </div>
      <button class="btn btn-primary bg-bleufonce" type="button" @click="LoginAdmin">
        Login
      </button>
    </div>
  </div>
</template>


<script>
import ApiService2 from '@/service/ApiService2.js';
export default {
  name: "ModaLe",
  props: ["revele", "toggleModale"],
  data() {
    return {


      Admin: null,
      pwd: null,

    };
  },
  methods: {

    LoginAdmin() {
      // console.log(this.$refs.pseudo_admin.value)
      // console.log(this.$refs.password.value)

      ApiService2.search("loginadmin", { "admin_pseudo": this.$refs.pseudo_admin.value, "password": this.$refs.password.value }).then(this.manageResults);
    }, manageResults(results) {
      const id = results.data['admin_id']
      if (results.data["token"] && id) {

        localStorage.setItem("ADMIN", results.data["token"]);
        console.log(results.data["token"]);
        this.$router.replace({ path: '/inscription' })
        return;
      }
      else {

        alert("espace résevé à l'administration");
      }

    },
  }

}
</script>


<style scoped>
.bloc-modale {
  position: fixed;
  top: 10%;
  bottom: 0;
  left: 30%;
  right: 0;
  display: flex;
  z-index: 2;
  /* justify-content: center;
  align-items: center; */
}

.overlay {
  background: rgba(0, 0, 0, 0.5);
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}

.modale {
  background: #f1f1f1;
  color: #333;
  padding: 50px;
  position: fixed;
  top: 30%;
}

.btn-modale {
  position: absolute;
  top: 10px;
  right: 10px;
}
</style>