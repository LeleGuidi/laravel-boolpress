<template>
    <section class="home">
        <div class="container">
            <div class="row">
                <h1>Benvenuto sul mio blog</h1>
                <p>utilizza la barra di navigazione qua in alto per vedere i posts o altro!</p>
                <span>Questa è la HOME</span>
            </div>
        </div>
    </section>
</template>

<script>

export default {
    name: 'Home',
}
</script>

<style lang="scss">
section.home {
    .row{
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-transform: uppercase;
    }
}
</style>