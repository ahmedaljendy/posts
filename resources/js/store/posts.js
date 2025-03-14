import { defineStore } from "pinia";

export const useModalStore = defineStore("modal", {
    state: () => ({
        isModalOpen: false,
        post: {
            title: "",
            description: "",
            username: "",
            email: "",
        },
    }),
    actions: {
        openModal(postData) {
            console.log(postData);
            this.post = postData;
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
            this.post = { title: "", description: "", username: "", email: "" };
        },
    },
});
