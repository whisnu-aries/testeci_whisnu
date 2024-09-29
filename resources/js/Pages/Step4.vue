<template>
  <Head>
    <title>Fullstack_whisnu</title>
  </Head>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col items-center">
      <TitleText text="Test 4!" />
      <div class="w-4/5 h-full flex flex-col items-center justify-center gap-4">
        <DescriptionText
          text="Untuk step 4 ini anda bisa mengakses ke link berikut ini."
          class="text-center"
        />
        <a href="/test4/karyawan" class="underline text-blue-700"> test 4 </a>
      </div>
    </div>
    <div class="flex justify-between">
      <Link href="3">
        <PrimaryButton>Sebelumnya</PrimaryButton>
      </Link>
      <Link href="5">
        <PrimaryButton>Selanjutnya</PrimaryButton>
      </Link>
    </div>
  </div>
</template>
