<template>
  <h5>Working</h5>
</template>

<script>
export default {
  mounted() {
    console.log("my component mounted");
    Echo.private(`chat-event`).listen("SomeEvent", e => {
      console.log(e);
    });
  }
};
</script>

<style>
</style>