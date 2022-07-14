<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';


const submit = () => {
    form.put(route('notes.update',props.note));
    console.log('xD');
};

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    note: Object,
});

const form = useForm({
    title: props.note.title,
    description: props.note.description,
});
</script>


<template>
    <BreezeGuestLayout>

        <Head title="Dir"/>

        <BreezeValidationErrors class="mb-4"/>

        <form @submit.prevent="submit">

            <div class="card card-side bg-base-100 shadow-xl">
                <figure>
                    <span class="material-icons" style="font-size: 100px; padding-top: 100%">event_note</span>
                </figure>
                <div class="card-body">

                    <BreezeLabel for="title" :value="$t('Title')"/>
                    <BreezeInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required
                                 autofocus autocomplete="title" />


                    <span>{{ $t('Description is') }}:</span>
                    <textarea v-model="form.description" :placeholder="$t('add multiple lines')" ></textarea>


                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">{{ $t('Edit') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
