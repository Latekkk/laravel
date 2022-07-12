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
    users: Object,
    dir: Object,
});

const form = useForm({
    title: '',
    image: null,
    user_id: '',
});

const submit = () => {
    form.post(route('dirs.store'));
    console.log('xD');
};
</script>



<template>
    <BreezeGuestLayout>
        <Head title="Dir" />

        <BreezeValidationErrors class="mb-4" />
        <p>Creating dir</p>
        <form @submit.prevent="submit" enctype="multipart/form-data">
                <div>
                    <BreezeLabel for="title" value="Title" />
                    <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required
                        autofocus autocomplete="title" />
                </div>

                <div class="mt-4">
                    <BreezeLabel for="image" value="Image" />
                    <BreezeInput type="file" @input="form.image = $event.target.files[0]"  />
                    <!-- <BreezeInput id="photoURL" type="file" class="mt-1 block w-full" v-model="form.photoURL" required
                    autocomplete="photoURL" /> -->
                </div>

                <div class="flex items-center justify-end mt-4">


                    <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Create dir
                    </BreezeButton>
                </div>
            </form>
    </BreezeGuestLayout>
</template>
