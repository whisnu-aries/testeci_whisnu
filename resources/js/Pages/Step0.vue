<template>
  <Head>
    <title>Fullstack_whisnu</title>
  </Head>
  <div class="flex flex-col h-full gap-4 pb-4">
    <div class="h-full flex flex-col items-center">
      <TitleText text="Selamat Datang!" />
      <div class="w-4/5 h-full flex flex-col items-center justify-center gap-4">
        <DescriptionText
          text="Ini adalah website yang dibuat oleh Whisnu Aries Dewantara untuk test full stack web developer yang diadakan oleh PT. Electronic City Indonesia, Tbk."
          class="text-center"
        />
        <div class="flex items-center gap-1">
          <DescriptionText
            text="Anda bisa mengakses code web ini di repository "
          />
          <a
            href="https://github.com/whisnu-aries/testeci_whisnu"
            class="underline text-blue-700"
            target="_blank"
          >
            testeci_whisnu
          </a>
        </div>
      </div>
    </div>
    <div class="flex justify-end">
      <Link href="1">
        <PrimaryButton>Selanjutnya</PrimaryButton>
      </Link>
    </div>
  </div>
</template>
