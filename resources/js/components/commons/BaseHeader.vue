<template>
    <header>
        <div class="container">
            <div class="row">
                <div>
                    <h1>Blog</h1>
                </div>
                <div>
                    <nav class="header_navbar">
                        <ul class="navbar-nav">
                            <li><router-link class="link" :to="{name: 'home'}">Home</router-link></li>
                            <li><router-link class="link" :to="{name: 'posts'}">Posts</router-link></li>
                            <li><router-link class="link" :to="{name: 'categories'}">Categorie</router-link></li>
                            <li><router-link class="link" :to="{name: 'about-us'}">Chi siamo</router-link></li>
                            <li><a class="link" href="admin/home">Area riservata</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'BaseHeader',
}
</script>

<style lang="scss">
header {
    width: 100%;
    background-color: black;
    color: white;

    .row {
        justify-content: space-between;
        align-items: center;
    }
    h1 {
        text-transform: uppercase;
        font-size: 3.75rem;
    }
    ul {
        display: flex;
        list-style: none;
        gap: .625rem;
        font-size: 1.25rem;
    }
    .link {
        color: inherit;
        text-decoration: none;
        text-transform: uppercase;
    }
}
</style>