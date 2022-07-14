<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';


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
    form.post(route('dirs.update', props.dir))
};


</script>


<template>
    <BreezeGuestLayout>
        <Head title="Dir"/>
        <BreezeValidationErrors class="mb-4"/>
        <p>{{ $t('DirUpdate') }}</p>
        <form @submit.prevent="submit">
            <div>
                <BreezeLabel :value="$t('Title')" for="title"/>
                <BreezeInput id="title" v-model="form.title" autocomplete="title" autofocus
                             class="mt-1 block w-full" type="text"/>
            </div>

            <div class="mt-4">
                <BreezeLabel :value="$t('Image')" for="image"/>
                <BreezeInput type="file" @input="form.image = $event.target.files[0]"/>
            </div>

            <div class="flex items-center justify-end mt-4">

                <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="ml-4">
                    {{ $t('DirUpdate') }}
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
