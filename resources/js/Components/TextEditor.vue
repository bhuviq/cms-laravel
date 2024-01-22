<script setup>
import Editor from '@tinymce/tinymce-vue'

const model = defineModel({
    type: String,
    required: true,
});

</script>

<template>
    <Editor
      api-key="ibe8ffmaw5hka6qo6txctv5cfwg511phy78ff3917hxe9fyt"
      :init="{
        plugins: 'lists link image table code help wordcount'
      }"
      output-format="html"
      v-model="model"
    />
</template>

<style scoped>
@media (min-width: 1024px) {
  #sample {
    display: flex;
    flex-direction: column;
    place-items: center;
    width: 1000px;
  }
}
</style>