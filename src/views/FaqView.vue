<template>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <div class="FAQ" style="max-width: 1200px; margin: auto;">
        <breadcrumb :fonts="fonts"/>
        <div class="container">
            <aside>
                <h2 class="font-32">FAQ</h2>
                <div class="categoryList">
                    <h3 class="font-18 category"
                        v-for="category in categoryList"
                        :key="category.faq_type"
                        :class="{on: category.faq_type == activeCategory.faq_type}"
                        @click="tabChange(category)"
                    >
                        {{category.faq_type}}
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
                        :key="category.faq_type"
                        :class="{on: category.faq_type == activeCategory.faq_type}"
                        @click="tabChange(category)"
                    >
                        {{category.faq_type}}
                    </li>
                </ul>
                <ul class="faqList">
                    <li class="font-16-24em faq"
                        v-for="faqList in activeList"
                        :key="faqList">
                        Q：{{faqList.faq_q}}<br>A：{{faqList.faq_a}}
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
        name: 'FaqView',
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
                    { name: 'FAQ',  source: 'faq' }
                ],
                categoryList:[
                    { faq_type: '會員問題' },
                    { faq_type: '行程問題' },
                    { faq_type: '商品問題' },
                ],
                faqList:[
                    { 
                        faq_type: '會員問題',
                        faq_no: '001',
                        faq_q:  '請問我忘記密碼了怎麼辦？',
                        faq_a:  '請撥打客服電話，由專人為您服務。',
                    },
                    { 
                        faq_type: '會員問題',
                        faq_no: '002',
                        faq_q: '請問客服電話是？我找不到。',
                        faq_a: '您好，客服電話是：00-0000-0000。',
                    },
                    { 
                        faq_type: '會員問題',
                        faq_no: '003',
                        faq_q:  '請問可以不要填寫LINE ID嗎？',
                        faq_a:  '可以的，親。',
                    },
                    { 
                        faq_type: '行程問題',
                        faq_no: '004',
                        faq_q:  '我不小心訂錯行程了，請問要如何退訂？',
                        faq_a:  '請至【會員專區】>【行程訂單查詢】，點擊【取消行程】',
                    },
                    { 
                        faq_type: '行程問題',
                        faq_no: '005',
                        faq_q: '我想要刷卡，但我不能填寫安全碼？',
                        faq_a: '請撥打客服電話，由專人為您服務。',
                    },
                    { 
                        faq_type: '行程問題',
                        faq_no: '006',
                        faq_q:  '我請問我要如何查詢乘車座位？',
                        faq_a:  '您好，我們不提供劃位服務，建議您提早上車，先搶先贏。',
                    },
                    { 
                        faq_type: '行程問題',
                        faq_no: '007',
                        faq_q:  '我購買了方案A，請問發車時間是？',
                        faq_a:  '請撥打客服電話，由專人為您服務。',
                    },
                    { 
                        faq_type: '商品問題',
                        faq_no: '008',
                        faq_q:  '請問現貨商品多久會寄出？',
                        faq_a:  '請撥打客服電話，由專人為您服務。',
                    },
                    { 
                        faq_type: '商品問題',
                        faq_no: '009',
                        faq_q: '請問我要如何查詢貨況呢？',
                        faq_a: '請撥打客服電話，由專人為您服務。',
                    },
                ],
            }
        },
        methods: {
            tabChange(tab){
                this.activeCategory = tab;
                this.activeList = this.faqList.filter(item => {
                    return item.faq_type === tab.faq_type;
                });
            }
        },
    }
</script>

<style scoped lang="scss">
    @import "../assets/scss/pages/faq.scss";
</style>