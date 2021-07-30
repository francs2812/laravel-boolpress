<template>
      <div class="card" style="width: 18rem;">
        <img src="" class="card-img-top" alt="image">

        <div class="card-body">
            <h5> {{ item.title }} </h5>
            <p class="card-text">{{ item.content }}</p>
            <a href="#" class="btn btn-primary">Read</a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: { 'item' : Object }
}
</script>

<style>
    .card {
        margin-left: 10%;
    }

</style>
