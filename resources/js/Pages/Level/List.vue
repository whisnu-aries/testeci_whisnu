<script setup>
import axios from "axios";
import { reactive } from "vue";

import LayoutTest4 from "../../Layouts/LayoutTest4.vue";

defineOptions({ layout: LayoutTest4 });

const data = reactive({
  level: [],
});

const fetchData = async () => {
  try {
    const levelResponse = await axios.get("/api/test4/all_level");
    data.level = levelResponse.data;
  } catch (error) {
    console.error(error);
  }
};

const deleteLevel = (id) => {
  axios
    .post("/api/test4/delete_level", {
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
      <TitleText text="Level" />
      <Link href="level/create" class="flex justify-end">
        <PrimaryButton>Tambah level</PrimaryButton>
      </Link>
      <table class="table-auto border-collapse w-full">
        <thead>
          <tr class="text-left">
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="level in data.level" v-bind:key="level.id_level">
            <td class="border px-4 py-2">{{ level.nama_level }}</td>
            <td class="border px-4 py-2 text-center">
              <Link :href="'level/detail/' + level.id_level">
                <button
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                  Detail
                </button>
              </Link>
              <button
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                @click="deleteLevel(level.id_level)"
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
