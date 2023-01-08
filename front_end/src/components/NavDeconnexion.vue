<template>


    <nav class=" text-bouton_shadow py-3.5  m pl-6 pr-0 md:px-6   items-center  ">

        <ul class=" justify-center border-none  flex relative">
            <!-- <i class="mr-8 bi bi-list bg-danger" @click="showmenu = !showmenu"></i> -->
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class=" bi bi-list"
                viewBox="0 0 16 16" @click="showmenu = !showmenu">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>

            <transition enter-active-class="transition ease-out duration-100"
                enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95">

                <ul v-if="showmenu" class="z-10  absolute mt-2 w-40 right-0 top-8">
                    <LangChanger classStyle="w-4" />
                    <li class="  items-start flex border-t border-whioutline-none mobile-menu-buttonte md:border-0  px-4 hover:bg-custom_blue  py-2 duration-200 cursor-pointer  bg-color_toys"
                        v-bind:key="element.id" v-for="element in nav">

                        <span @click="logout">{{ (element.name) }} </span>
                    </li>
                    <LangChanger />

                </ul>
            </transition>

        </ul>




    </nav>




</template>
<script>


import ApiService2 from '@/service/ApiService2.js';

export default {
    name: 'NavDeconnexion',
    data() {
        return {

            user: JSON.parse(localStorage.getItem('user')),
            showmenu: false,

            nav: [
                { id: 1, name: "Deconnexion", click: this.logout },

                // { id: 1, name: "connexion", ref: "/connexion", cond: false },
                // { id: 2, name: "inscription", ref: "/inscription", cond: false },
                // // { id: 3, name: "Connexion", ref: "/connexion", cond: "unlogged" },
                // { id: 4, name: "", ref: "/profil", cond: false, image: "https://benmalem-yasmina.e-osengo.fr/img/icone.jpg" }
            ]
        };
    },
    // created() {
    //     if (!this.$user) {
    //         this.$router.replace({ path: '/auth' });
    //         return;
    //     }
    // }
    //,
    methods: {
        logout() {

            ApiService2.search("logout").then(this.manageLogout);

        }
        , manageLogout(results) {
            console.log(results);
            console.log("logout success");
            localStorage.removeItem("isLoggedIn");
            localStorage.removeItem("user");
            localStorage.removeItem("token");
            localStorage.removeItem("profil_id");
            localStorage.removeItem("annonce_id");
            localStorage.removeItem("annonce");
            localStorage.removeItem("ADMIN");
            localStorage.removeItem("afficherouter-link to");
            this.$router.replace({ path: '/' })

        },
    },
    mounted() {
        if (localStorage.getItem('reloaded')) {
            // The page was just reloaded. Clear the value from local storage
            // so that it will reload the next time this page is visited.
            localStorage.removeItem('reloaded');
        } else {
            // Set a flag so that we know not to reload the page twice.
            localStorage.setItem('reloaded', '1');
            location.reload();
        }
    }
}
</script>
<style scoped>

</style>
