<script setup>
import axios from "axios";
import { reactive } from "vue";

import LayoutTest4 from "../../Layouts/LayoutTest4.vue";

defineOptions({ layout: LayoutTest4 });

const props = defineProps({ id: String });

let data = reactive({
  jabatan: {},
  level: [],
});

const fetchData = async () => {
  try {
    const jabatanResponse = await axios.get(
      `/api/test4/find_jabatan/${props.id}`
    );
    data.jabatan = jabatanResponse.data;

    const levelResponse = await axios.get(`/api/test4/all_level`);
    data.level = levelResponse.data;
  } catch (error) {
    console.error(error);
  }
};

const submitForm = () => {
  axios
    .post("/api/test4/update_jabatan", {
      ...data.jabatan,
    })
    .then((response) => {
      if (response.data.success) {
        window.location.href = "/test4/jabatan";
      } else {
        data.errorMessage = response.data.message;
      }
    })
    .catch(({ response }) => {
      const errorData = response.data;

      data.errorMessage = errorData.message;
      form.errors = errorData.errors;
    });
};

fetchData();
</script>

<template>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col gap-4">
      <TitleText text="Edit Karyawan" />
      <div
        v-if="data.errorMessage"
        class="bg-red-500 text-white px-4 py-2 rounded"
      >
        {{ data.errorMessage }}
      </div>
      <form @submit.prevent="submitForm">
        <input
          id="nama"
          type="hidden"
          name="id_jabatan"
          class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
          v-model="data.jabatan.id_jabatan"
        />
        <div class="mb-4">
          <label
            for="nama"
            class="block text-sm font-medium leading-6 text-gray-900"
          >
            Nama
          </label>
          <div class="mt-2">
            <input
              id="nama"
              type="text"
              name="nama_jabatan"
              class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              v-model="data.jabatan.nama_jabatan"
            />
            <small class="text-red-600">{{
              data.jabatan.errors && data.jabatan.errors.nama_jabatan
                ? data.jabatan.errors.nama_jabatan[0]
                : ""
            }}</small>
          </div>
        </div>
        <div class="mb-4">
          <label
            for="level"
            class="block text-sm font-medium leading-6 text-gray-900"
          >
            Level
          </label>
          <div class="mt-2">
            <select
              id="level"
              name="id_level"
              class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
              v-model="data.jabatan.id_level"
            >
              <option
                v-for="data in data.level"
                :key="data.id_level"
                :value="data.id_level"
              >
                {{ data.nama_level }}
              </option>
            </select>
            <small class="text-red-600">{{
              data.jabatan.errors && data.jabatan.errors.id_level
                ? data.jabatan.errors.id_level[0]
                : ""
            }}</small>
          </div>
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
