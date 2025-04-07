<template>
    <div>
        <center><h1 class="mb-4">Welcome to Shahin's Blog</h1></center>

        <div class="row">
            <div v-for="post in posts.data" :key="post.id" class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img v-if="post.image" :src="`/storage/${post.image}`" class="card-img-top" alt="Post Image">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text text-truncate">{{ post.content }}</p>
                        <p><strong>By:</strong> {{ post.user.username }}</p>
                        <a :href="`/posts/${post.id}`" class="btn btn-primary mt-auto">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            <nav v-if="posts.links.length > 3">
                <ul class="pagination">
                    <li
                        v-for="(link, index) in posts.links"
                        :key="index"
                        class="page-item"
                        :class="{ active: link.active, disabled: !link.url }"
                    >
                        <a
                            class="page-link"
                            :href="link.url"
                            v-html="link.label"
                        ></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script setup>
defineProps(['posts']);
</script>


<style scoped>
.card:hover {
    transform: translateY(-5px);
    transition: 0.3s ease;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}
</style>
