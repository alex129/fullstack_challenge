<template>

   
   <div>

       <h2> Organism list ({{ organisms.length }}) </h2>

        <p class="todo">TODO: Complete VUE code</p>

   </div>


</template>


<style lang="scss" scoped >


</style>


<script lang="ts">

import {Vue, Component, Prop, Watch} from 'vue-property-decorator';
import axios from 'axios';


@Component({})
export default class OrganismsVue extends Vue {

    organisms = [];

}
</script>
