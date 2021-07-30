<template>
  <div class="text-center ">
      <h1>Post</h1>
      <p>Riprova più tardi</p>

      <div
      v-for="post in posts"
      class="border border-secondary m-3 text-left p-5"
      :key="post.id"
      >
        <h1>{{post.title}}</h1>
        <p>{{post.content}}</p>
      </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    name:'App',
    data: function() {
        return {
        posts: []
      }
    },
    created(){
        axios
        .get(`http://127.0.0.1:8000/api/posts`)
        .then(response => {
            this.posts= response.data;
        }
        );

    }
    
}
</script>

<style lang="scss" >
    @import '../sass/app.scss';

</style>>