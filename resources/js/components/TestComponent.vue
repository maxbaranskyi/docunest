<template>
    <div>
        <h1>{{ message }}</h1>
        <button @click="changeMessage">Change Message</button>
    </div>
</template>

<script>
export default {
    props: ['initialMessage'],
    data() {
        return {
            message: this.initialMessage || 'Hello from Vue Component!'
        };
    },
    methods: {
        changeMessage() {
            this.message = 'Message changed!';
        }
    }
};
</script>