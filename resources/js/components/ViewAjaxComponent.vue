<template>
    <div class="inline-block">
        <button
            class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 ease-in-out"
            @click="fetchAndOpenModal"
        >
            View Details
        </button>
    </div>
</template>

<script>
import { useModalStore } from "../store/posts.js";

export default {
    data() {
        return {
            modalStore: useModalStore(),
            isModalOpen: false,
        };
    },

    methods: {
        async fetchAndOpenModal() {
            try {
                const response = await axios.get(
                    `http://localhost:8000/api/posts/${this.id}`
                );
                this.modalStore.openModal(response.data);
            } catch (error) {
                console.error("Error fetching post:", error);
            }
        },
    },
    props: ["id"],
};
</script>

<style></style>
