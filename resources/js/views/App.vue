<template>
<div>
    <BaseHeader/>
    <BaseMain/>
    <BaseFooter/>
</div>
    
</template>

<script>
import BaseFooter from '../components/commons/BaseFooter.vue';
import BaseHeader from '../components/commons/BaseHeader.vue';
import BaseMain from '../components/commons/BaseMain.vue';
export default {
  components: { BaseHeader, BaseFooter, BaseMain },
    name: 'App'
}
</script>

<style lang="scss">

</style>