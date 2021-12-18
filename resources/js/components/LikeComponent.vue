<template>
    <div class="container">
        <div class="row justify-content-center mt-1">
            <div class="col-md-12">
                <div>
                    <button @click="unfavorite()" class="btn btn-danger" >
                        いいね解除
                    </button>
                    <button @click="favorite()" class="btn btn-success" >
                        いいね
                    </button>
                    <p>いいね数：{{ count }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['post'],
        data() {
            return {
                count: "",
                result: "false"
            }
        },
        mounted () {
            this.countFavorites();
            this.hasFavorites()
        },
        methods: {
            favorite() {
                axios.get('/posts/' + this.post.id +'/favorites')
                .then(res => {
                    this.count = res.data.count;
                }).catch(function(error) {
                    console.log(error);
                });
            },
            unfavorite() {
                axios.get('/posts/' + this.post.id +'/unFavorites')
                .then(res => {
                    this.count = res.data.count;
                }).catch(function(error){
                    console.log(error);
                });
            },
            countFavorites() {
                axios.get('/posts/' + this.post.id +'/countFavorites')
                .then(res => {
                    this.count = res.data;
                }).catch(function(error){
                    console.log(error);
                });
            },
            hasFavorites() {
                axios.get('/posts/' + this.post.id +'/hasFavorites')
                .then(res => {
                    this.result = res.data;
                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>
