<template>
    <div class="container">
        <div class="card" style="width: 18rem;">
        <img src="https://www.artandstick.be/getsupercustomizedimage.php5?objid=4923&colorid1=2&colorid2=4&colorid3=4&colorid4=4&colorid5=4&way=NORMAL&transparent=Y" class="card-img-top" alt="image">

        <div class="card-body">
            <h5> {{ item.title }} </h5>
            <p class="card-text">{{ item.content }}</p>
            <a href="#" class="btn btn-primary">Read</a>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: { 'item' : Object }
}
</script>

<style lang="scss" scoped>
    .card {
        margin-left: 10%;

        img {
            width: 100%;
        }
    }

</style>
