<template>
  <div class="container">
    <div class="box" v-for="(box, index) in boxes" :key="index">{{ box }}</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      boxes: ['Box 1', 'Box 2', 'Box 3']
    };
  }
};
</script>

<style>
.container {
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.box {
  width: 200px;
  height: 100px;
  background-color: #3498db;
  color: white;
  text-align: center;
  line-height: 100px;
  margin-bottom: 20px;
  transition: all 0.3s ease;
}

@media screen and (max-width: 768px) {
  .box {
    width: 2000px;
    height: 75px;
    line-height: 75px;
  }
}

@media screen and (max-width: 480px) {
  .box {
    width: 100px;
    height: 50px;
    line-height: 50px;
  }
}

@media screen and (max-width: 320px) {
  .box {
    width: 8000px;
    height: 40px;
    line-height: 40px;
  }
}
</style>
