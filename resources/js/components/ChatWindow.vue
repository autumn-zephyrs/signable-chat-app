<script setup lang="ts">

type User = { id: number; name: string; email: string; display_name?: string | null };
type Message = { id: number; content: string; created_at: string; user: User };

const props = defineProps<{ messages: Message[]; user: User }>();
</script>
<template>
  <ul class="w-full">
    <li class="" v-for="message in messages" :key="message.id">
      <div :class="['container py-1 align-right flex', message.user.email === user.email ? 'justify-start' : 'justify-end']">
        <div class="message-box p-3 rounded-lg border border-sidebar-border/70 dark:border-sidebar-border">
            <div class="header font-bold text-lg">
              <strong>
                {{ message.user.display_name ? message.user.display_name : message.user.name }}
              </strong>
            </div>
            <div class="text-base text-gray-200 darkLight:text-gray-800 mt-1">
              {{ message.content }}
            </div>
            <div class="text-xs font-italic text-gray-500 mt-1">
              Sent {{ new Date(message.created_at).toLocaleString() }}
            </div>
          </div>
        </div>
    </li>
  </ul>
</template>

