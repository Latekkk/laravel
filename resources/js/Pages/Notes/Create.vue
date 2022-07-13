<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';




const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    dir: Object,
});

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

const form = useForm({
    title: '',
    description: '',
    dir_id: urlParams.get('id')     ,
});


const submit = () => {
    form.post(route('notes.store', props.dir));
    console.log('xD');
};
</script>



<template>
    <BreezeGuestLayout>

        <Head title="Note creation" />

        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit" >
                <div>
                    <BreezeLabel for="title" value="Title" />
                    <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.title"
                        autofocus autocomplete="title" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="description" value="Description" />
                    <BreezeInput id="description" type="description" class="mt-1 block w-full" v-model="form.description"
                                  autocomplete="description" />
                </div>

                <div class="flex items-center justify-end mt-4">


                    <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Create note
                    </BreezeButton>
                </div>
            </form>
    </BreezeGuestLayout>
</template>
