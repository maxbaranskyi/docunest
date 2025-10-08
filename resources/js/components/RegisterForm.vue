<template>
  <div>
    <h1 class="text-2xl font-semibold text-center mb-6">Create your account</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Name</label>
        <input v-model="form.name" type="text" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        <p v-if="errors.name" class="text-xs text-red-600 mt-1">{{ errors.name }}</p>
      </div>

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

      <div>
        <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input v-model="form.password_confirmation" type="password" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
      </div>

      <button type="submit"
              class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 font-semibold">
        Create account
      </button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">
      Already have an account?
      <a href="/login" class="text-indigo-600 hover:text-indigo-500 font-medium">Sign in</a>
    </p>
  </div>
</template>

<script setup>
import { reactive } from 'vue'
import axios from 'axios'

const form = reactive({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
})

const errors = reactive({})

async function submit() {
  Object.keys(errors).forEach(key => errors[key] = null)
  try {
    await axios.post('/register', form)
    window.location.href = '/dashboard'
  } catch (error) {
    if (error.response?.status === 422) {
      Object.assign(errors, error.response.data.errors)
    }
  }
}
</script>
