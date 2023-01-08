<template>

  <div class=" min-h-screen bg-gray-100" style="
      background-image: url(https://img.freepik.com/free-vector/white-abstract-background_23-2148804712.jpg?w=2000);
      margin: 0;
      padding: 0;
      background-size: cover;
      background-repeat: no-repeat;
    ">
    <NavComp></NavComp>
    <div class="container-fluid px-lg-4 px-xl-5 contentDiv">
      <!-- Page Header-->
      <div class="page-header mb-4">
        <h1 class="page-heading text-xl font-bold">Profile</h1>
      </div>
      <section>
        <!-- cadre profil -->
        <div class="row">

          <div class="col-lg-12">

            <ProfilEdit></ProfilEdit>

          </div>
        </div>
      </section>
    </div>
  </div>
  <FooterMain></FooterMain>
</template>

<script>
//importing bootstrap 5 Modules
import "bootstrap/dist/css/bootstrap.min.css";
import ProfilEdit from "@/components/ProfilEdit.vue";


import FooterMain from '@/components/FooterMain.vue';




export default {
  components: {

    ProfilEdit,

    FooterMain,
  },
  name: "ProfilView2",
  data() {
    return {
      image: { backgroundImage: "url(../assets/img/fond10.png)" },
      user: JSON.parse(localStorage.getItem('user')),
    };
  },

}
</script>

<style scoped>
.min-h-screen {
  min-height: 100vh;
}


.bg-gray-100 {
  background-color: #f8f9fa !important;
}

body {
  font-family: "Poppins" !important;
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
