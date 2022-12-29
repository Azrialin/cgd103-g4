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
                    <input
                        class="input-gold"
                        type="text"
                        v-model="keyword"
                        @keyup.enter="Faq_search"
                        placeholder="輸入您想尋找的內容">
                    <button type="submit" @click="Faq_search">
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
                <!-- <ul class="faqList">
                    <li class="font-16-24em faq" v-for="faqList in activeList" :key="faqList">
                    Q：
                    <span v-html="faqList.faq_q.replace(keyword, `<span class="highlighted">${keyword}</span>`)"></span>
                    <br>
                    A：
                    <span v-html="faqList.faq_a.replace(keyword, `<span class="highlighted">${keyword}</span>`)"></span>
                    </li>
                </ul> -->
                <ul class="faqList">
                    <li class="font-16-24em faq"
                        v-for="faqList in activeList"
                        :key="faqList">
                        Q：{{faqList.faq_q}}
                        <br>
                        A：{{faqList.faq_a}}
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
    import {BASE_URL} from "@/assets/js/common.js"
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
            this.getFaqData_Fetch();
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
                categoryList:[],
                faqList:[],
                filterList:[],
                keyword:'',
            }
        },
        methods: {
            tabChange(tab){
                // console.log(this.keyword);
                this.keyword='';
                this.activeCategory = tab;
                this.activeList = this.faqList.filter(item => {
                    return item.faq_type === tab.faq_type;
                });
            },
            getFaqData_Fetch(){
                // fetch('http://localhost/CGD103_G4_front/public/phpfiles/Faq_getData.php')
                fetch(`${BASE_URL}/Faq_getData.php`)
                .then(res=>res.json())
                .then(json=>{
                    this.faqList = json;
                    this.activeList = this.faqList;
                    this.categoryList = [...new Set(this.faqList.map(item => item.faq_type))].map(faqType => ({ faq_type: faqType }));
                })
		    },
            Faq_search(){
                // fetch("http://localhost/CGD103_G4_front/public/phpfiles/Faq_search.php",{
                fetch(`${BASE_URL}/Faq_search.php`,{
                    method:'POST', body:new URLSearchParams({
                    keyword:this.keyword,
                })})
                .then(res=>res.json())
                .then(json=>{
                    this.filterList = json;
                    this.activeList = this.filterList;
                    // for (const item of this.activeList) {
                    //     if (item.faq_q.includes(this.keyword)||item.faq_a.includes(this.keyword)) {
                    //         item.isHighlighted = true;
                    //     } else {
                    //         item.isHighlighted = false;
                    //     }
                    // }
                })
            }
        },
    }
</script>

<style scoped lang="scss">
    @import "../assets/scss/pages/faq.scss";
    .highlighted{
        background-color: yellow;
    }
</style>