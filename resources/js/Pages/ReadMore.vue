<template>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <!-- Post Image -->
                <div v-if="post.image" class="mb-4">
                    <img :src="`/storage/${post.image}`" class="img-fluid rounded shadow" alt="Post Image">
                </div>

                <!-- Post Title -->
                <h1 class="mb-3 text-primary fw-bold">{{ post.title }}</h1>

                <!-- Author Info -->
                <p class="text-muted mb-4">
                    <i class="bi bi-person-circle"></i> <strong>Author:</strong> {{ post.user.username }}
                </p>

                <!-- Post Content -->
                <div class="card p-4 shadow-sm border-0 mb-5">
                    <p class="card-text" style="white-space: pre-line;">{{ post.content }}</p>
                </div>

                <!-- Comments Section -->
                <div class="comments-section">
                    <h4 class="mb-3 text-secondary">💬 Comments</h4>

                    <!-- Existing Comments -->
                    <div v-if="post.comments.length">
                        <div v-for="comment in post.comments" :key="comment.id" class="mb-3 p-3 border rounded bg-light">
                            <strong>{{ comment.user.name }}</strong>
                            <p class="mb-0">{{ comment.body }}</p>
                        </div>
                    </div>
                    <div v-else class="text-muted mb-3">No comments yet.</div>

                    <!-- Add Comment Form -->
                    <div v-if="$page.props.auth.user">
                        <form @submit.prevent="submitComment">
                            <div class="mb-3">
                                <textarea
                                    v-model="form.body"
                                    class="form-control"
                                    placeholder="Write your comment here..."
                                    rows="3"
                                    required
                                ></textarea>
                            </div>
                            <button class="btn btn-primary" :disabled="form.processing">Submit Comment</button>
                        </form>
                    </div>
                    <div v-else class="text-muted">
                        <p><a href="/login">Login</a> to write a comment.</p>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-5 text-center">
                    <a href="/" class="btn btn-outline-secondary">← Back to Home</a>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
const props = defineProps(['post'])

const form = useForm({
    post_id: props.post.id,
    body: '',
})

const submitComment = () => {
    form.post('/comments', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    })
}
</script>

<style scoped>
h1 {
    font-size: 2.25rem;
}
.card-text {
    font-size: 1.1rem;
    line-height: 1.6;
}
.comments-section {
    padding: 20px 0;
    border-top: 1px solid #ccc;
}
</style>
