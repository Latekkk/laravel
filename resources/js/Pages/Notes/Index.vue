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
    dirs: Object,
    notes: Object,
});

</script>



<template>
    <BreezeAuthenticatedLayout>

        <Head title="List notes" />

        <div class="w-full">
            <table class="table w-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th># ID</th>
                        <th>title</th>
                        <th>description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="note in notes" :key="note.id">
                        <th>
                            {{note.id }}
                        </th>
                        <td>
                            {{note.title }}
                        </td>
                        <td>
                            {{note.description}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <BreezeValidationErrors class="mb-4" />

    </BreezeAuthenticatedLayout>
</template>
