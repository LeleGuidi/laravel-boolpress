<template>
    <main>
        <router-view></router-view>
    </main>
</template>

<script>
export default {
    name: 'BaseMain'
}
</script>

<style lang="scss">
main {
    min-height: calc(100vh - 148px);
    padding: 1.875rem 0;
}
</style>
