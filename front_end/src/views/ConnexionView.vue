<template>

  <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 610"><path fill="#111827" fill-opacity="1" d="M0,192L48,192C96,192,192,192,288,213.3C384,235,480,277,576,272C672,267,768,213,864,186.7C960,160,1056,160,1152,165.3C1248,171,1344,181,1392,186.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg> -->

  <div class="min-h-screen flex flex-col items-center justify-center bg-gray-300">
    <div
      class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md neonText">
      <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">
        Se connecter
      </div>




      <div class="mt-10">

        <div class="flex flex-col mb-6">
          <label for="email" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Identifiant:</label>
          <div class="relative">
            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-dark">
              <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path
                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
            </div>

            <input type="text" ref="email" placeholder="Identifiant" id="email" name="email"
              class="text-dark text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-color_toys" />
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

            <input :type="inputTypeIcon" placeholder="Mot de passe" ref="password" name="password"
              class="text-dark  text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-bleufonce" />
            <div class="inline-flex items-center justify-center absolute right-0 top-0 h-full w-10 text-gray-400">
              <span>

                <button @click.prevent="ToggleInputIcon">
                  <span v-if="inputTypeIcon == 'password'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                      class="bi bi-eye-fill" viewBox="0 0 16 16">
                      <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                      <path
                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                    </svg>
                  </span>
                  <span v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                      <path
                        d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                      <path
                        d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                    </svg>
                  </span>
                </button>

              </span>
            </div>
          </div>
        </div>


        <div></div>
        <button @click="connexion"
          class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-color_allo_blue hover:bg-bouton_allo rounded py-2 w-full transition duration-150 ease-in">
          <span class="mr-2 uppercase">Se connecter</span>
          <span>
            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              viewBox="0 0 24 24" stroke="currentColor">
              <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </span>
        </button>
      </div>



    </div>

  </div>



</template>


<script>

import ApiService2 from '@/service/ApiService2.js';
// @ is an alias to /src

export default {
  name: 'ConnexionView',

  data() {
    return {

      // inputTypeIcon: 'password',

    }
  },

  methods: {

    // ToggleInputIcon() {
    //   this.inputTypeIcon = this.inputTypeIcon == "password" ? "text " : "password";
    // },
    connexion() {
      console.log(this.$refs.email.value);
      console.log(this.$refs.password.value);
      ApiService2.search("login", { "email": this.$refs.email.value, "password": this.$refs.password.value }).then(this.manageResults);
    }, manageResults(results) {
      // console.log(results);

      console.log(JSON.stringify(results.data))
      console.log(results.data['user_id'])
      const id = results.data['user_id']
      if (results.data && id) {
        localStorage.setItem("user", JSON.stringify(results.data));

        localStorage.setItem("profil_id", JSON.stringify(results.data));
        console.log("login success", results.data["token"]);
        localStorage.setItem("token", JSON.stringify(results.data["token"]));
        localStorage.setItem("isLoggedIn", "true");
        this.$router.replace({ path: '/profiluser' })
        return;
      }
      else {
        alert(" Identifiant ou Mot de passes incorrecte ");
      }
    },
  }
}
</script>

<style>
/* .neonText {
  color: red;
  box-shadow:
    0 0 7px #fff,
    0 0 10px #fff,
    0 0 21px #fff,
    0 0 42px #bc13fe,
    0 0 82px #bc13fe,
    0 0 92px #bc13fe,
    0 0 102px #bc13fe,
    0 0 151px #bc13fe;
} */
</style>
