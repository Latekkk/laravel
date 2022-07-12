<script setup>
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';

import Pagination from "@/Components/Pagination.vue";
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import {Head} from '@inertiajs/inertia-vue3';
import ModalDialog from "@/Components/ModalDialog.vue";

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    dir: Object,
    notes: Object,
});


</script>



<template>
    <BreezeAuthenticatedLayout>
        <Head title="List dirs"/>
        <div class="flex flex-col gap-y-10">
            <div class="flex flex-col grid  card bg-base-300 rounded-box ">
                <div class="flex">
                    <div class="flex-none">
                        <div class="avatar" style="padding: 10px">
                            <div class="w-24 mask mask-squircle">
                                <img v-bind:src="'../'+dir.photoURL" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 w-64">
                        <div class="flex flex-col items-stretch ">
                            <p class="text-xl ">Name dir: {{ dir.title }}</p>
                        </div>
                    </div>
                    <div class="flex-1 w-32">
                        <BreezeDropdownLink :href="route('notes.create', dir)" as="button" method="get">Add notes
                        </BreezeDropdownLink>
                    </div>
                </div>
            </div>

            <div class="flex gap-5 flex-wrap">

                <div v-for="note in notes.data" :key="note.id">
                    <div class="card w-96 bg-base-100 shadow-xl">
                        <div class="card-body items-center text-center">
                            <h2 class="card-title">{{ note.title }}</h2>
                            <p class="text-clip overflow-hidden">{{ note.description }}</p>
                            <div class="card-actions">
                                <BreezeDropdownLink :href="route('notes.edit', note)" as="button"
                                                    class="btn btn-primary"
                                                    method="get"
                                                    style="color: white; text-align: center;width: 100px">Edit
                                </BreezeDropdownLink>

                                   <ModalDialog :note="note"  message="Are you sure you want remove this element?"></ModalDialog>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <BreezeValidationErrors class="mb-4"/>

        <Pagination :data="notes"/>

    </BreezeAuthenticatedLayout>
</template>

<style>
main {
    padding: 10px;
}
</style>

