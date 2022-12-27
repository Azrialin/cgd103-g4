import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'

export default createStore({
  state: {
    cart:[
      { prod_id: 1, amount: 111 },
      { prod_id: 7, amount: 111 },
    ],
    list:[],
    //member
    mem_no: null,
  },
  getters: {
    cartList(state){
      return state.cart;
    }
  },
  mutations: {
    setMember(state,number){
      state.mem_no=number
    },
    setCart(state,list){
      state.cart=list
    },
    addCart(state,item){
      state.cart.push(item);
      state.cart.find(v => v.id === prod_id).amount;
    },
    updateItem(state,item) {
      const id = item.id;
      const amount = item.amount;
      state.cart.find(v => v.id === id).amount = amount;
    },
  },
  plugins:[createPersistedState()],
  actions: {
    setMember({commit},number){
      commit("setMember",number)
    },
    setCart({commit},list){
      commit("setCart",list)
    },
    addCart({commit},item){
      commit("addCart",item)
    },
    updateItem({commit},item){
      commit("updateItem",item)
    },
  },
  modules: {
  }
})
