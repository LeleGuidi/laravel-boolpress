<template>
    <div class="card">
        <h4>{{title}}</h4>
        <div class="content">
            {{content}}
        </div>
        <router-link :to="{name: 'single-post', params: {slug: slug}}">Dettagli</router-link>
    </div>
</template>

<script>
export default {
    name: 'BaseCard',
    props: {
        title: {
            type: String
        },
        content: {
            type: String
        },
        slug: {
            type: String,
        },
    }
}
</script>

<style lang="scss">
.card {
    background-color: lightgray;
    border-radius: .625rem;
    padding: .625rem;

    h4 {
        text-transform: uppercase;
    }
}
</style>