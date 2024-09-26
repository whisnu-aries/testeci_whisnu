<!-- <script setup>
defineProps(["step"]);
</script> -->

<!-- <script>
import Step_0_component from "./Step_0_component.vue";
import Step_1_component from "./Step_1_component.vue";

export default {
  components: {
    Step_0_component,
    Step_1_component,
  },
  props: {
    step: Number,
  },
  data() {
    return {
      steps: [
        { id: 0, component: "Step_0_component" },
        { id: 1, component: "Step_1_component" },
      ],
    };
  },
};
</script> -->
<script setup>
defineProps(["step"]);
</script>

<template>
  <Head>
    <title>step {{ step }} page</title>
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
