<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';


const props = defineProps({
    users: Object,
    dir: Object,
});

const form = useForm({
    title: '',
    image: null,
    user_id: '',
});

const submit = () => {
    form.post(route('dirs.store', props.dir));
};
</script>


<template>
    <BreezeGuestLayout>
        <Head title="Dir"/>

        <BreezeValidationErrors class="mb-4"/>
        <p>{{$t('Creating dir')}}</p>
        <form enctype="multipart/form-data" @submit.prevent="submit">
            <div>
                <BreezeLabel for="title" :value="$t('Title')"/>
                <BreezeInput id="title" v-model="form.title" autocomplete="title" autofocus class="mt-1 block w-full"
                             required type="text"/>
            </div>

            <div class="mt-4">
                <BreezeLabel for="image" :value="$t('Image')"/>
                <BreezeInput type="file" @input="form.image = $event.target.files[0]"/>
                <!-- <BreezeInput id="photoURL" type="file" class="mt-1 block w-full" v-model="form.photoURL" required
                autocomplete="photoURL" /> -->
            </div>

            <div class="flex items-center justify-end mt-4">


                <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="ml-4">
                    {{ $t('Dirs create') }}
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
