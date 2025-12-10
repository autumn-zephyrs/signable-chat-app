<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import ChatWindow from '../components/ChatWindow.vue';
import ChatForm from '../components/ChatForm.vue';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue'
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Chat',
        href: '/chat',
    },
    
];

const page = usePage();
const messages = computed(() => page.props.messages ?? []);
const user = computed(() => page.props.user);

</script>


<template>
    <Head title="Chat" />
    <AppLayout :breadcrumbs="breadcrumbs">

        <div class="flex h-7/8 flex-1 flex-col gap-4 rounded-xl p-4">
            
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min px-8 py-4">
                <ChatWindow :messages="messages" :user="user" />
                <ChatForm />
            </div>
        </div>
    </AppLayout>
</template>
