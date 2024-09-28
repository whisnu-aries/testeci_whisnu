<script setup>
import axios from "axios";
import { reactive } from "vue";

import LayoutTest4 from "../../Layouts/LayoutTest4.vue";

defineOptions({ layout: LayoutTest4 });

const data = reactive({
  jabatan: [],
});

const fetchData = async () => {
  try {
    const jabatanResponse = await axios.get("/api/test4/all_jabatan");
    data.jabatan = jabatanResponse.data;
  } catch (error) {
    console.error(error);
  }
};

const deleteJabatan = (id) => {
  axios
    .post("/api/test4/delete_jabatan", {
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
      <TitleText text="Jabatan" />
      <Link href="jabatan/create" class="flex justify-end">
        <PrimaryButton>Tambah Jabatan</PrimaryButton>
      </Link>
      <table class="table-auto border-collapse w-full">
        <thead>
          <tr class="text-left">
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">Level</th>
            <th class="border px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="jabatan in data.jabatan" v-bind:key="jabatan.id_jabatan">
            <td class="border px-4 py-2">{{ jabatan.nama_jabatan }}</td>
            <td class="border px-4 py-2">{{ jabatan.level.nama_level }}</td>
            <td class="border px-4 py-2 text-center">
              <Link :href="'jabatan/detail/' + jabatan.id_jabatan">
                <button
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                  Detail
                </button>
              </Link>
              <button
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                @click="deleteJabatan(jabatan.id_jabatan)"
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
