<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Chirp from '@/Components/Chirp.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Channels from '@/Components/Channels.vue'; // Import the Channels component
import { ref, onMounted, Head } from '@inertiajs/inertia-vue3';
import axios from 'axios';

const form = useForm({
    message: '',
});

const selectedServer = ref(null); // Store the selected server
const selectedChannel = ref(null); // Store the selected channel

// Data for server and channel lists
const servers = ref([]);
const channels = ref([]);

const fetchServers = async () => {
    try {
        const response = await axios.get('/api/servers'); // Replace with your server API endpoint
        servers.value = response.data;
    } catch (error) {
        console.error(error);
    }
};

const fetchChannels = async () => {
    if (selectedServer.value) {
        try {
            const response = await axios.get(`/api/servers/${selectedServer.value.id}/channels`); // Replace with your channel API endpoint
            channels.value = response.data;
        } catch (error) {
            console.error(error);
        }
    }
};

// Watch for changes in the selected server and fetch channels accordingly
onMounted(() => {
    fetchServers();
});

</script>

<template>
    <Head title="Chirps"><title>Chirps</title></Head>

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <!-- Add the Channels component to allow users to select servers and channels -->
            <Channels
                :servers="servers"
                :channels="channels"
                v-model:selectedServer="selectedServer"
                v-model:selectedChannel="selectedChannel"
            />

            <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    placeholder="What's on your mind?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>
            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                <!-- Filter chirps/messages by the selected channel -->
                <Chirp
                    v-for="chirp in chirps"
                    :key="chirp.id"
                    :chirp="chirp"
                    v-if="chirp.channel === selectedChannel"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
