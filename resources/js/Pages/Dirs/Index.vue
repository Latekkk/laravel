<script setup>
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';

import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import {Head} from '@inertiajs/inertia-vue3';
import ModalDialog from "@/Components/ModalDialog.vue";

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

        <ModalDialog open="isOpen" @close="isOpen = !isOpen"></ModalDialog>
        <Head title="List dirs"/>

        <div class="w-full">
            <table class="table w-full">
                <!-- head -->
                <thead>
                <tr>
                    <th># ID</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="dir in dirs" :key="dir.id">
                    <th>
                        {{ dir.id }}
                    </th>
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <img v-bind:src="dir.photoURL" alt="">
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{ dir.title }}
                    </td>
                    <td>
                        <div class="dropdown dropdown-end">
                            <label class="btn m-1" tabindex="0">Action</label>
                            <ul class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52" tabindex="0">
                                <li>
                                    <BreezeDropdownLink :href="route('dirs.show', dir)" as="button" method="get">Show
                                        note
                                    </BreezeDropdownLink>
                                </li>
                                <li>
                                    <BreezeDropdownLink :href="route('dirs.edit', dir)" as="button" method="get">Edit
                                    </BreezeDropdownLink>
                                </li>
                                <li>
                                    <BreezeDropdownLink :href="route('dirs.destroy', dir)" as="button" method="delete">
                                        Remove
                                    </BreezeDropdownLink>

                                </li>
                            </ul>
                        </div>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
        <BreezeValidationErrors class="mb-4"/>

    </BreezeAuthenticatedLayout>
</template>
