<template>
  <Head>
    <title>Fullstack_whisnu</title>
  </Head>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col items-center">
      <TitleText text="Terimakasih!" />
      <div class="w-4/5 h-full flex flex-col items-center justify-center gap-4">
        <DescriptionText
          text="Berikut adalah jawaban test yang saya buat. Besar harapan saya dengan jawaban yang saya buat ini dapat memenuhi persayratan dan ekspektasi PT. Electronic City Indonesia, Tbk."
          class="text-center"
        />
      </div>
    </div>
    <div class="flex">
      <Link href="4">
        <PrimaryButton>Sebelumnya</PrimaryButton>
      </Link>
    </div>
  </div>
</template>
