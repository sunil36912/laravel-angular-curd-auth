<template>
  <li class="nav-item dropdown">
    <a
      id="navbarDropdown"
      class="nav-link dropdown-toggle"
      href="#"
      role="button"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
    >
      Notifications
      <i class="fa fa-bell"></i>
      <span class="badge badge-success">{{ notifications.length }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="overflow:scroll auto; height:200px ;">
     
        <ul>
          <li v-for="notification in notifications" :key="notification.index">
       
            <span v-if="notification.data.notification_type=='UserRegisterNotification'">
                    <a class="dropdown-item" href="#">
              <strong>New User Registered: {{ notification.data.name }}</strong>
              <small>Email:{{ notification.data.email }}</small>
              </a>
            </span>
            <span v-if="notification.data.notification_type=='ProductCreated'">
                 <a class="dropdown-item" href="#">
              <strong>New Product is Created: {{ notification.data.product_name }}</strong>
              <small>Cost :{{ notification.data.product_price }}</small>
                </a>
            </span>
          </li>
        </ul>
      </a>
    </div>
  </li>
</template>

<script>
export default {
  props: ["notifications"],

  mounted() {
    console.log("Component mounted.");
  }
};
</script>
