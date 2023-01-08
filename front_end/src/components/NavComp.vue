<template>
    <div class="bg-color_allo_blue d-flex justify-content-around text-white py-2">
        <div class="d-flex flex-column">
            <span class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-envelope-at mr-3" viewBox="0 0 16 16">
                    <path
                        d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                    <path
                        d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                </svg>
                <h6>anim.fjt34@orange.fr</h6>

            </span>
            <span class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-facebook mr-3 mt-1" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
                <a class="hover: text-white text-decoration-underline"
                    href="https://www.promeneursdunet.fr/departements/herault" target="_blank">
                    Compte du promeneur du
                    net </a></span>
        </div>
        <div class="d-flex align-items-center">04 67 35 84 30</div>
    </div>
    <div class=" d-flex justify-content-between bg-color_nav2">


        <div class="flex items-center inline  ml-3">

            <router-link to="/" class="flex items-center  ">
                <img style=" height=50px " src="../assets/img/logo_application_fjt.png" alt="Logo">
                <span class="font-bold  fs-1 f_titre2"> Allo Résident</span>
            </router-link>

        </div>
        <div class="d-flex align-items-center">
            <ul class=" justify-center border-none  md:hidden flex relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                    class=" mr-8 bi bi-list" viewBox="0 0 16 16" @click="showmenu = !showmenu">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>

                <transition enter-active-class="transition ease-out duration-100"
                    enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                    leave-active-class="transition ease-in duration-75"
                    leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">

                    <ul v-if="showmenu" class="z-10  absolute mt-2 w-40 right-0 top-8">
                        <ContenUe v-if="!isLoggedIn" class=""></ContenUe>
                        <router-link to="/connexion" v-if="!isLoggedIn"
                            class=" flex border-t ml-3 border-whioutline-none mobile-menu-buttonte md:border-0  px-0 hover:bg-bouton_allo  text-white py-2 duration-200 cursor-pointer  bg-color_allo_blue">
                            <h6 class="text-center ml-5 font-medium"> Connexion</h6>
                        </router-link>
                        <router-link to="/profiluser" v-if="isLoggedIn"
                            class="items-start flex border-t border-whioutline-none mobile-menu-buttonte md:border-0  px-4 hover:bg-bouton_allo  text-white py-1 duration-200 cursor-pointer  bg-color_allo_blue">
                            <i class=" ml-5    ">
                                <img class="userimg "
                                    :src="this.user.image ? user.image : require('@/assets/img/icone.jpg')" />
                            </i>
                        </router-link>
                        <button @click="logout" v-if="isLoggedIn"
                            class=" text-white text-start items-start flex border-t border-whioutline-none mobile-menu-buttonte md:border-0  px-5 py-2 hover:bg-bouton_allo  text-white py-2 duration-200 cursor-pointer  bg-color_allo_blue">
                            Deconnexion
                        </button>
                        <LangChanger />

                    </ul>
                </transition>

            </ul>



            <ul class=" justify-center border-none  hidden md:flex ">

                <LangChanger classStyle="w-4" />


                <div class="hidden md:flex items-center  ">


                    <!-- connexion -->
                    <ContenUe v-if="!isLoggedIn"></ContenUe>
                    <router-link to="/connexion" v-if="!isLoggedIn"
                        class="mr-2 py-2 px-2 font-medium rounded-0  bg-color_allo_blue  text-white hover:bg-bouton_allo text-white ">Connexion</router-link>
                    <!-- <router-link to="/inscription" v-if="!isLoggedIn"
                        class="py-2 px-2 font-medium text-white bg-slate-600 rounded hover:bg-boutton_allo transition duration-300">Inscription</router-link > -->
                    <router-link to="/profiluser" v-if="isLoggedIn"
                        class="p-2 font-medium  rounded hover: hover:text-white transition duration-300 h5 m-0 ms-2">
                        <i class="">
                            <img class="userimg"
                                :src="this.user.image ? user.image : require('@/assets/img/icone.jpg')" />
                        </i>
                    </router-link>
                    <button @click="logout" v-if="isLoggedIn"
                        class=" mr-3 bg-color_allo_blue py-2 px-2 font-medium text-white hover: bg--color_allo_blue text-white transition duration-300">
                        Deconnexion
                    </button>
                </div>
            </ul>

        </div>
    </div>

</template>

<script>
import ContenUe from "@/components/ContenUe.vue";
import ApiService2 from '@/service/ApiService2.js';
export default {
    name: 'NavbarComp',
    components: {
        ContenUe,
    },
    data() {
        return {
            user: JSON.parse(localStorage.getItem('user')),
            annonces: JSON.parse(localStorage.getItem('annonces')),
            showmenu: false,
            isLoggedIn: localStorage.getItem("isLoggedIn") == "true",

        };
    },
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
            this.$router.replace({ path: '/' })
            // window.location.reload();
        },
        afficheProfil_id: function (user) {

            console.log(user)
            localStorage.setItem("profil", JSON.stringify(user));
            // var string_a_stocker = JSON.strinfify(article);
            // console.log(string_a_stocker)



        },
    }
}

</script>
<style scoped>
.f_titre2 {
    font-family: "Satisfy" !important;
}

.userimg {
    width: 35px;
    height: 35px;
    object-fit: contain;
    /* border: 1px solid black; */
    border-radius: 50%;
    object-fit: cover;
    margin-left: 5%;
}
</style>