<template>
    <breadcrumb :fonts="fonts"/>
    <div class="signup" style="max-width: 1200px; margin: auto;">
        <div class="container">
            <div class="main">
                <form action="">
                    <h2>註冊會員</h2>
                    <hr>
                    <p>*為必填欄位</p>
                    <h3>姓名<span>*</span></h3>
                    <Input/>
                    <h3>密碼<span>*</span></h3>
                    <Input/>
                    <h3>電子信箱<span>*</span></h3>
                    <Input/>
                    <h3>電話號碼<span>*</span></h3>
                    <Input/>
                    <input class="agreebox" type="checkbox" value="ok"/>
                    <label for="agree">同意我們的<a href="">使用條款</a>和<a href="">隱私政策</a></label>
                </form>
                <button class="btn-gold">註冊為會員</button>
                <a href="">回上一頁</a>
            </div>
        </div>
    </div>
</template>

<script>
    import breadcrumb from "@/components/breadcrumb.vue"
    import Input from "@/components/Input.vue"

    export default {
        name: 'loginView',
        components: {
            breadcrumb,
            Input
        },
        data() {
            return {
            email: "",
            password: "",
            };
        },
    };
</script>
<style lang="scss" scoped>
@import "../assets/scss/base/font.scss";
@import "../assets/scss/base/color.scss";
@import "../assets/scss/components/btn.scss";