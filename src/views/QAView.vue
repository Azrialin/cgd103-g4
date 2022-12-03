<template>
    <!-- <div class="QA"> -->
    <div class="QA" style="max-width: 1200px; margin: auto;">
        <breadcrumb :fonts="fonts"/>
        <div class="search">
            <!-- <Input id="test" :InputDefault="`這不能用，我還不會寫搜尋吧`"/> -->
        </div>
        <div class="container">
            <aside>
                <h2 class="font-32">Q&A</h2>
                <ul class="QA_menu">
                    <span class="at"></span>
                    <h3 class="font-18 js-click" 
                        v-for="QA in QA_menu"
                        :key="QA" @click="tabChange"
                        :data-id="QA['id']">
                        <span class="txt">{{QA.title}}</span>
                    </h3>
                </ul>
            </aside>
            <main>
                <Input class="js-click" :InputDefault="`這不能用，我還不會寫搜尋吧`"/>
                <ul class="QA_list" v-show="tab!='Q002' && tab!='Q003'">
                    <li class="font-16-24em" v-for="QA_M in QA_M_list" :key="QA_M">
                        Q：{{QA_M.Q}}<br>A：{{QA_M.A}}
                    </li>
                </ul>
                <ul class="QA_list" v-show="tab=='Q002'">
                    <li class="font-16-24em" v-for="QA_T in QA_T_list" :key="QA_T">
                        Q：{{QA_T.Q}}<br>A：{{QA_T.A}}
                    </li>
                </ul>
                <ul class="QA_list" v-show="tab=='Q003'">
                    <li class="font-16-24em" v-for="QA_P in QA_P_list" :key="QA_P">
                        Q：{{QA_P.Q}}<br>A：{{QA_P.A}}
                    </li>
                </ul>
            </main>
        </div>
        <div id="move-line-box" class="line-box">
            <div id="move-line" class="short-line">測試</div>
            <div class="long-line"></div>
        </div>
        <Pagination @change="page=$event" :defaultCurrentPage="page" :defaultPageSize="9" :total="30"/>

        <!-- <p class="font-48">測試文字font-48</p>
        <p class="font-36">測試文字font-36</p>
        <p class="font-32">測試文字font-32</p>
        <p class="font-28">測試文字font-28</p>
        <p class="font-24">測試文字font-24</p>
        <p class="font-20">測試文字font-20</p>
        <p class="font-18">測試文字font-18</p>
        <hr>
        <button class="btn-blue">按鈕</button>
        <button class="btn-gold">按鈕</button>
        <button class="btn-blue_2nd">按鈕</button>
        <button class="btn-gold_2nd">按鈕</button>
        <button class="btn-success">按鈕</button>
        <button class="btn-danger">按鈕</button>
        <button class="btn-success_2nd">按鈕</button>
        <button class="btn-danger_2nd">按鈕</button>
        <hr>
        <p class="font-16-24em">提高生活品質，善用字體就對了。但初次接觸字體設計很挫折嗎？從這邊開始，就是你的最佳選擇：讓 justfont 設計師與天才小編群帶你探索這個有趣迷人的領域，歡迎來到我們的字體遊樂園！不論是想深度鑽研、隨意逛逛或是偷偷 follow 設計師，都有適合你的內容。創始於 2012 年，justfont blog 從台灣日常生活出發。從桃園機場的新細明體聊到街邊麵攤的劉體楷書，凡是生活上的字體議題幾乎無所不談，由淺入深。當成工具文、論說文、科普文甚至抒情文來讀，都是很棒的閱讀方式。文長梗多，筆觸生動，而且絕無僅有。效果類似精神時光屋，一進去會不小心逛很久，慎入。
        </p>
        <hr>
        <p class="font-16-15em">根據 justfont 在 2018 年的調查，49% 的設計相關校系學生表示，學校沒有提供中文字體排印相關的課程，而 31% 僅提供一學期的課程。正規教育稀缺，使我們認識到必須推動更多學習資源與機會，才能真正幫助設計專業人士。由 justfont 學有專精的字型設計師規劃、親授，從基本觀念入門、將各種觀念梳理清晰，再到專業的字型設計操作，深入淺出，手把手帶您學習字體設計。
        </p>
        <p class="font-14">測試文字font-14</p> -->
    </div>
</template>
  
<script>
    // @ is an alias to /src
    import QA from "@/assets/js/QA.js"
    import breadcrumb from "@/components/breadcrumb.vue"
    import Input from "@/components/Input.vue"
    import Pagination from "@/components/pagination/Pagination.vue"

    export default {
        name: 'QAView',
        components: {
            breadcrumb,
            Input,
            Pagination
        },
        props:{
            InputDefault: String
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
                QA_M_list:[
                    { 
                        id: 'M001',
                        Q:  '請問我忘記密碼了怎麼辦？',
                        A:  '請撥打客服電話，由專人為您服務。'
                    },
                    { 
                        id: 'M002',
                        Q: '請問客服電話是？我找不到。',
                        A: '您好，客服電話是：00-0000-0000。'
                    },
                    { 
                        id: 'M003',
                        Q:  '請問可以不要填寫LINE ID嗎？',
                        A:  '可以的，親。'
                    }
                ],
                QA_T_list:[
                    { 
                        id: 'T001',
                        Q:  '我不小心訂錯行程了，請問要如何退訂？',
                        A:  '請至【會員專區】>【行程訂單查詢】，點擊【取消行程】'
                    },
                    { 
                        id: 'T002',
                        Q: '我想要刷卡，但我不能填寫安全碼？',
                        A: '請撥打客服電話，由專人為您服務。'
                    },
                    { 
                        id: 'T003',
                        Q:  '我請問我要如何查詢乘車座位？',
                        A:  '您好，我們不提供劃位服務，建議您提早上車，先搶先贏。'
                    },
                    { 
                        id: 'T004',
                        Q:  '我購買了方案A，請問發車時間是？',
                        A:  '請撥打客服電話，由專人為您服務。'
                    },
                ],
                QA_P_list:[
                    { 
                        id: 'P001',
                        Q:  '請問現貨商品多久會寄出？',
                        A:  '請撥打客服電話，由專人為您服務。'
                    },
                    { 
                        id: 'P002',
                        Q: '請問我要如何查詢貨況呢？',
                        A: '請撥打客服電話，由專人為您服務。'
                    },
                ],
            }
        },
        methods: {
            tabChange:function(e){
                let tabid = e.target.dataset.id;
                this.tab = tabid;
                // e.target.style.background = "#E2E9F2";
            }
        },
    }
</script>

<style scoped lang="scss">
    @import "../assets/scss/components/btn.scss";
    .QA_menu h3.active{ background: lightblue; }
    .QA{
        // ----------測試區----------
        #move-line-box{
        padding: 30px;
        position: relative;
        }
        #move-line{
        max-width: 100px;
        position: absolute;
        transition: 0.15s;
        }
        .line-box{
            padding: 30px 0px;
            max-width: 800px;
            margin: auto;
        }
        .long-line{
            margin: 20px auto;
            border-bottom: 1px solid #B3B3B3;
        }
        .short-line{
            margin: auto;
            width: 30%;
            max-width: 200px;
            height: 3px;
            background-color: #00ADBB;
        }
        // .js-click.js-hd-shadow{
        //     box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.15);
        //     transition: 0.5s;
        // }
        // ----------測試區----------
        // .search{
        //     h2,.Input{
        //         display: inline-block;
        //     }
        //     // :deep(.Input){ width: 600px; }
        // }
        :deep(.Input){ 
            // width: 600px;
            width: 100%;
            margin: 10px 0 30px;
        }    
        min-height: calc(100vh - 70px);
        padding: 20px 0 50px;
        display: flex;
        flex-direction: column;
        p,a{
            color: $clr_gray_L1;
        }
        h2{
            padding: 15px;
            color: $clr_gray_L1;
        }
        .container{
            flex-grow: 1;
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin: auto;
            padding-bottom: 50px;
            aside{
                width: 20%;
                .QA_menu{
                    h3{
                        display: flex;
                        cursor: pointer;
                        padding: 15px;
                        color: $clr_gray_L1;
                        border-top: 1px solid $clr_gray_L4;
                        transition: $trs;
                        &:hover{
                            background: $clr_blue_L4;
                            transition: $trs;
                        }
                        &:last-child{
                            border-bottom: 1px solid $clr_gray_L4;
                        }
                        .txt{
                            order: 1;
                        }
                        .at{
                            width: 5px;
                            height: 22px;
                            margin-right: 10px;
                            background: $clr_blue_L2;
                        }
                    }
                }
            }
            main{
                width: calc(80% - 100px);
                .QA_list{
                    li{
                        padding: 10px 30px;
                        color: $clr_gray_L1;
                        border-radius: 10px;
                        &:nth-child(odd){
                            background: $clr_blue_L4;
                        }
                    }
                }
            }
        }
    }
</style>
  
  