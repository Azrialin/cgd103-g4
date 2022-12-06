<template>
  <div class="Contact">
    <breadcrumb :fonts="fonts" />
    <div class="Contact-Seaction">
      <div class="Contact-Head">
        <div class="Title">
          <h1 class="Contactus">聯絡我們</h1>
          <p class="Contactus-en">CONTACT US</p>
        </div>
        <div class="Caption">
          <p>
            感謝您拜訪晴日旅遊網站，如果您有任何疑問，或對我們公司的行程與服務
            有任何想要了解的地方，歡迎填寫下列表單，我們將會用最快的速度與您聯絡。
          </p>
        </div>
      </div>
      <div class="Contact-Table">
        <div class="Contact-Table-Item">
          <p>聯絡主題*</p>
          <CSelect :option="options" DefaultText="請選擇相關聯絡主題"> </CSelect>
        </div>
        <div class="Contact-Table-Item">
          <p>聯絡人*</p>
          <Input/>
        </div>
        <div class="Contact-Table-Item">
          <p>Line ID</p>
          <Input/>
        </div>
        <div class="Contact-Table-Item">
          <p>連絡電話*</p>
          <Input InputDefault="請以手機為主"/>
        </div>
        <div class="Contact-Table-Item">
          <p>Email</p>
          <Input/>
        </div>
        <div class="Contact-Table-Item">
          <p>需求說明</p>
          <textarea
            name=""
            id=""
            cols="30"
            rows="10"
          ></textarea>
        </div>
        <button>送出表單</button>
      </div>
    </div>
  </div>
</template>

<script>
import breadcrumb from "@/components/breadcrumb.vue";
import Input from "@/components/Input.vue";
import CSelect from "@/components/Select.vue";
export default {
  name: "HeaderView",
  components: {
    breadcrumb,
    Input,
    CSelect,
  },
  data() {
    return {
      fonts: [
        { name: "首頁", source: "/" },
        { name: "聯絡我們", source: "Contactus" },
      ],
      options: [
        {
          value: "1",
          label: "行程諮詢",
        },
        {
          value: "2",
          label: "量身訂做",
        },
        {
          value: "3",
          label: "旅遊建議",
        },
        {
          value: "4",
          label: "其他問題",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scope>
@import "../assets/scss/layout/grid.scss";
@import "../assets/scss/base/font.scss";
* {
  box-sizing: border-box;
}
#Select_DropDown {
  background: url("../assets/img/🦆 icon _chevron-down_.svg") 95% 50% no-repeat
    scroll #fff;
}
.Contact-Head {
  margin: 20px auto 60px;
  .Title {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
    .Contactus {
      @include font(36px);
      writing-mode: vertical-lr;
      text-orientation: upright;
    }
    .Contactus-en {
      @include font(14px);
      writing-mode: vertical-lr;
      text-orientation: upright;
    }
  }
  .Caption {
    display: flex;
    margin: auto;
    padding: 0 30px;
    p {
      @include font(14px);
    }
  }
}
.Contact-Table {
  background-color: #ccc;
  padding: 20px 10px;
  .Contact-Table-Item:nth-child(1) {
    text-align: center;
  }
  .Contact-Table-Item {
    p {
      margin: 10px 0;
      @include font(18px);
    }
    select {
      text-align: center;
      width: 100%;
    }
    input {
      width: 100%;
      height: 100%;
    }
    textarea {
      padding: 10px;
      width: 100%;
      @include font(14px);
      appearance: none;
      border-radius: 5px;
      border: 1px solid #ebdfce;
      outline: none;
      resize: none;
    }
    textarea:focus {
      border: 1px solid #bc955c;
    }
  }
  button {
    @include font(14px);
    color: #e6e6e6;
    background-color: #bc955c;
    text-align: center;
    margin: 30px auto;
    border: 1px solid transparent;
    border-radius: 10px;
    padding: 10px;
    width: 180px;
    appearance: none;
  }
}

@media (min-width: 1200px) {
  #Select_DropDown {
    background: url("../assets/img/🦆 icon _chevron-down_.svg") 98% 50% no-repeat
    scroll #fff;
  }
  .Contact-Seaction {
    display: flex;
    .Contact-Head {
      width: 30%;
      margin: 80px auto 0;
      .Title {
        justify-content: center;
      }
    }
    .Contact-Table{
      width: 60%;
    }
  }
}
</style>