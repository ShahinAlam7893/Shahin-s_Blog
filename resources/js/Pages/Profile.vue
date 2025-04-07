<template>
    <div>
      <h1>{{ user.username }}</h1>
      <img :src="profilePicUrl" alt="Profile Picture" class="w-24 h-24 rounded-full" />
    </div>
  </template>
  
  <script setup>
  import { computed } from 'vue';
  import { usePage } from '@inertiajs/vue3';
  
  const user = usePage().props.auth.user;
  
  const profilePicUrl = computed(() => {
    return user.profile_pic ? `/storage/${user.profile_pic}` : '/storage/default.png';
  });
  </script>
  