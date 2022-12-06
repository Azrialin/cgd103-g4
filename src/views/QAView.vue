<template>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <div class="QA" style="max-width: 1200px; margin: auto;">
        <breadcrumb :fonts="fonts"/>
        <div class="container">
            <aside>
                <h2 class="font-32">Q&A</h2>
                <div class="categoryList">
                    <h3 class="font-18 category"
                        v-for="category in categoryList"
                        :key="category.id"
                        :class="{on: category.id == activeCategory.id}"
                        @click="tabChange(category)"
                    >
                        {{category.title}}
                    </h3>
                </div>
            </aside>
            <main>
                <label class="search">
                    <input class="input-gold" type="text" placeholder="輸入您想尋找的內容（還不能用，不會寫）">
                    <button type="submit">
                        <i class="material-symbols-outlined">&#xe8b6;</i>
                    </button>
                </label>
                <ul class="tabs">
                    <li class="tab font-18"
                        v-for="category in categoryList"
                        :key="category.id"
                        :class="{on: category.id == activeCategory.id}"
                        @click="tabChange(category)"
                    >
                        {{category.title}}
                    </li>
                </ul>
                <ul class="faqList">
                    <li class="font-16-24em faq"
                        v-for="faq in activeList"
                        :key="faq">
                        Q：{{faq.Q}}<br>A：{{faq.A}}
                    </li>
                </ul>
            </main>
        </div>
        <Pagination
            @change="page=$event"
            :defaultCurrentPage="page"
            :defaultPageSize="9"
            :total="30"
        />
    </div>
</template>
  
<script>
    import breadcrumb from "@/components/breadcrumb.vue"
    import Pagination from "@/components/pagination/Pagination.vue"

    export default {
        name: 'QAView',
        components: {
            breadcrumb,
            Pagination,
        },
        props:{

        },
        created(){

        },
        mounted(){
            
        },
        data(){
            return{
                tab:  1,
                page: 1,
                activeCategory: '',
                activeList: [],
                fonts:[
                    { name: '首頁', source: '/'  },
                    { name: 'Q&A',  source: 'QA' }
                ],
                categoryList:[
                    { id: 'Q01', title: '會員問題' },
                    { id: 'Q02', title: '行程問題' },
                    { id: 'Q03', title: '商品問題' },
                ],
                faq:[
                    { 
                        type: 'Q01',
                        id: 'M001',
                        Q:  '請問我忘記密碼了怎麼辦？',
                        A:  '請撥打客服電話，由專人為您服務。',
                    },
                    { 
                        type: 'Q01',
                        id: 'M002',
                        Q: '請問客服電話是？我找不到。',
                        A: '您好，客服電話是：00-0000-0000。',
                    },
                    { 
                        type: 'Q01',
                        id: 'M003',
                        Q:  '請問可以不要填寫LINE ID嗎？',
                        A:  '可以的，親。',
                    },
                    { 
                        type: 'Q02',
                        id: 'T001',
                        Q:  '我不小心訂錯行程了，請問要如何退訂？',
                        A:  '請至【會員專區】>【行程訂單查詢】，點擊【取消行程】',
                    },
                    { 
                        type: 'Q02',
                        id: 'T002',
                        Q: '我想要刷卡，但我不能填寫安全碼？',
                        A: '請撥打客服電話，由專人為您服務。',
                    },
                    { 
                        type: 'Q02',
                        id: 'T003',
                        Q:  '我請問我要如何查詢乘車座位？',
                        A:  '您好，我們不提供劃位服務，建議您提早上車，先搶先贏。',
                    },
                    { 
                        type: 'Q02',
                        id: 'T004',
                        Q:  '我購買了方案A，請問發車時間是？',
                        A:  '請撥打客服電話，由專人為您服務。',
                    },
                    { 
                        type: 'Q03',
                        id: 'P001',
                        Q:  '請問現貨商品多久會寄出？',
                        A:  '請撥打客服電話，由專人為您服務。',
                    },
                    { 
                        type: 'Q03',
                        id: 'P002',
                        Q: '請問我要如何查詢貨況呢？',
                        A: '請撥打客服電話，由專人為您服務。',
                    },
                ],
            }
        },
        methods: {
            tabChange(tab){
                this.activeCategory = tab;
                this.activeList = this.faq.filter(item => {
                    return item.type === tab.id;
                });
                // console.log( this.activeList);
            }
        },
    }
</script>

<style scoped lang="scss">
    @import "../assets/scss/pages/QA.scss";
</style>