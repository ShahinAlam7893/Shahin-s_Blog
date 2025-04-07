<template>
    <div>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="/">Blog System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item" v-if="!user">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item" v-if="!user">
              <a class="nav-link" href="/register">Register</a>
            </li>
            <li class="nav-item" v-if="user">
              <span class="nav-link text-light">Hi, {{ user.username }}</span>
            </li>
            <li class="nav-item" v-if="user">
              <form @submit.prevent="logout">
                <button class="btn btn-sm btn-danger">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </nav>
  
      <!-- Page Content -->
      <main class="container mt-4">
        <slot />
      </main>
    </div>
  </template>
  
  <script setup>
  import { usePage, router } from '@inertiajs/vue3';
  
  const user = usePage().props.auth.user;
  
  const logout = () => {
    router.post('/logout');
  };
  </script>
  