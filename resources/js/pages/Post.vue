<template>
  <div class="container">
      <h1> {{ post.title }} </h1>
      <h4> <span  class="text-primary">Categoria:</span> {{ post.category.name }} </h4>
      <h4 class="text-success">Tag: 
          <span class="text-dark"
           v-for="(tag, index) in tags"
           :key="index"
          >
              {{tag.name }},
          </span>
      </h4>
      <p class="text-secondary"> {{ post.content }} </p>
  </div>
</template>

<script>
export default {
    name: 'Post',
    data: function() {
        return {
            post: null,
            tags: null
        }
    },
    created: function() {
        this.getPost(this.$route.params.slug);
    },
    methods: {
        getPost: function(slug) {
            axios
                .get(`http://127.0.0.1:8000/api/post/${slug}`)
                .then(
                    res => { 
                        this.post = res.data; 
                        this.tags = res.data.tags; 
                    }
                )
                .catch(
                    err => {
                        console.log(err);
                    }
                );
        }
    }
}
</script>

<style>

</style>