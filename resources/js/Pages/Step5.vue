<script setup>
defineProps(["step"]);
</script>

<template>
  <Head>
    <title>step {{ step }} page</title>
  </Head>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col items-center">
      <TitleText text="Terimakasih!" />
      <div class="w-4/5 h-full flex flex-col items-center justify-center gap-4">
        <DescriptionText
          text="Ini adalah website yang dibuat oleh Whisnu Aries Dewantara untuk test full stack web developer yang diadakan oleh PT. Electronic City Indonesia, Tbk."
          class="text-center"
        />
      </div>
    </div>
    <div class="flex justify-end">
      <Link href="4">
        <PrimaryButton>Sebelumnya</PrimaryButton>
      </Link>
    </div>
  </div>
</template>
