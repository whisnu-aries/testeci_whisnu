<script setup>
import axios from "axios";
import { reactive } from "vue";

import LayoutTest4 from "../../Layouts/LayoutTest4.vue";

defineOptions({ layout: LayoutTest4 });

const props = defineProps({ id: String });

let data = reactive({
  department: {},
});

const fetchData = async () => {
  try {
    const departmentResponse = await axios.get(
      `/api/test4/find_department/${props.id}`
    );
    data.department = departmentResponse.data;
  } catch (error) {
    console.error(error);
  }
};

fetchData();
</script>

<template>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col gap-4">
      <TitleText text="Detail department" />
      <div class="flex flex-col gap-2">
        <div class="flex justify-end">
          <Link
            :href="'/test4/department/edit/' + data.department.id_department"
            class="flex justify-end"
          >
            <button
              type="submit"
              class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"
            >
              Edit
            </button>
          </Link>
        </div>
        <div v-if="data.department">
          <div class="mb-4">
            <label
              for="nama_dept"
              class="block text-sm font-medium leading-6 text-gray-900"
            >
              Nama
            </label>
            {{ data.department.nama_dept }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
