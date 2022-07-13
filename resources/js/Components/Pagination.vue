<script setup>
import { Link }  from '@inertiajs/inertia-vue3';

defineProps({
    data: {
        type: Object,
        default: () => ({}),
    },
});

</script>


<template>
    <div v-if="data.links.length > 3" class="flex justify-center mt-4 btn-group">
        <Link
            v-for="(link, k) in data.links"
            :key="k"
            class="btn"
            :class="{'btn btn-active': link.active}"
            :href="link.url"
            v-html="link.label"
        />
    </div>
</template>
