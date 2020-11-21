<template>
    <div id="app">
        <router-view name="header"></router-view>
        <main>

          <EquipeListe/>
        </main>
        <router-view name="footer"></router-view>
    </div>
</template>
<script>
import { FadeTransition } from "vue2-transitions";
import EquipeListe from "@/components/EquipeListe";

export default {
  components: {
    EquipeListe,
    FadeTransition
  }
};
</script>
