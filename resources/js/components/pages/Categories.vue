<template>
    <section class="categories">
        <div class="container">
            <h1>Categorie</h1>
            <ul>
                <li v-for="category in categories" :key="category.id">
                    <router-link class="link" :to="{name: 'single-category', params: {slug: category.slug}}">{{category.name}}</router-link>
                </li>
            </ul>
        </div>
    </section>
</template>

<script>
import BaseCard from '../small_commons/BaseCard.vue';
export default {
    name: 'Categories',
    data() {
        return {
            categories: [],
        }
    },
    created() {
        axios.get('/api/categories')
        .then((response) => {
            this.categories = response.data;
        })
        .catch((e) => {
            console.log(e);
        });
    },
}
</script>

<style lang="scss">

</style>