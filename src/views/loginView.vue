<template>
    <div class="login" style="max-width: 1200px; margin: auto;">
        <breadcrumb/>
        <div class="container">
            <div class="main">
                <h2>登入</h2>
                <form action="">
                    <label for="email">電子信箱</label>
                    <input class="email" type="text" v-model="email" />
                    <label for="password">密碼</label>
                    <input class="password" type="password" v-model="password" />
                    <a href="">忘記密碼了嗎?</a>
                </form>
                <button class="login_check">登入</button>
            </div>
            <button class="signup">註冊</button>
        </div>
    </div>
        
</template>

<script>
    import breadcrumb from "@/components/breadcrumb.vue"

    export default {
        name: 'loginView',
        components: {
            breadcrumb
        },
        data() {
            return {
            email: "",
            password: "",
            };
        },
    };
</script>