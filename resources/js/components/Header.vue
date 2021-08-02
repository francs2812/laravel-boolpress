<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Boolpres</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
                <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
            </li>
            <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'contatti' }">Contatti</router-link>
                <!-- <a class="nav-link" href="#">Contatti</a> -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">chi siamo</a>
            </li>
            </ul>
        </div>
    </nav>
  </div>
</template>

<script>
export default {
    name: 'Header',

}
</script>

<style lang="scss" scoped>
    div {
        width: 1000%;
    }

</style>