<template>
  <div class="text-center ">
      <h1>Post</h1>
      <p>Riprova più tardi</p>
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

<style lang="scss" scoped >
    div {
        margin:50px;

        h1 {
            text-transform: uppercase;
        }
    }
</style>>