<template>
  <div>
    <Navbar />
    <div class="flex items-center justify-center">
      <Nuxt />
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/layout/Navbar'

export default {
  components: {
    Navbar,
  },
}
</script>
<style>
html,body {
  @apply bg-gray-100
}
</style>
