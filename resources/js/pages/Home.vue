<template>
    <div>
        <div v-if="posts.length > 0" class="container text-center">
        <h1 class="text-center">POST :</h1>
        <div id="card-conteiner">
                    <Card 
                        v-for="post in posts"
                        :key="post.id"
                        :item="post"
                    />

            </div>

            <button 
              v-show="current_page > 1"
              class="btn btn-info mr-2"
              @click="getPosts(current_page - 1)"
              >
              Prev
            </button>

            <button 
                    class="btn mr-2"
                    :class="(n == current_page) ? 'btn-primary' : 'btn-info'"
                    v-for="n in last_page"
                    :key="n"
                    @click="getPosts(n)"  
                    >
                    {{ n }}
            </button>

            <button 
              v-show="current_page < last_page"
              class="btn btn-info mr-2"
              @click="getPosts(current_page + 1)"
              >
              Prev
            </button>
        </div>

        <div v-else>
            <h1 class="text-center">In caricamento</h1>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(248, 250, 252); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <rect x="17.5" y="30" width="15" height="40" fill="#85a2b6">
                <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="18;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"/>
                <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="64;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"/>
                </rect>
                <rect x="42.5" y="30" width="15" height="40" fill="#bbcedd">
                <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"/>
                <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"/>
                </rect>
                <rect x="67.5" y="30" width="15" height="40" fill="#dce4eb">
                <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"/>
                <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"/>
                </rect>
            </svg>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Card from '../components/Card';
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
      },
    },
    created: function(){
      this.getPosts();
    }

}
</script>

<style>
    #card-conteiner {
        display: flex;
        margin: 50px 0;
    }

</style>