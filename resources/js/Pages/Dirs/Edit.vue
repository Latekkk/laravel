<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head,  useForm } from '@inertiajs/inertia-vue3';


const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    dir: Object,
});

const form = useForm({
    title: props.dir.title,
    image: null,
    _method: 'put'
});

const submit = () => {
    console.log(form)
    form.post(route('dirs.update', props.dir ))
};
</script>



<template>
    {{form}}
    <BreezeGuestLayout>
        <Head title="Dir" />
        <BreezeValidationErrors class="mb-4" />
        <p>Update dir</p>
        <form @submit.prevent="submit"  >
            <div>
                <BreezeLabel for="title" value="Title" />
                <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.title"
                             autofocus autocomplete="title" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="image" value="Image" />
                <BreezeInput type="file" @input="form.image = $event.target.files[0]"  />
            </div>

            <div class="flex items-center justify-end mt-4">

                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update dir
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
