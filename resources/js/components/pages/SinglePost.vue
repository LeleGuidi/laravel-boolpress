<template>
    <section class="single_post">
        <div class="container">
            <div class="row">
                <h1>{{post.title}}</h1>
                <p>{{post.content}}</p>
                <div class="details">
                    <p>
                        <span>Postato il:</span> {{post.updated_at}}
                    </p>
                    <p>
                    </p>
                    <span>Categoria:</span> {{post.category_id}}
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: [],
        }
    },
    created() {
        axios.get(`/api/post/${this.$route.params.slug}`)
        .then((response)=>{
            this.post = response.data;
        })
    }
}
</script>

<style lang="scss">
section.single_post {
    .row {
        gap: 1.875rem;
        flex-direction: column;
        justify-content: space-between;
    }
    .details {
        font-size: 1.25rem;
        span{
            font-weight: 900;
        }
    }
}
</style>