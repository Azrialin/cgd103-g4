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
                        list="previousSearches"
                        v-model="keyword"
                        @input="faqSearch"
                        @keydown.enter="addToList"
                        placeholder="請輸入您想尋找的內容"/>
                        <!-- 以前的搜尋季紀錄 -->
                        <!-- bug > 要 enter 兩次才有效果 -->
                        <datalist id="previousSearches">
                            <option v-for="keyword in previousSearches" :value="keyword"></option>
                        </datalist>
                        <!-- 叉叉 -->
                        <span class="material-symbols-outlined"
                            v-show="keyword!=''"
                            @click="clearInput"
                            >close
                        </span>
                        <!-- 放大鏡 -->
                        <button type="submit" @click="faqSearch">
                            <i class="material-symbols-outlined">&#xe8b6;</i>
                        </button>
                </label>
                <ul class="tabs">
                    <li class="tab font-18 context"
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
                        v-for="faqItem in activeList"
                        :key="faqItem.faq_no">
                        Q：<span
                            v-html="renderHtml(faqItem.faq_q)"
                            id="q-{{ faqItem.faq_no }}">
                        </span>
                        <br>
                        A：<span
                        v-html="renderHtml(faqItem.faq_a)"
                        id="a-{{ faqItem.faq_no }}">
                    </span>
                    <!-- id="q-{{ faqItem.faq_no }}"
                        將每一則 faq_q 和 faq_a 都給予一個唯一的 id。
                        這樣可以在之後的代碼中使用 document.querySelector 來找到它們。
                        假設我有一則資訊的 faq_no 是 1，那麼最終的 id 屬性值就會是 "q-1"，
                        這樣在使用 new Mark(document.querySelector('#q-1')) 方法時，
                        就會找到 id 為 "q-1" 的文字元素。
                    -->
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
        watch:{
        },
        mounted(){
        },
        data(){
            return{
                fonts:[
                    { name: '首頁', source: '/'  },
                    { name: 'FAQ',  source: 'faq' }
                ],
                tab:  1,
                page: 1,
                categoryList:[],
                activeCategory: '',
                faqList:[],
                activeList: [],
                keyword:'', // 搜尋的關鍵字
                previousSearches: [], // 從前搜尋過的關鍵字
            }
        },
        methods: {
            tabChange(tab){
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
            faqSearch(){
                this.activeList = this.faqList.filter(item =>
                    item.faq_q.includes(this.keyword) || 
                    item.faq_a.includes(this.keyword)
                );
            },
            renderHtml(text){
                return text.replace(new RegExp(this.keyword, 'gi'), `<mark class="keyword">${this.keyword}</mark>`);
                // 這裡的會回傳一個新的字串，將原來的字串中包含 keyword 的部分，
                // 替換成一個 <mark class="keyword">${this.keyword}</mark> 的標籤。
                // 而這個標籤又會被插入到 v-html 指令裡，使得 HTML 渲染器會將其轉譯成實際的元素，
                // 這樣被 class="keyword" 的 CSS 樣式所標示的文字就會呈現出高亮的效果。
                
                // gi 是兩個正則表達式修飾符的縮寫：
                // g 代表全局搜索，意思是將整個字符串當成搜索對象，而不僅僅是找到第一個匹配項就停止。
                // i 代表不區分大小寫。
                // 所以這裡的 gi 就代表將整個字符串當成搜索對象，並且不區分大小寫地搜索 keyword。
            },
            clearInput(){
                this.activeList = this.faqList;
                this.keyword = '';
            },
            addToList(){
                this.previousSearches.unshift(this.keyword);
                // 將搜尋的關鍵字儲存到 localStorage
                localStorage.setItem('previousSearches', JSON.stringify(this.previousSearches));
                // 從 localStorage 獲得儲存的關鍵字
                this.previousSearches = JSON.parse(localStorage.getItem('previousSearches'));
                // 最多存五條
                if (this.previousSearches.length > 5) {
                    this.previousSearches = this.previousSearches.slice(0, 5);
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "../assets/scss/pages/faq.scss";
    :deep(mark){
        background: $clr_gold_L2;
    }
</style>