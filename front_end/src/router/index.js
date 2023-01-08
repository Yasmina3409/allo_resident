import { createRouter, createWebHistory } from 'vue-router';
import AccueilView from '../views/AccueilView.vue';
import AfficheView from '../views/AfficheView.vue';
import InscriptionView from '../views/InscriptionView.vue';
import ProfilView from '../views/ProfilView.vue';
import ProfiluserView from '../views/ProfiluserView.vue';
import ProfilView2 from '../views/ProfilView2.vue';
import ConnexionView2 from '../views/ConnexionView.vue';
import AnnonceformView from '../views/AnnonceformView.vue'
import AnnoncemodifierView from '../views/AnnoncemodifierView.vue'




const routes = [
  {
    path: '/',
    name: 'AccueilView',
    component: AccueilView
  },
  {
    path: '/affiche',
    name: 'AfficheView',
    component: AfficheView
  },
  {
    path: '/inscription',
    name: 'InscriptionView',
    component: InscriptionView
  },
  {
    path: '/connexion',
    name: 'ConnexionView',
    component: ConnexionView2
  },
  {
    path: '/annonceform',
    name: 'AnnonceformView',
    component: AnnonceformView
  },
  {
    path: '/annoncemodifier',
    name: 'AnnoncemodifierView',
    component: AnnoncemodifierView
  },
  {
    path: '/profil',
    name: 'ProfilView',
    component: ProfilView
  },
  {
    path: '/profiluser',
    name: 'ProfiluserView',
    component: ProfiluserView
  },
  {
    path: '/profil2',
    name: 'ProfilView2',
    component: ProfilView2
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});
export default router
