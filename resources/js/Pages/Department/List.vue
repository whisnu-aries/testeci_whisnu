<script setup>
import axios from "axios";
import { reactive } from "vue";

import LayoutTest4 from "../../Layouts/LayoutTest4.vue";

defineOptions({ layout: LayoutTest4 });

const data = reactive({
  department: [],
});

const fetchData = async () => {
  try {
    const departmentResponse = await axios.get("/api/test4/all_department");
    data.department = departmentResponse.data;
  } catch (error) {
    console.error(error);
  }
};

const deleteDepartment = (id) => {
  axios
    .post("/api/test4/delete_department", {
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
      <TitleText text="Department" />
      <Link href="department/create" class="flex justify-end">
        <PrimaryButton>Tambah Department</PrimaryButton>
      </Link>
      <table class="table-auto border-collapse w-full">
        <thead>
          <tr class="text-left">
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="department in data.department"
            v-bind:key="department.id_karyawan"
          >
            <td class="border px-4 py-2">{{ department.nama_dept }}</td>
            <td class="border px-4 py-2 text-center">
              <Link :href="'department/detail/' + department.id_department">
                <button
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                  Detail
                </button>
              </Link>
              <button
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                @click="deleteDepartment(department.id_department)"
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
