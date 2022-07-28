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
                    <p v-if="post.category">
                        <span>Categoria:</span> <router-link class="link" :to="{name: 'single-category', params: {slug: category.slug}}">{{category.name}}</router-link> 
                    </p>
                    <p v-if="tags.length > 0">
                        <span>Tags:</span>
                        <ul>
                            <li v-for="tag in tags" :key="tag.slug">
                                {{tag.name}}
                            </li>
                        </ul>
                    </p>
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
            category: [],
            tags: [],
        }
    },
    created() {
        axios.get(`/api/post/${this.$route.params.slug}`)
        .then((response)=>{
            this.post = response.data;
            this.category = response.data.category;
            this.tags = response.data.tags;
        })
        .catch((e) => {
                // redirect alla pagina 404
                this.$router.push({name: '404NotFound'});
            });
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
        font-size: 1.50rem;
        span{
            font-weight: 900;
            font-size: 1.25rem;
        }
        ul {
            list-style: none;
        }
    }
}
</style>