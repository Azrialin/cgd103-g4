<template lang="shop">
    <div class="sidenav">
        <button class="dropdown-btn">所有商品
        <i class="fa-solid fa-angle-down turn"></i>
        </button>
        <div class="dropdown-container">
        <a href="#">子類別</a>
        <a href="#">子類別</a>
        <a href="#">子類別</a>
        </div>
        <button class="dropdown-btn">紀念品系列
        <i class="fa-solid fa-angle-down"></i>
        </button>
        <div class="dropdown-container">
        <a href="#">子類別</a>
        <a href="#">子類別</a>
        <a href="#">子類別</a>
        </div>
        <button class="dropdown-btn">特產系列
        <i class="fa-solid fa-angle-down"></i>
        </button>
        <div class="dropdown-container">
        <a href="#">子類別</a>
        <a href="#">子類別</a>
        <a href="#">子類別</a>
        </div> 
    </div>
</template>

<style scoped >
    .sidenav {
      height: 100%;
      width: 200px;
      position: sticky;
      z-index: 1;
      top: 0;
      left: 0;
      overflow-x: hidden;
      padding-top: 20px;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a, .dropdown-btn {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 20px;
      color: #818181;
      display: block;
      border: none;
      background: none;
      width:100%;
      text-align: left;
      cursor: pointer;
      outline: none;
    }

    /* On mouse-over */
    .sidenav a:hover, .dropdown-btn:hover {
      color: #f1f1f1;
    }

    /* Main content */
    .main {
      margin-left: 200px; /* Same as the width of the sidenav */
      font-size: 20px; /* Increased text to enable scrolling */
      padding: 0px 10px;
    }

    /* Add an active class to the active dropdown button */
    .active {
      background-color: rgb(255, 255, 255);
      color: rgb(199, 199, 199);
    }

    .dropdown-container {
      display: none;
      background-color: #f9f5f5;
      padding-left: 8px;

    }
    .fa-solid fa-angle-down{
      font-family: "Font Awesome 6 Free"; 
      font-weight: 700; 
      content: "\f107";
      font-size: 18px;
      color: rgb(255, 255, 255);
    }
</style>


<script>
export default {
  name: 'bar',
  props: {
    
  }
}
</script>

