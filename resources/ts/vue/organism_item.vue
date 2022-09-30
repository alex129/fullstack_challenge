<template>
    <div>
        <td>{{ organism.id }}</td>
        <td>{{ organism.genus }}</td>
        <td>{{ organism.species }}</td>
    </div>
</template>

<style lang="scss" scoped></style>

<script lang="ts">
import { Vue, Component, Prop } from "vue-property-decorator";

interface Organism {
    id: number;
    genus: string;
    species: string;
}

@Component({})
export default class OrganismItemVue extends Vue {
    @Prop() readonly organism!: Organism
}
</script>
