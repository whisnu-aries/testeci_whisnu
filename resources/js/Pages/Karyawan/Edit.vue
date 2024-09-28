<script setup>
import axios from "axios";
import { reactive } from "vue";

import LayoutTest4 from "../../Layouts/LayoutTest4.vue";

defineOptions({ layout: LayoutTest4 });

const props = defineProps({ id: String });

let data = reactive({
  karyawan: {},
  jabatan: {},
  department: [],
  errorMessage: "",
});

const fetchData = async () => {
  try {
    const karyawanResponse = await axios.get(
      `/api/test4/find_karyawan/${props.id}`
    );
    data.karyawan = karyawanResponse.data;

    const jabatanResponse = await axios.get("/api/test4/all_jabatan");
    data.jabatan = jabatanResponse.data;

    const departmentResponse = await axios.get("/api/test4/all_department");
    data.department = departmentResponse.data;
  } catch (error) {
    console.error(error);
  }
};

const submitForm = () => {
  axios
    .post("/api/test4/update_karyawan", {
      ...data.karyawan,
    })
    .then((response) => {
      if (response.data.success) {
        window.location.href = "/test4/karyawan";
      } else {
        data.errorMessage = response.data.message;
      }
    })
    .catch(({ response }) => {
      console.log(response);
      const errorData = response.data;

      data.errorMessage = errorData.message;
      data.karyawan.errors = errorData.errors;
    });
};

fetchData();
</script>

<template>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div v-if="data.karyawan" class="h-full flex flex-col gap-4">
      <TitleText text="Edit Karyawan" />
      <div
        v-if="data.errorMessage"
        class="bg-red-500 text-white px-4 py-2 rounded"
      >
        {{ data.errorMessage }}
      </div>
      <form v-if="data.karyawan" @submit.prevent="submitForm">
        <input
          type="hidden"
          name="id_karyawan"
          class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
          v-model="data.karyawan.id_karyawan"
        />
        <div class="mb-4">
          <label
            for="nik"
            class="block text-sm font-medium leading-6 text-gray-900"
          >
            NIK
          </label>
          <div class="mt-2">
            <input
              type="text"
              name="nik"
              class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              v-model="data.karyawan.nik"
            />
            <small class="text-red-600">{{
              data.karyawan.errors && data.karyawan.errors.nik
                ? data.karyawan.errors.nik[0]
                : ""
            }}</small>
          </div>
        </div>
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
            v-model="data.karyawan.nama"
          />
          <small class="text-red-600">{{
            data.karyawan.errors && data.karyawan.errors.nama
              ? data.karyawan.errors.nama[0]
              : ""
          }}</small>
        </div>
        <div class="mb-4">
          <label
            for="ttl"
            class="block text-sm font-medium leading-6 text-gray-900"
          >
            Tanggal lahir
          </label>
          <input
            type="date"
            name="ttl"
            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            v-model="data.karyawan.ttl"
          />
          <small class="text-red-600">{{
            data.karyawan.errors && data.karyawan.errors.ttl
              ? data.karyawan.errors.ttl[0]
              : ""
          }}</small>
        </div>
        <div class="mb-4">
          <label
            for="alamat"
            class="block text-sm font-medium leading-6 text-gray-900"
          >
            Alamat
          </label>
          <textarea
            name="alamat"
            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            v-model="data.karyawan.alamat"
          />
          <small class="text-red-600">{{
            data.karyawan.errors && data.karyawan.errors.alamat
              ? data.karyawan.errors.alamat[0]
              : ""
          }}</small>
        </div>
        <div class="mb-4">
          <label
            for="jabatan"
            class="block text-sm font-medium leading-6 text-gray-900"
          >
            Jabatan
          </label>
          <select
            id="jabatan"
            name="id_jabatan"
            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
            v-model="data.karyawan.id_jabatan"
          >
            <option
              v-for="data in data.jabatan"
              :key="data.id_jabatan"
              :value="data.id_jabatan"
            >
              {{ data.nama_jabatan }}
            </option>
          </select>
          <small class="text-red-600">{{
            data.karyawan.errors && data.karyawan.errors.id_jabatan
              ? data.karyawan.errors.id_jabatan[0]
              : ""
          }}</small>
        </div>
        <div class="mb-4">
          <label
            for="department"
            class="block text-sm font-medium leading-6 text-gray-900"
          >
            Department
          </label>
          <select
            id="department"
            name="id_department"
            class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
            v-model="data.karyawan.id_department"
          >
            <option
              v-for="data in data.department"
              :key="data.id_department"
              :value="data.id_department"
            >
              {{ data.nama_dept }}
            </option>
          </select>
          <small class="text-red-600">{{
            data.karyawan.errors && data.karyawan.errors.id_department
              ? data.karyawan.errors.id_department[0]
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
