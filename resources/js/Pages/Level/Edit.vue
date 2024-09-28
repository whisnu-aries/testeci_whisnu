<!-- <script>
import { useForm } from "@inertiajs/vue3";
import { reactive } from "vue";

export default {
  props: {
    id: String,
  },
  setup(props) {
    let data = reactive({
      level: {},
      errorMessage: "",
    });

    const fetchData = async () => {
      try {
        const levelResponse = await axios.get(
          `/api/test4/find_level/${props.id}`
        );
        data.level = levelResponse.data;
      } catch (response) {
        const errorData = response.data;
        data.errorMessage = errorData.message;
      }
    };

    const submitForm = () => {
      axios
        .post("/api/test4/level/update_karyawan", {
          ...data.level,
        })
        .then((response) => {
          if (response.data.success) {
            window.location.href = "/test4/level";
          } else {
            data.level.errors = {
              nik: null,
              nama: null,
              ttl: null,
              alamat: null,
              id_jabatan: null,
              id_department: null,
            };
            data.errorMessage = response.data.message;
          }
        })
        .catch(({ response }) => {
          const errorData = response.data;
          data.errorMessage = errorData.message;
          data.level.errors = errorData.errors;
        });
    };

    fetchData();
    return { data, submitForm };
  },
};
</script> -->

<script setup>
import axios from "axios";
import { reactive } from "vue";

import LayoutTest4 from "../../Layouts/LayoutTest4.vue";

defineOptions({ layout: LayoutTest4 });

const props = defineProps({ id: String });

let data = reactive({
  level: {},
});

const fetchData = async () => {
  try {
    const levelResponse = await axios.get(`/api/test4/find_level/${props.id}`);
    data.level = levelResponse.data;
  } catch (error) {
    console.error(error);
  }
};

const submitForm = () => {
  axios
    .post("/api/test4/update_level", {
      ...data.level,
    })
    .then((response) => {
      if (response.data.success) {
        window.location.href = "/test4/level";
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
      <TitleText text="Edit Level" />
      <div
        v-if="data.errorMessage"
        class="bg-red-500 text-white px-4 py-2 rounded"
      >
        {{ data.errorMessage }}
      </div>
      <form v-if="data.level" @submit.prevent="submitForm">
        <input
          type="hidden"
          name="id_karyawan"
          class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
          v-model="data.level.id_level"
        />
        <div class="mb-4">
          <label
            for="nama"
            class="block text-sm font-medium leading-6 text-gray-900"
          >
            Nama
          </label>
          <input
            type="text"
            name="nama"
            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            v-model="data.level.nama_level"
          />
          <small class="text-red-600">{{
            data.level.errors && data.level.errors.nama
              ? data.level.errors.nama[0]
              : ""
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
