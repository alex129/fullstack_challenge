<template>
    <div>
        <h2>Organism list ({{ organisms.length }})</h2>
        
        <table class="pure-table pure-table-horizontal">
            <thead>
                <tr>
                    <th>Organism id</th>
                    <th>Genus</th>
                    <th>Species</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="organism of organisms.data" :key="organism.id">
                    <Organism_item :organism="organism" ></Organism_item>
                </tr>
            </tbody>
        </table>
        <div class="pagination">
            <a v-if="organisms.prev_page_url" @click="fetchOrganism(organisms.prev_page_url)">{{ "<<" }}</a>
            <a v-if="organisms.next_page_url" @click="fetchOrganism(organisms.next_page_url)">{{ ">>" }}</a>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.pagination {
    display: flex;
    align-items: center;
    justify-content: center;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    cursor: pointer;
}
</style>

<script lang="ts">
import { Vue, Component, Prop, Watch } from "vue-property-decorator";
import axios from "axios";
import Organism_item from "./organism_item.vue";

interface Organism {
    id: number;
    genus: string;
    species: string;
}

@Component({})
export default class OrganismsVue extends Vue {
    // The list of samples that we receive from the server
    organisms: Organism[] = [];

    mounted() {
        // Load the samples when the component gets mounted
        this.fetchOrganism();
    }

    /**
     * Recieve the samples from the api endpoint
     */
    async fetchOrganism(page = "") {
        console.log(page)
        const url = page !== "" ? page : "/api/organisms";
        this.organisms = (await axios.get(url)).data;
    }
}
</script>
