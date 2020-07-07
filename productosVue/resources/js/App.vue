
<template>

  
  <div class="container">
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link to="/" class="nav-link">Inicio</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/crear" class="nav-link">Registrar un Producto</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/productos" class="nav-link">Productos</router-link>
        </li>
      </ul>
    </nav><br />
    
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>

<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>

    export default{
    }
</script>