<script setup>
//npm i @vueuse/core

import { useIdle, useTimestamp } from "@vueuse/core";
import { computed } from "vue";

const { idle, lastActive } = useIdle(5000);

const now = useTimestamp({ interval: 1000 });

const idledFor = computed(() =>
    Math.floor((now.value - lastActive.value) / 1000)
);
watch(idledFor, (newValue, oldValue) => {
    console.log("new value " + newValue);
});
</script>

<template>
    <note class="mb-2"> For demonstration purpose, </note>
    <div>
        Inactive: <b class="text-primary">{{ idledFor }}s</b>
    </div>
</template>
