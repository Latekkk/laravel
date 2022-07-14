<script setup>
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
import ModalRemoveNote from '@/Components/ModalRemoveNote.vue';

const props = defineProps({
    note: Object,
    dir: Object,
});

</script>


<template>
    <BreezeAuthenticatedLayout>
        <Head title="Note"/>

        <section class="flex flex-col justify-center antialiased bg-gray-900 text-gray-200 min-h-screen ">


            <div class="max-w-6xl mx-auto p-4 sm:px-6 h-full min-w-full">

                <div class="absolute right-5 top-20  z-10 h-16 w-16">
<!--                    <button class="btn btn-outline btn-accent">-->
<!--                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path clip-rule="evenodd"-->
<!--                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"-->
<!--                                  fill-rule="evenodd"/>-->
<!--                        </svg>-->

<!--                    </button>-->
                    <ModalRemoveNote
                        :note="note"
                        message="Are you sure you want remove this folder with all notes?"
                    >
                    </ModalRemoveNote>
                </div>
                <article
                    class="max-w-sm mx-auto md:max-w-none grid md:grid-cols-2 gap-6 md:gap-8 lg:gap-12 xl:gap-16 items-center">

                    <div class="relative block group">
                        <div
                            aria-hidden="true"
                            class="absolute inset-0 bg-gray-800 hidden md:block transform md:translate-y-2 md:translate-x-2 xl:translate-y-2 xl:translate-x-4 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-700 ease-out pointer-events-none"></div>
                        <figure
                            class="relative h-0 pb-[56.25%] md:pb-[75%] lg:pb-[56.25%] overflow-hidden transform md:-translate-y-2 xl:-translate-y-4 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-700 ease-out">
                            <img
                                :src="'../'+dir.photoURL"
                                alt="Note"
                                class="absolute inset-0 w-full h-full object-cover transform hover:scale-105 transition duration-700 ease-out  "
                                height="303" width="540">
                        </figure>
                    </div>
                    <div>
                        <header>
                            <div class="mb-3">
                                <ul class="flex flex-wrap text-xs font-medium -m-1">
                                    <li class="m-1">
                                        <a class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-purple-600 hover:bg-purple-700 transition duration-150 ease-in-out">Note</a>
                                    </li>
                                    <li class="m-1">
                                        <a class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-purple-600 hover:bg-purple-700 transition duration-150 ease-in-out">{{
                                                note.id
                                            }}</a>
                                    </li>
                                    <li class="m-1">
                                        <a class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-green-700 transition duration-150 ease-in-out">Dir</a>
                                    </li>
                                    <li class="m-1">
                                        <a class="inline-flex text-center text-gray-100 py-1 px-3 rounded-full bg-green-500 hover:bg-green-700 transition duration-150 ease-in-out">{{
                                                dir.id
                                            }}</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="text-2xl lg:text-3xl font-bold leading-tight mb-2">
                                <a class="hover:text-gray-100 transition duration-150 ease-in-out"
                                   href="#0">{{ note.title }}</a>
                            </h3>
                        </header>
                        <div>
                            <div class="selection:bg-fuchsia-300 selection:text-fuchsia-900">
                                <textarea class="textarea textarea-accent w-full h-48 " placeholder="Bio"
                                          style="resize: none">{{ note.description }}</textarea>

                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <BreezeValidationErrors class="mb-4"/>

    </BreezeAuthenticatedLayout>
</template>
