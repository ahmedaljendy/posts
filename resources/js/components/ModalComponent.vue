<template>
    <div v-if="modalStore.isModalOpen" class="modal">
        <div class="modal-content">
            <span class="close" @click="modalStore.closeModal">&times;</span>
            <h2><strong>Tilte :</strong> {{ modalStore.post.title }}</h2>
            <p>
                <strong>Description :</strong> {{ modalStore.post.description }}
            </p>
            <p><strong>Username:</strong> {{ modalStore.post.username }}</p>
            <p><strong>Email:</strong> {{ modalStore.post.email }}</p>
        </div>
    </div>
</template>

<script>
import { useModalStore } from "../store/posts.js";

export default {
    data() {
        return {
            modalStore: useModalStore(),
        };
    },
};
</script>

<style scoped>
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    width: 90%;
    max-width: 500px;
    position: relative;
}

.close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
    color: #333;
}

.close:hover {
    color: #000;
}
</style>
