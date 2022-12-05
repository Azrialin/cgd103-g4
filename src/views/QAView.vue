<template>
    <!-- <div class="QA"> -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <div class="QA" style="max-width: 1200px; margin: auto;">
        <breadcrumb :fonts="fonts"/>
        <div class="container">
            <aside>
                <h2 class="font-32">Q&A</h2>
                <div class="QA_menu">
                    <h3 class="font-18 js-click"
                        v-for="QA in QA_menu"
                        :key="QA" 
                        :data-id="QA['id']"
                        :class="{at: QA['id'] == active.id}"
                        @click="tabChange(QA)"
                    >
                        {{QA.title}}
                    </h3>
                </div>
            </aside>
            <main>
                <label class="search">
                    <input class="input-gold" type="text" placeholder="輸入您想尋找的內容（還不能用，不會寫）">
                    <button type="submit"><i class="material-symbols-outlined">&#xe8b6;</i></button>
                </label>
                
                <ul class="tabs">
                    <li class="tab font-18 js-click"
                        v-for="QA in QA_menu"
                        :key="QA.id"
                        :data-id="QA.id"
                        :class="{at: QA.id == active.id}"
                        @click="tabChange(QA)"
                    >
                        {{QA.title}}
                    </li>
                </ul>
                <ul class="QA_list">
                    <li class="font-16-24em" v-for="QA_list in activeList" :key="QA_list">
                        Q：{{QA_list.Q}}<br>A：{{QA_list.A}}
                    </li>
                  
                </ul>
            </main>
        </div>
        <Pagination @change="page=$event" :defaultCurrentPage="page" :defaultPageSize="9" :total="30"/>
    </div>

    <!-- <div>
        <button class="btn-blue">按鈕</button>
            <button class="btn-gold">按鈕</button>
            <button class="btn-blue_2nd">按鈕</button>
            <button class="btn-gold_2nd">按鈕</button>
            <button class="btn-success">按鈕</button>
            <button class="btn-danger">按鈕</button>
            <button class="btn-success_2nd">按鈕</button>
            <button class="btn-danger_2nd">按鈕</button>
    </div> -->

</template>
  
<script>
    // @ is an alias to /src
    import QA from "@/assets/js/QA.js"
    import breadcrumb from "@/components/breadcrumb.vue"
    import Pagination from "@/components/pagination/Pagination.vue"

    export default {
        name: 'QAView',
        components: {
            QA,
            breadcrumb,
            Pagination
        },
        props:{

        },
        created(){

        },
        mounted() {
            
        },
        data(){
            return{
                tab:1,
                page:1,
                fonts:[
                    { name: '首頁', source: '/' },
                    { name: 'Q&A', source: 'QA' }
                ],
                QA_menu:[
                    { id: 'Q001', title: '會員問題' },
                    { id: 'Q002', title: '行程訂單問題' },
                    { id: 'Q003', title: '商品訂單問題' },
                ],
                QA_list:[
                    { 
                        id: 'M001',
                        Q:  '請問我忘記密碼了怎麼辦？',
                        A:  '請撥打客服電話，由專人為您服務。',
                        type: 'Q001'
                    },
                    { 
                        id: 'M002',
                        Q: '請問客服電話是？我找不到。',
                        A: '您好，客服電話是：00-0000-0000。',
                        type: 'Q001'
                    },
                    { 
                        id: 'M003',
                        Q:  '請問可以不要填寫LINE ID嗎？',
                        A:  '可以的，親。',
                        type: 'Q001'
                    },
                    { 
                        id: 'T001',
                        Q:  '我不小心訂錯行程了，請問要如何退訂？',
                        A:  '請至【會員專區】>【行程訂單查詢】，點擊【取消行程】',
                        type: 'Q002'
                    },
                    { 
                        id: 'T002',
                        Q: '我想要刷卡，但我不能填寫安全碼？',
                        A: '請撥打客服電話，由專人為您服務。',
                        type: 'Q002'
                    },
                    { 
                        id: 'T003',
                        Q:  '我請問我要如何查詢乘車座位？',
                        A:  '您好，我們不提供劃位服務，建議您提早上車，先搶先贏。',
                        type: 'Q002'
                    },
                    { 
                        id: 'T004',
                        Q:  '我購買了方案A，請問發車時間是？',
                        A:  '請撥打客服電話，由專人為您服務。',
                        type: 'Q002'
                    },
                    { 
                        id: 'P001',
                        Q:  '請問現貨商品多久會寄出？',
                        A:  '請撥打客服電話，由專人為您服務。',
                        type: 'Q003'
                    },
                    { 
                        id: 'P002',
                        Q: '請問我要如何查詢貨況呢？',
                        A: '請撥打客服電話，由專人為您服務。',
                        type: 'Q003'
                    },
                ],
                active: '',
                activeList: []
            }
        },
        methods: {
            tabChange(tab){
                this.active = tab;
                this.activeList = this.QA_list.filter(item => {
                    return item.type === tab.id;
                });
                console.log( this.activeList);
            }
        },
    }
</script>

<style scoped lang="scss">
    @import "../assets/scss/pages/QA.scss";
</style>