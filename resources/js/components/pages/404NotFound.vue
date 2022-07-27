<template>
    <div class="container not-found">
        <h3>Mi dispiace ma la pagina cercata non esiste</h3>
        <router-link class="link" :to="{name: 'home'}"> Ritorna alla home </router-link>
    </div>
</template>
<script>
export default {

}
</script>
<style lang="scss">
    .not-found {
        .link {
            text-transform: uppercase;
            text-decoration: none;
            color: black;
        }
    }   
</style>