<template>
  <div>
    <h1 class="text-2xl font-semibold text-center mb-6">Sign in to your account</h1>

    <div v-if="status" class="mb-4 text-green-600 text-sm">{{ status }}</div>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input v-model="form.email" type="email" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        <p v-if="errors.email" class="text-xs text-red-600 mt-1">{{ errors.email }}</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Password</label>
        <input v-model="form.password" type="password" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        <p v-if="errors.password" class="text-xs text-red-600 mt-1">{{ errors.password }}</p>
      </div>

      <div class="flex justify-between items-center">
        <label class="flex items-center">
          <input v-model="form.remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
          <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </label>
        <a href="/forgot-password" class="text-sm text-indigo-600 hover:text-indigo-500">Forgot?</a>
      </div>

      <button type="submit"
              class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 font-semibold">
        Sign in
      </button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
      Don't have an account?
      <a href="/register" class="text-indigo-600 hover:text-indigo-500 font-medium">Sign up</a>
    </p>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import axios from 'axios'

const form = reactive({
  email: '',
  password: '',
  remember: false
})

const errors = reactive({})
const status = ref('')

async function submit() {
  errors.email = null
  errors.password = null
  status.value = ''

  try {
    await axios.post('/login', form)
    window.location.href = '/dashboard' // або інша сторінка
  } catch (error) {
    if (error.response?.status === 422) {
      Object.assign(errors, error.response.data.errors)
    } else {
      status.value = 'Login failed. Please try again.'
    }
  }
}
</script>
