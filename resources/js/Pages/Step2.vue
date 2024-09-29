<script setup>
import { reactive } from "vue";
import { useForm } from "@inertiajs/vue3";
import axios from "axios";

defineProps({ formatted: String, textCurrency: String });

const form = useForm({
  number: null,
});

const data = reactive({
  errorMsg: "",
  formatted: "",
  textCurrency: "",
});

const submit = () => {
  axios
    .post("/step/2", {
      number: form.number,
    })
    .then((response) => {
      data.formatted = response.data.formatted;
      data.textCurrency = response.data.textCurrency;
    })
    .catch(({ response }) => {
      data.errorMsg = response.data.message;
    });
};
</script>

<template>
  <Head>
    <title>Fullstack_whisnu</title>
  </Head>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col gap-4">
      <TitleText text="Test 2" />
      <div class="grid grid-cols-2 gap-4">
        <form @submit.prevent="submit">
          <div class="mb-4">
            <label
              for="number"
              class="block text-sm font-medium leading-6 text-gray-900"
            >
              Buatkan API untuk case berikut
            </label>
            <input
              type="number"
              name="number"
              min="0"
              class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              v-model.number="form.number"
            />
            <small v-if="data.errorMsg" class="text-red-600">{{
              data.errorMsg
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
          <hr class="my-2" />
          <p>
            Mengubah angka yang ditentukan oleh user kedalam format berikut:
            <ul>
              <li>- Format uang (Rupiah) dengan tanda "Rp." dan pemisah ribuan.</li>
              <li>- Format teks terbilang yang menuliskan angka tersebut dalam bahasa
            Indonesia, diakhiri dengan kata "rupiah".</li>
            </ul>
          </p>
          <br />
          <ul>
            <li>1. Masukan angka yang akan diformat.</li>
            <li>2. Jumlah baris harus berupa angka.</li>
          </ul>
        </form>
        <div>
          <p class="block text-sm font-medium leading-6 text-gray-900">
            Output:
          </p>
          <p v-if="data.formatted">{{ data.formatted }}</p>
          <p v-if="data.textCurrency">{{ data.textCurrency }}</p>
        </div>
      </div>
    </div>
    <div class="flex justify-between">
      <Link href="1">
        <PrimaryButton>Sebelumnya</PrimaryButton>
      </Link>
      <Link href="3">
        <PrimaryButton>Selanjutnya</PrimaryButton>
      </Link>
    </div>
  </div>
</template>
