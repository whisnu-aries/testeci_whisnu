<script>
import { reactive } from "vue";

export default {
  props: {
    id: String,
  },
  setup(props) {
    let data = reactive({
      karyawan: {},
    });
    const fetchData = async () => {
      const karyawanResponse = await axios.get(
        `/api/test4/find_karyawan/${props.id}`
      );
      data.karyawan = karyawanResponse.data;
    };

    fetchData();
    return { data };
  },
};
</script>

<template>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col gap-4">
      <TitleText text="Detail Karyawan" />
      <div class="flex flex-col gap-2">
        <div class="flex justify-end">
          <Link
            :href="'/test4/karyawan/edit/' + data.karyawan.id_karyawan"
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

        <div v-if="data.karyawan">
          <div class="mb-4">
            <label
              for="nik"
              class="block text-sm font-medium leading-6 text-gray-900"
            >
              NIK
            </label>
            {{ data.karyawan.nik }}
          </div>
          <div class="mb-4">
            <label
              for="nama"
              class="block text-sm font-medium leading-6 text-gray-900"
            >
              Nama
            </label>
            {{ data.karyawan.nama }}
          </div>
          <div class="mb-4">
            <label
              for="ttl"
              class="block text-sm font-medium leading-6 text-gray-900"
            >
              Tanggal lahir
            </label>
            {{ data.karyawan.ttl }}
          </div>
          <div class="mb-4">
            <label
              for="alamat"
              class="block text-sm font-medium leading-6 text-gray-900"
            >
              Alamat
            </label>
            {{ data.karyawan.alamat }}
          </div>
          <div class="mb-4">
            <label
              for="jabatan"
              class="block text-sm font-medium leading-6 text-gray-900"
            >
              Jabatan
            </label>
            {{ data.karyawan.jabatan.nama_jabatan }}
          </div>
          <div class="mb-4">
            <label
              for="department"
              class="block text-sm font-medium leading-6 text-gray-900"
            >
              Department
            </label>
            {{ data.karyawan.department.nama_dept }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
