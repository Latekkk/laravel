<script>

import ModalRemoveDir from "@/Components/ModalRemoveDir.vue";

export default {
    name: "Card",
    props: {
        dir: Object,
    },
    methods: {
        submitShowNote(){
            this.$inertia.get(route('dirs.show', this.dir));
        },
        submitEditNote(){
            this.$inertia.get(route('dirs.edit', this.dir));
        },
    },
    components: {
        ModalRemoveDir
    }
}
</script>

<style scoped>

</style>

<template>
    <div class="card w-96 bg-base-100 shadow-xl">
        <figure><img :alt="dir.title" :src="dir.photoURL"/></figure>
        <div class="card-body">
            <h2 class="card-title">{{ dir.title }}</h2>
            <div class="card-actions justify-end">
                <div class="dropdown dropdown-top dropdown-end">
                    <label class="btn m-1" tabindex="0">Action</label>
                    <ul class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52" tabindex="0">
                        <li>
                            <button class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out text-white hover:text-black"
                                    @click="submitShowNote">Show note
                            </button>
                        </li>
                        <li>
                            <button class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out text-white hover:text-black"
                                    @click="submitEditNote">Edit
                            </button>
                        </li>
                        <li>
                            <ModalRemoveDir
                                :dir="dir"
                                message="Are you sure you want remove this folder with all notes?"
                            >
                            </ModalRemoveDir>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

