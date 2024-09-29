<template>
  <Head>
    <title>Fullstack_whisnu</title>
  </Head>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col items-center">
      <TitleText text="Test 3" />
      <div class="w-4/5 h-full flex flex-col items-center justify-center gap-4">
        <Description-text
          class="text-center"
          text="Untuk jawaban dari test ini ada di file test_3.sql yang terletak didalam folder public/test_3.sql."
        />

        <div class="flex items-center gap-1">
          <Description-text
            text="Anda juga bisa langsung mengunduh jawabannya disini."
          />
          <a
            href="/test3/download"
            target="_blank"
            class="underline text-blue-700"
          >
            test_3.sql
          </a>
        </div>
      </div>
    </div>
    <div class="flex justify-between">
      <Link href="2">
        <PrimaryButton>Sebelumnya</PrimaryButton>
      </Link>
      <Link href="4">
        <PrimaryButton>Selanjutnya</PrimaryButton>
      </Link>
    </div>
  </div>
</template>
