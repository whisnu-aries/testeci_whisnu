<script setup>
import axios from "axios";
import { reactive } from "vue";

import LayoutTest4 from "../../Layouts/LayoutTest4.vue";

defineOptions({ layout: LayoutTest4 });

const data = reactive({
  karyawan: [],
});

const fetchData = async () => {
  try {
    const karyawanResponse = await axios.get("/api/test4/all_karyawan");
    data.karyawan = karyawanResponse.data;
  } catch (error) {
    console.error(error);
  }
};

const deleteKaryawan = (id) => {
  axios
    .post("/api/test4/delete_karyawan", {
      id: id,
    })
    .then((response) => {
      if (response.data.success) fetchData();
    })
    .catch(({ response }) => {
      console.error(response);
    });
};

fetchData();
</script>

<template>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col gap-4">
      <TitleText text="Karyawan" />
      <div class="flex justify-end gap-4">
        <Link href="/test3/run">
          <PrimaryButton>run test_3.sql</PrimaryButton>
        </Link>
        <Link href="karyawan/create">
          <PrimaryButton>Tambah karyawan</PrimaryButton>
        </Link>
      </div>
      <table class="table-auto border-collapse w-full">
        <thead>
          <tr class="text-left">
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">NIK</th>
            <th class="border px-4 py-2">Tanggal Lahir</th>
            <th class="border px-4 py-2">Alamat</th>
            <th class="border px-4 py-2">Jabatan</th>
            <th class="border px-4 py-2">Department</th>
            <th class="border px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="karyawan in data.karyawan"
            v-bind:key="karyawan.id_karyawan"
          >
            <td class="border px-4 py-2">{{ karyawan.nama }}</td>
            <td class="border px-4 py-2">{{ karyawan.nik }}</td>
            <td class="border px-4 py-2">{{ karyawan.ttl }}</td>
            <td class="border px-4 py-2">{{ karyawan.alamat }}</td>
            <td class="border px-4 py-2">
              {{ karyawan.jabatan.nama_jabatan }}
            </td>
            <td class="border px-4 py-2">
              {{ karyawan.department.nama_dept }}
            </td>
            <td class="border px-4 py-2 text-center">
              <Link :href="'karyawan/detail/' + karyawan.id_karyawan">
                <button
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                  Detail
                </button>
              </Link>
              <button
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                @click="deleteKaryawan(karyawan.id_karyawan)"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
