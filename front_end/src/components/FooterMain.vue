<template>

    <footer style="background-color:#2C608C;" class="md:px-6 md:py-1  ">
        <!-- <div class="d-flex justify-content-center">
            <div>
                <a href="#" class="   mb-1 ">
                    <img style=" " class="  taille_logo mt-3 mr-3 sm:mt-3" src="../assets/img/logo_footer.png"
                        alt="Logo" /> </a> -->
        <!-- <div class="font-bold text-start text-white fs-1 f_titre2">Allo Résident</div> 
            </div>
        </div> -->
        <div class=" py-3 d-flex justify-content-center ">
            <div class="font-bold text-start text-white fs-1 f_titre2 pr-5">Allo Résident</div>


            <div class="block text-md font-bold text-white my-3 ml-5 sm:text-center dark:text-gray-400">© 2022
                <router-link to="#" class="hover:underline text-white  ">Allo Résident™</router-link>.
                Tous droits
                réservés

            </div>
        </div>



    </footer>

</template>

<script>
export default {
    name: 'FooterMain',
}
</script>

<style>
.taille_logo {
    height: 89px;
    width: 181px;
}
</style>