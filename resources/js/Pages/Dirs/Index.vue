<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';

import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';


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

        <Head title="List dirs" />

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
                            {{dir.id }}
                        </th>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img v-bind:src="dir.photoURL"  >
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{dir.title }}
                        </td>
                        <td>
                            <div class="dropdown dropdown-end">
                                <label tabindex="0" class="btn m-1">Action</label>
                                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                                    <li>
                                        <BreezeDropdownLink :href="route('dirs.show', dir)" method="get" as="button">Show note
                                        </BreezeDropdownLink>
                                    </li>
                                    <li>
                                        <BreezeDropdownLink :href="route('dirs.edit', dir)" method="get" as="button">Edit
                                        </BreezeDropdownLink>
                                    </li>
                                    <li>
                                        <BreezeDropdownLink :href="route('dirs.destroy', dir)" method="delete" as="button">Remove
                                        </BreezeDropdownLink>
                                    </li>
                                </ul>
                            </div>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <BreezeValidationErrors class="mb-4" />

    </BreezeAuthenticatedLayout>
</template>
