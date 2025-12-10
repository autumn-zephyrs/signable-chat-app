<template>
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
    <span class="input-group-btn">
      <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
        Send
      </button>
    </span>
  </div>
</template>
<script setup lang="ts">
import { ref } from 'vue';
import axios from 'axios';

type User = { id?: number; name: string; display_name?: string | null };
type Message = { id?: number; content: string; created_at?: string; user?: User | null };

const props = defineProps<{ user?: User | null }>();
const emit = defineEmits<(e: 'messagesent', payload: Message) => void>();

const newMessage = ref('');

const sendMessage = async (): Promise<void> => {
  const text = newMessage.value.trim();
  if (!text) return;

  try {
    const res = await axios.post('/chat/send', { message: text });
    const serverMessage = res.data?.message as Message | undefined;

    if (serverMessage) {
      emit('messagesent', serverMessage);
    } else {
      // fallback if server doesn't return the created message
      emit('messagesent', {
        content: text,
        user: props.user ?? null,
      });
    }
  } catch (err) {
    console.error(err);
  } finally {
    newMessage.value = '';
  }
};
</script>
