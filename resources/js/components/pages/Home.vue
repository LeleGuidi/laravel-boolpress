<template>
    <section class="posts">
        <div class="container">
            <div class="row">
                <div class="col" v-for="post in posts" :key="post.slug">
                    <BaseCard :title="post.title" :content="post.content" :slug="post.slug"/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import BaseCard from '../small_commons/BaseCard.vue';
export default {
    name: 'Home',
    components: {BaseCard},
    data() {
        return {
            posts: [],
        }
    },
    created() {
        axios.get('api/posts')
        .then((response) => {
            this.posts = response.data;
        })
        .catch((e) => {
            console.log(e);
        });
    },
}
</script>

<style lang="scss">
section.posts {
    .row {
        gap: .625rem;
    }
}
</style>