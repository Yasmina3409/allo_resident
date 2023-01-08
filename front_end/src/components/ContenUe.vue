<template>
  <div class="container">


    <modaLe :revele="revele" :toggleModale="toggleModale"></modaLe>
    <div v-on:click="toggleModale"
      class="w-40 pr-5 btn bg-color_allo_blue text-white font-medium m-0 rounded-0 hover:bg-bouton_allo hover:text-white transition duration-300">
      Espace
      Admin

    </div>
  </div>
</template>


<script>
import ModaLe from "./ModaLe";

export default {
  name: "ContenUe",
  data() {
    return {
      revele: false
    };
  },
  components: {
    modaLe: ModaLe
  },
  methods: {
    toggleModale: function () {
      this.revele = !this.revele;
    }
  }
};
</script>


<style>

</style>