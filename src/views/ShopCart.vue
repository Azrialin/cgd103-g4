<template>
    <div>
        <cartitem/>
    </div>
</template>

<script>
    import cartitem from "@/components/CartItem.vue"
    export default {
        name: "ShopCart",
        components:{
            cartitem
        },
        data(){
            return{
                list:[
                    {
                        id:1,
                        // img:
                    },
                ],
            }
        }
    }
</script>