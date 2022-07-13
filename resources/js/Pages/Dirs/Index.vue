<script setup>
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';

import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import {Head} from '@inertiajs/inertia-vue3';
import ModalRemoveDir from "@/Components/ModalRemoveDir.vue";
import Card from "@/Pages/Dirs/partials/card.vue";

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    users: Object,
    dirs: Object,
});

</script>


<template>

    <BreezeAuthenticatedLayout>

        <Head title="List dirs"/>
        <div class="flex gap-5 flex-wrap w-full p-5">
            <div v-for="dir in dirs" :key="dir.id">
                <Card :dir="dir"/>
            </div>
        </div>
    </BreezeAuthenticatedLayout>

    <BreezeValidationErrors class="mb-4"/>
</template>

