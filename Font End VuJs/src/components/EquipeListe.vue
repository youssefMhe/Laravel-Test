<template>
  <div>
    <h1> Liste des Equipes </h1>
    <table border="1px" class="table table-dark">
      <tr>
        <td> Nom</td>
        <td> Created_at</td>
        <td> Updated_at</td>
      </tr>
      <tr v-for="item in list" v-bind:key="item.id">
        <td>{{item.nom}}</td>
        <td>{{item.created_at}}</td>
        <td>{{item.updated_at}}</td>

      </tr>

    </table>
  </div>
</template>
<script>
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios';
Vue.use(VueAxios,axios)
export default {
  name:"EquipeListe",
  data(){
    return{list:undefined}
  },
  mounted() {
    Vue.axios.get('http://127.0.0.1:8000/api/ListEquipe').then( (resp)=>{
      this.list =resp.data
      console.warn(resp)
    })
}
}
</script>
