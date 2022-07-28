<template>
    <section class="category">
        <div class="container">
            <h1>{{category.name}}</h1>
            <div class="row">
                
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'SingleCategory',
    data() {
        return {
            post: [],
            category: [],
        }
    },
    created() {
        axios.get(`/api/category/${this.$route.params.slug}`)
        .then((response)=>{
            this.category = response.data;
        })
    }
}
</script>

<style lang="scss">
section.single_category {
    .row {
        gap: 1.875rem;
        flex-direction: column;
        justify-content: space-between;
    }
}
</style>