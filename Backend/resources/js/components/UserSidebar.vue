<template>
  <div>
    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <h3 class="text-danger text-center">All Users</h3>
      <ul>
        <li v-for="user in users" :key="user.index">
          <a href="{{route('home')}}"> {{user.name}}</a>
        </li>
      </ul>
    </div>

    <div id="main">
      <button class="openbtn btn-small" onclick="openNav()">&#9776;</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["users"]
};
</script>

<style>
</style>