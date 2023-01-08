// Script qui gere les requetes ajax avec AXIOS

/* eslint-disable */
const axios = require('axios').default;


const url = "http://localhost/allo_resident/back-end/";
const url2 = "http://localhost/allo_resident/back-end/api.php?action="

class ApiService2 {

    //des fonctions async qui permettent d'attendre que le resultat arrive 
    async search(action, params = {}) {

        params.action = action;
        console.log(action)
        console.log(params)
        console.log(params.action)
        let results = await axios.post(url + "api.php", params, { headers: { "Access-Control-Allow-Origin": "*" } });
        return results;
    }
    async get(action) {
        console.log(action)
        let results = await axios.get(url2 + action, { headers: { "Access-Control-Allow-Origin": "*" } });
        return results;
    }
    async postForm(action, formData) {
        formData.append("action", action);
        formData.append("token", localStorage.getItem('token'));
        formData.append("user", localStorage.getItem('user'));
        try {
            let results = await axios.post(url + "api.php", formData, { headers: { 'Content-Type': 'multipart/form-data', "Access-Control-Allow-Origin": "*" } });
            return results;
        }
        catch (e) {
            console.log(e);
        }
    }

}
export default new ApiService2();

