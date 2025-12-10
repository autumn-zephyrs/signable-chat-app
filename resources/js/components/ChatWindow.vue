<script setup lang="ts">

type User = { id?: number; name: string; display_name?: string | null };
type Message = { id: number; content: string; created_at?: string; user?: User | null };

const props = defineProps<{ messages: Message[] }>();
</script>
<template>
  <ul class="w-full">
    <li class="" v-for="message in messages" :key="message.id">
      <div class="container py-1 align-right">
        <div class="message-box p-3 rounded-lg border border-sidebar-border/70 dark:border-sidebar-border">
            <div class="header font-bold">
              <strong>
                {{ message.user.display_name ? message.user.display_name : message.user.name }}
              </strong>
            </div>
            <p>
              {{ message.content }}
            </p>
          </div>
        </div>
    </li>
  </ul>
</template>

