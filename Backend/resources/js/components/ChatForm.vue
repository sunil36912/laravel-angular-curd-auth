<template>
  <div class="form-group">
    <input
      type="text"
      name="message"
      class="form-control"
      placeholder="Type your message here..."
      v-model="newMessage"
      @keyup.enter="sendMessage"
    />
    <br />

    <button class="btn btn-primary btn-sm" @click="sendMessage">Send</button>
  </div>
</template>

<script>
export default {
  props: ["user", "resptent"],

  data() {
    return {
      newMessage: ""
    };
  },

  methods: {
    sendMessage() {
      this.$emit("messagesent", {
        user: this.user,
        resptent: this.resptent,
        message: this.newMessage
      });

      this.newMessage = "";
    }
  }
};
</script>