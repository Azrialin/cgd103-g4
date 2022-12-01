<template>
    <div class="QA" style="max-width: 1200px; margin: auto;">
        <breadcrumb/>
        <div class="container">
            <aside>
                <h2 class="font-32">Q&A</h2>
                <ul class="QA_menu">
                    <h3 class="font-20" v-for="Q in QList" :key="Q">
                        {{Q.name}}
                    </h3>
                </ul>
            </aside>
            <main>
                <ul class="QA_list">
                    <li class="font-16-24em" v-for="QA in QAList" :key="QA">
                        Q：{{QA.Q}}<br>A：{{QA.A}}
                    </li>
                </ul>
            </main>
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
    import breadcrumb from "@/components/breadcrumb.vue"
    import Pagination from "@/components/pagination/Pagination.vue"

    export default {
        name: 'QAView',
        components: {
            breadcrumb,
            Pagination
        },
        data(){
            return{
                page:1,
                QList:[
                    { id: 'Q001', name: '會員問題' },
                    { id: 'Q002', name: '行程訂單問題' },
                    { id: 'Q003', name: '商品訂單問題' }
                ],
                QAList:[
                    { 
                        id: 'M001',
                        Q:  '請問我忘記密碼了怎麼辦？',
                        A:  '請撥打客服電話，由專人為您服務。'
                    },
                    { 
                        id: 'T001',
                        Q: '請問客服電話是？我找不到。',
                        A: '您好，客服電話是：00-0000-0000。'
                    },
                    { 
                        id: 'P001',
                        Q:  '請問可以不要填寫LINE ID嗎？',
                        A:  '可以的，親。'
                    }
                ],
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "../assets/scss/components/btn.scss";
    .QA{
        padding: 20px 0 50px;
        p{
            color: $clr_gray_L1;
        }
        h2{
            padding: 15px;
            color: $clr_gray_L1;
        }
        .container{
            display: flex;
            justify-content: space-between;
            margin: auto;
            padding-bottom: 50px;
            aside{
                width: 20%;
                .QA_menu{
                    h3{
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
  
  