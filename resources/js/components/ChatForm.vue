<template>
  <div class="flexl">
    <div class="input-group pt-4">
      <input
        id="btn-input"
        type="text"
        name="message"
        class="form-control input-sm"
        placeholder="Message..."
        v-model="newMessage"
        @keyup.enter="sendMessage"
      />
      <span class="input-group-btn pl-4">
        <button class="btn btn-primary btn-sm font-bold border p-2 rounded cursor-pointer" id="btn-chat" @click="sendMessage">
          Send
        </button>
      </span>
    </div>
  </div>
</template>
<script setup lang="ts">
import { ref } from 'vue';
import axios from 'axios';

type User = { id?: number; name: string; display_name?: string | null };
type Message = { id?: number; content: string; created_at?: string; user?: User | null };

const props = defineProps<{ user?: User | null }>();
const emit = defineEmits<(e: 'newmessage', payload: Message) => void>();

const newMessage = ref('');

const sendMessage = async (): Promise<void> => {
  const text = newMessage.value.trim();
  if (!text) return;

  try {
    const res = await axios.post('/chat/send', { message: text });
    const serverMessage = res.data.message as Message;

    if (serverMessage) {
      emit('newmessage', serverMessage);
    } 

  } catch (err) {
    console.error(err);
  } finally {
    newMessage.value = '';
  }
  window.location.reload();
};
</script>
