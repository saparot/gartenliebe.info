<template>
    <a class='group text-pink-500 transition-all duration-75 ease-in-out' :href="linkUrl">
  <span class='bg-left-bottom bg-gradient-to-r from-pink-500 to-pink-500 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-200 ease-out'>
    <slot/>
  </span>
    </a>
</template>
<script setup>
defineProps({
    linkUrl: {
        default: null,
        type: String,
    },
});

</script>
