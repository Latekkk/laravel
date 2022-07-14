<script setup>
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
import Card from "@/Pages/Dirs/partials/card.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    users: Object,
    dirs: Object,
});

</script>


<template>

    <BreezeAuthenticatedLayout>

        <Head title="List dirs"/>
        <div class="flex gap-5 flex-wrap w-full p-5">
            <div v-for="dir in dirs.data" :key="dir.id">
                <Card :dir="dir"/>
            </div>

        </div>
        <div class="center">

            <Pagination :data="dirs"/>

        </div>
    </BreezeAuthenticatedLayout>

    <BreezeValidationErrors class="mb-4"/>
</template>

