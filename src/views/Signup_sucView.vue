<template>
    <div class="signin-success" style="max-width: 1200px; margin: auto;">
        <div class="signin-icon">
          <i class="fa-regular fa-circle-check"></i>
        </div>
        <div class="signin-success-txt">
          <p>註冊成功！歡迎加入JET SPEED</p>
        </div>
        <div class="signin-success-btn">
            <button class="btn-blue_2nd" @click="backs">
            回首頁
            </button>
            <button class="btn-blue" @click="members">
            前往會員專區
            </button>
        </div>
      </div>
</template>

<script>
export default {
  name: "Signin_suceesfully",
  components: {
  },

  methods: {
    members() {
      this.$router.push("/membership");
    },
    backs(){
        this.$router.push("/");
    },
  },
}
</script>

<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";

.signin-success{
        
    .signin-icon {
        width: 100%;
        margin-top: 170px;
        margin-bottom: 10px;
        i {
        font-size: 800%;
        color: $back_color_main;
        }
    }
    p{
        @include font(20px);
        color: $color_444;
        padding: 40px 0;
        text-align: center;
    }
    .signin-success-btn{
        margin-bottom: 170px;
    }
    .btn-blue_2nd{
        margin: 30px 30px;
    }
}

</style>