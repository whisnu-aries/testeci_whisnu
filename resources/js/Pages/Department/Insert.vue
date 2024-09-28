<script setup>
import axios from "axios";
import { reactive } from "vue";

const data = reactive({
  department: {
    name: "",
  },
  errorMessage: "",
});

const submitForm = () => {
  axios
    .post("/api/test4/insert_department", {
      ...data.department,
    })
    .then((response) => {
      if (response.data.success) {
        window.location.href = "/test4/department";
      } else {
        data.errorMessage = response.data.message;
      }
    })
    .catch(({ response }) => {
      const errorData = response.data;

      data.errorMessage = errorData.message;
      data.department.errors = errorData.errors;
    });
};
</script>

<template>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col gap-4">
      <TitleText text="Create Department" />
      <div
        v-if="data.errorMessage"
        class="bg-red-500 text-white px-4 py-2 rounded"
      >
        {{ data.errorMessage }}
      </div>
      <form @submit.prevent="submitForm">
        <div class="mb-4">
          <label
            for="nama"
            class="block text-sm font-medium leading-6 text-gray-900"
          >
            Nama
          </label>
          <input
            type="text"
            name="nama_dept"
            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            v-model="data.department.nama_dept"
          />
          <small class="text-red-600">{{
            data.department.errors && data.department.errors.nama_dept[0]
          }}</small>
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
    </div>
  </div>
</template>
