<template>
    <section class="category">
        <div class="container">
            <h1>{{category.name}}</h1>
            <div class="row">
                <div class="col" v-for="post in category.posts" :key="post.slug">
                    <BaseCard :title="post.title" :content="post.content" :slug="post.slug"/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import BaseCard from "../small_commons/BaseCard.vue"

export default {
  components: { BaseCard },
    name: 'SingleCategory',
    data() {
        return {
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