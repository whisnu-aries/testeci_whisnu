<script setup>
import { useRoute } from "vue-router";

const route = useRoute();
console.log(route);
</script>

<template>
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div
          class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"
        >
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <Link href="/test4/karyawan">
                <button
                  href="#"
                  class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                >
                  Karyawan
                </button>
              </Link>
              <Link href="/test4/jabatan">
                <button
                  href="#"
                  class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                >
                  Jabatan
                </button>
              </Link>
              <Link href="/test4/level">
                <button
                  href="#"
                  class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                >
                  Level
                </button>
              </Link>
              <Link href="/test4/department">
                <button
                  href="#"
                  class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                >
                  Department
                </button>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <main class="min-h-screen bg-slate-200 flex justify-center">
    <div
      class="max-w-screen-xl bg-white flex-1 m-16 p-4 rounded border-2 border-blue-700"
    >
      <slot />
    </div>
  </main>
</template>
