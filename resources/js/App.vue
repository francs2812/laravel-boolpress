<template>
  
    <div>
        <Header />
        <router-view></router-view>
        <Footer />
    </div>

</template>

<script>
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
export default {
  components: { Header, Footer },
    name: 'App'
}
</script>

<style>

</style>