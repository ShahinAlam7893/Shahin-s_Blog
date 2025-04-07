<template>
    <div>
        <h1 class="mb-4">Welcome to the Shahin's Blog</h1>
        

        <div class="row">
            <div v-for="post in posts" :key="post.id" class="col-md-4 mb-4">
                <div class="card h-100">
                    <img v-if="post.image" :src="`/storage/${post.image}`" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text text-truncate">{{ post.content }}</p>
                        <p><strong>By:</strong> {{ post.user.username }}</p>
                        <a :href="`/posts/${post.id}`" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps(['posts']);
</script>
