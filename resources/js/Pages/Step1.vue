<script setup>
import { useForm } from "@inertiajs/vue3";
defineProps({ output: Object });

const form = useForm({
  type: "Type 1",
  number: null,
});

const submit = () => {
  form.post("/step/1");
};
</script>

<template>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col gap-4">
      <TitleText text="Test 1" />
      <div class="grid grid-cols-2 gap-4">
        <form @submit.prevent="submit">
          <div class="mb-4">
            <label
              for="type"
              class="block text-sm font-medium leading-6 text-gray-900"
            >
              Buatkan API untuk case berikut
            </label>
            <div class="mt-2">
              <select
                id="type"
                name="type"
                class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                v-model="form.type"
              >
                <option>Type 1</option>
                <option>Type 2</option>
                <option>Type 3</option>
              </select>
              <small class="text-red-600">{{ form.errors.type }}</small>
            </div>
          </div>
          <div class="mb-4">
            <input
              type="number"
              name="number"
              min="0"
              class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              v-model.number="form.number"
            />
            <small class="text-red-600">{{ form.errors.number }}</small>
          </div>
          <div class="flex justify-end">
            <button
              type="submit"
              class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
            >
              Submit
            </button>
          </div>
           
        </form>
        <div class="">
          <p class="block text-sm font-medium leading-6 text-gray-900">
            Output:
          </p>
          <ul>
            <li v-for="item in output" :key="item">{{ item }}</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="flex justify-between">
      <Link href="0">
        <PrimaryButton>Sebelumnya</PrimaryButton>
      </Link>
      <Link href="2">
        <PrimaryButton>Selanjutnya</PrimaryButton>
      </Link>
    </div>
  </div>
</template>
