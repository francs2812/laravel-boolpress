<template>
<div class="container text-center">
  <h1 class="text-center">POST :</h1>
  <div id="card-conteiner">
            <Card 
                v-for="post in posts"
                :key="post.id"
                :item="post"
            />

    </div>
    <button 
            class="btn mr-2"
            :class="(n == current_page) ? 'btn-primary' : 'btn-info'"
            v-for="n in last_page"
            :key="n"
            @click="getPosts(n)"  
            >
            {{ n }}
    </button>
</div>
</template>

<script>
import axios from 'axios';
import Card from '../components/Card.vue';
export default {
  components: { Card },
    name:'Home',
    data: function() {
        return {
        posts: [],
        current_page: 1,
        last_page: 1,
        }
    },

    created: function(){
    this.getPosts();
    },
   methods: {
      truncateText: function(string, charsNumber = 100) {
        if(string.length > charsNumber) {
          return string.substr(0, charsNumber) + '...';
        } else {
          return string;
        }
      },
      getPosts: function(page = 1) {
        axios
        .get(`http://127.0.0.1:8000/api/posts?page=${page}`)
        .then(
          res => {
            console.log(res.data);
            this.posts = res.data.data;
            this.current_page = res.data.current_page;
            this.last_page = res.data.last_page;
            this.posts.forEach(
              element => {
                element.excerpt = this.truncateText(element.content, 150);
              }
            );
          }
        )
        .catch(
          err => {
            console.log(err);
          }
        );
      }
    },

}
</script>

<style>
    #card-conteiner {
        display: flex;
        margin: 50px 0;
    }

</style>